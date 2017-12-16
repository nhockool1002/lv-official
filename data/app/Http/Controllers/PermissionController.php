<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permission;
use File;
class PermissionController extends Controller
{
    //
	public function listPermission(){
		$per = Permission::all();
		return view('admin.permissions.permissions', ['per' => $per]);
	}
    public function getaddPermission(){
        return  view('admin.permissions.addpermission');
    }
    public function postaddPermission(Request $request){
        $this->validate($request,[
            'pername' => 'required',
            'percolor' => 'required'
        ],
        [
            'pername.required' => 'Không được để trống tên quyền hạn',
            'percolor.required' => 'Không được để trống màu',
        ]);
        
        $per = new Permission();
        if($request->hasFile('pericon')){
			$file = $request->pericon;
            $namefile =  $file->getClientOriginalName();
			$file->move('lib/img/',$namefile);
            $per->per_icon = $namefile;
       	}
        $per->per_name = $request->pername;
        $per->per_color =  $request->percolor;
        $per->per_style =  $request->perstyle;
        $per->save();
        return redirect('admin/permissions')->with('success_mesage','Thêm quyền hạn thành công');
    }
    
    public function geteditpermission($id){
        $per = Permission::find($id);
        return view('admin.permissions.editpermission',['per' => $per]);
    }
    
    public function posteditPermission($id, Request $request){
        $per = Permission::find($id);
        $this->validate($request,[
            'pername' => 'required',
            'percolor' => 'required'
        ],
        [
            'pername.required' => 'Không được để trống tên quyền hạn',
            'percolor.required' => 'Không được để trống màu',
        ]);
        
        if($request->hasFile('pericon')){
			$file = $request->pericon;
            $namefile =  $file->getClientOriginalName();
			$file->move('lib/img/',$namefile);
            File::delete('lib/img/'.$per->per_icon);
            $per->per_icon = $namefile;
       	}
        $per->per_name = $request->pername;
        $per->per_color =  $request->percolor;
        $per->per_style =  $request->perstyle;
        $per->save();
        return redirect('admin/permissions')->with('success_mesage','Thay đổi quyền hạn thành công');
    }
}
