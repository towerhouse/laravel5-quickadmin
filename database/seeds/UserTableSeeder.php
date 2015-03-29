<?php

use Illuminate\Database\Seeder;
use App\User;
use Entrust\Role;

class UserTableSeeder extends Seeder
{

  public function run()
  {
    //Create base user
    $user = User::create([
        'name' => 'Admin User',
        'email' => 'admin@quickadmin.com',
        'password' => Hash::make('adminadmin'),
    ]);
    
    $plain_user = User::create([
        'name' => 'Plain User',
        'email' => 'plain@quickadmin.com',
        'password' => Hash::make('plainuser'),
    ]);
    
    
    //Create default roles and permissions
    $admin = new Role();
    $admin->name         = 'admin';
    $admin->display_name = 'User Administrator';
    $admin->description  = 'User is allowed to manage and edit other users';
    $admin->save();
    
    $plain = new Role();
    $plain->name         = 'plain';
    $plain->display_name = 'Plain User';
    $plain->description  = 'User is allowed to perform basic actions';
    $plain->save();

    // role attach alias
    $user->attachRole($admin); // parameter can be an Role object, array, or id
    $plain_user->attachRole($plain);
  }

}
