<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use DB;
use App\User;
use App\Models\Permission as Permissions;
use Illuminate\Http\Request;

class userController extends Controller
{


    public function index(User $user){

        $userObj = Auth::user();

//        print_r($userObj);exit;

        $username = $userObj->name;
/*        $userObj = User::find(2);
        $userObj->assignRole('writer');*/
        return view('user.index',['username' => $username]);


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

    public function getUserList(Request $request,User $user){
        $page = $request->input('page') ?? 1;

        if(!empty($request->input('name'))){
            $name = $request->input('name');
            $userList = $user
                ->where('name','like',"%$name%")
                ->where('email','like',"%$name%")
                ->paginate(10,['*'],'page',$page);
        } else {
            $userList = $user->paginate(10,['*'],'page',$page);
        }
        $userInfo = $userList;
        return $userInfo;
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
