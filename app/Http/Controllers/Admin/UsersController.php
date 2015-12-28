<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Entrust\Role;
use \Request;
use App\Http\Controllers\Controller;

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
    return view('admin.users.index', array('users' => User::paginate(20)));
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

  public function create()
  {
    return $this->edit(null);
  }

  public function update($id)
  {
    return $this->doStore($id);
  }

  public function store()
  {
    return $this->doStore(null);
  }

  public function doStore($id)
  {
    $user = $id ? User::find($id) : new User();
    if ($user) {
      try {
        $user->store(Request::all());
        return redirect(route('admin.users.edit', ['id' => $user->id]) . '?success=1');
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
    $view = view('admin.users.edit', array('user' => $user, 'roles' => $roles, 'success' => Request::input('success', 0)));
    if (count($errors)) {
      $view->with('errors', $errors);
    }
    return $view;
  }
}
