<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use DB;
use App\Models\Roles;
use Illuminate\Http\Request;

class roleController extends Controller
{

    public function all(Roles $roles,Request $request){
        $page = $request->input('page') ?? 1;
        $rolesInfo = $roles->paginate(10,['*'],'page',$page);
        return $rolesInfo;
    }

    public function index(){

        return view('role.index');

    }

    public function updateGet(){

        return view('role.update');

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
