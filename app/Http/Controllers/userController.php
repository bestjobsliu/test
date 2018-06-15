<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use DB;
use app\Models\User;
use app\Models\Permission as Permissions;

class userController extends Controller
{


    public function index(User $user){

        $userInfo = $user->paginate(10);



        return view('user.index');


//        $role = Role::create(['name' => 'writer']);
//        $permission = Permission::create(['name' => 'delete articles']);


/*        $user = Auth::user();



        $role = Role::findById('1');*/
//
//
//        $role->syncPermissions(['edit articles','delete articles']);
//
//        var_dump($user);exit;


/*        $permissions = $role->permissions;

        print_r($permissions);exit;*/



//        var_dump($user);exit;
//        $user->givePermissionTo(['edit articles', 'delete articles']);


//        var_dump($users);

//        exit;

    }

    public function addRoleGet(Request $request,Permissions $permission)
    {
        $roleId = $request->input('role_id');
        $permissionInfo = $permission->all();
        $count = $permission->withCount;
        return view('role.addPermission');
    }

    public function addRolePost(Request $request)
    {
        $permissions = $request->input('permissions');
        $roleId = $request->input('role_id');
        $role = Role::findById($roleId);
        $role->syncPermissions($permissions);
        return '更新成功';
    }

}
