<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use DB;
use App\Models\Permission as Permissions;
use Illuminate\Http\Request;

class permissionController extends Controller
{

    public function all(Permissions $permissions,Request $request){
        $page = $request->input('page') ?? 1;
        $permissionInfo = $permissions->paginate(10,['*'],'page',$page);
        return $permissionInfo;
    }

    public function index(){

        return view('role.index');

    }

    public function updateGet(){

        return view('role.index');

    }

    public function updatePost(){

        return view('role.index');

    }

    public function addGet(){

        return view('role.index');

    }

    public function addPost(){

        return view('role.index');

    }

    public function deletePost(){

        return view('role.index');

    }




}
