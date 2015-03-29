<?php

namespace App\Http\Controllers;
use App\User;
use Entrust\Role;
use \Request;

class UsersController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard to the user.
   *
   * @return Response
   */
  public function index()
  {
    return view('users.index', array('users' => User::paginate(20)));
  }
  
  public function edit($id = null)
  {
    $user = $id ? User::find($id) : new User();
    if ($user) {
      return $this->showLayout($user);
    } else {
      abort(404);
    }
  }
    
  public function store()
  {
    $id = Request::input('id');
    $user = $id ? User::find($id) : new User();
    if ($user) {
      try {
        $user->store(Request::all());
        return \Redirect::to('users/edit/' . $user->id . '?success=1');
      } catch(\Exception $e) {
        return $this->showLayout($user, $user->validation_errors);
      }
    } else {
      abort(404);
    }
  }
  
  public function destroy()
  {
    $id = Request::input('id');
    $user = User::find($id);
    if ($user) {
      $user->delete();
    }
  }
  
  protected function showLayout(User $user, $errors = array())
  {
    $roles = Role::lists('name', 'id');
    $view = view('users.edit', array('user' => $user, 'roles' => $roles, 'success' => Request::input('success', 0)));
    if (count($errors)) {
      $view->with('errors', $errors);
    }
    return $view;
  }
}
