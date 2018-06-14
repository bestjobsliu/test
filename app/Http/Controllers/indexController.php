<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use App\User;

class indexController extends Controller
{
//    protected $guard_name = 'web';


    public function index(){
//        $role = Role::create(['name' => 'writer']);
//        $permission = Permission::create(['name' => 'delete articles']);


        $user = Auth::user();

        $permissions = $user->permissions;

        print_r($permissions);exit;



//        var_dump($user);exit;
        $user->givePermissionTo(['edit articles', 'delete articles']);


//        var_dump($users);

        exit;

    }

}
