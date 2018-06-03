<?php

use App\Role;
use App\User;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// CRUD - Create

Route::get('/create', function(){

    // find the user

    //$user = User::findOrFail(1);

    // add Administator role to Roles in DB
    // $role = new Role(['name'=>'Administrator']);
   // $user->roles()->save($role);

    // can also be written on one line

   // $user->roles()->save(new Role(['name'=>'Administrator']));

    // find user

    $user = User::findOrFail(2);

    //add subscriber to DB

    $user->roles()->save(new Role(['name'=>'OneTimeThing']));

    return "Entry made";
    // dd($user->role);
});

// CRUD - Read

Route::get('/read', function(){

    // grab data from DB

    $user = User::findOrFail(1);

    foreach($user->roles as $role){

        echo $role . "<br>";
    }

});

// CRUD - Update

Route::get('/update/{id}/2', function($id){

    $user = User::findOrFail($id);

    if($user->has('roles')){

        foreach($user->roles as $role){

            if($role->name == 'Administrator'){

                $role->name = 'Administrator2';

                $role->save();

            }
        }
    }

});

// CRUD - Delete

Route::get('/delete', function(){

    $user = User::findOrFail(1);

    foreach($user->roles as $role){

        $role->whereId(2)->delete();

    }

});

// Attaches a role to a user

Route::get('/attach', function(){

    $user = User::findOrFail(2);

    $user->roles()->attach(3);

});

//// Detaches a role from a user
//
//Route::get('/detach', function(){
//
//    $user = User::findOrFail(2);
//
//    $user->roles()->detach(3);
//
//});

// Detaches all roles from the user

Route::get('/detach', function(){

    $user = User::findOrFail(2);

    $user->roles()->detach();

});


// sync

Route::get('/sync', function(){

    $user = User::findOrFail(1);

    $user->roles()->sync([1,2]);

});

Route::get('/whatever', function(){



});

// add some text to help test commits







