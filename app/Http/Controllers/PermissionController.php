<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perms = Permission::orderBy('id', 'desc')->get();

        return view('users.permissions', ['perms' => $perms]);
    }
}
