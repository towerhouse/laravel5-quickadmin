<?php 
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use \Validator;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
    use EntrustUserTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
    
    public $validation_errors;
    
    /**
     * Returns true if the user has permissions to see an action
     * Default is true if no restrictions are present
     * @param array $item array('permission' => permissionName, 'role' => roleName)
     */
    public function canPerformAction(Array $item)
    {
      $can = true;
      
      if (!$this->hasRole('admin')) {
        if (isset($item['permission'])) {
          $can = $this->can($item['permission']);
        } elseif (isset($item['role'])) {
          $can = $this->hasRole($item['role']);
        }
      }
      
      return $can;
    }
    
    public function getValidationRules()
    {
      return array(
          'name' => 'required|max:60',
          'email' => 'required|email|unique:users,email,' . $this->id,
          'role_id' => 'min:1|exists:roles,id'
      );
    }
    
    public function store(Array $data)
    {
      $validator = Validator::make($data, $this->getValidationRules());
      
      if ($validator->fails()) {
        $this->validation_errors = $validator->messages();
        throw new \Exception("Invalid user input");
      } else {
        //Do we have a password reset?
        if (isset($data['password']) && $data['password']) {
          $pass_validator = Validator::make($data, array('password' => 'confirmed'));
          if ($pass_validator->fails()) {
            $this->validation_errors = $pass_validator->messages();
            throw new \Exception("Password and confirmation don't match");
          }
        }
        
        //Fill user with the new data
        $this->name = trim($data['name']);
        $this->email = trim($data['email']);
        if (isset($data['password']) && $data['password']) {
          $this->password = \Hash::make(trim($data['password']));
        }
        
        $this->save();
        
        //Handle roles
        foreach ($this->roles as $role) {
          $this->detachRole($role);
        }
        foreach ($data['role_id'] as $role_id) {
          $this->attachRole($role_id);
        }

      }
    }
    
    public function delete()
    {
      parent::delete();
      foreach ($this->roles as $role) {
        $this->detachRole($role);
      }
    }

}
