<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('administration.users.index', compact('users'));
  }

  public function create()
  {
    return view('administration.users.create');
  }

  public function store(Request $request)
  {
    $this->validate(request(), [
      'name' => 'required|string',
      'email' => 'required|string|unique:users,email',
      'password' => 'required|confirmed'
    ]);

    $user = User::create(request(['name', 'email', 'password']));
    return redirect()->to('/admin/users');
  }

  public function destroy($id)
  {
    if (User::findOrFail($id)) {
      User::destroy($id);
      $notification = array(
        'message' => 'User removed successfully',
        'alert-type' => 'warning'
      );

      return redirect('/admin/users')->with($notification);
    }

    return redirect('/admin/users');
  }
}
