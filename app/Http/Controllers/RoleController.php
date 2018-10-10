<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
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
        $roles = Role::get();
        return view('role', compact('roles'));
    }
    
    public function save(Request $r) {
        $role = new Role();
        $role->name = $r->name;
        $role->display_name = $r->display_name;
        $role->description = $r->description;
        $role->save();
        return back();
    }
}
