<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use DB;

class indexController extends Controller
{


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
