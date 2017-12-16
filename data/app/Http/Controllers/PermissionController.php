<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permission;
class PermissionController extends Controller
{
    //
	public function listPermission(){
		$per = Permission::all();
		return view('admin.permissions.permissions', ['per' => $per]);
	}
}
