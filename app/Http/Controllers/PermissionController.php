<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
class PermissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Permissions = Permission::get();
        return view('permission', compact('Permissions'));
    }
    
    public function save(Request $r) {
        $permission = new Permission();
        $permission->name = $r->name;
        $permission->display_name = $r->display_name;
        $permission->description = $r->description;
        $permission->save();
        return back();
    }
}
