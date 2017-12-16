<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Publisher;
class PublisherController extends Controller
{
    public function listPublisher(){
        $pub = Publisher::orderBy('id','desc')->paginate(5);
		return view('admin.publisher.publisher', ['pub' => $pub]);
    }
    
    public function getaddPublisher(){
        return view('admin.publisher.addpublisher');
    }
    
    public function postaddPublisher(Request $request){
        $this->validate($request,[
            'pubname' => 'required|min:1|max:300',
            'pubemail' => 'required|min:3',
            'pubphone' => 'required'
        ],
        [
            'pubname.required' => 'Không được để trống tên nhà xuất bản',
            'pubname.min' => 'Tên nhà xuất bản quá ngắn',
            'pubname.max' => 'Tên nhà xuất bản quá dài',
            'pubemail.required' => 'Không được để trống Email',
            'pubemail.min' => 'Email quá ngắn hoặc không phù hợp',
            'pubphone' => 'Không được để trống số điện thoại'
        ]);
        $pub = new Publisher();
        $pub->pub_name = $request->pubname;
        $pub->pub_name_unc = changeTitle($request->pubname);
        $pub->pub_email = $request->pubemail;
        $pub->phone = $request->pubphone;
        $pub->save();
        return redirect('admin/publisher/getaddpublisher/')->with('success_mesage','Thêm nhà xuất bản thành công');
    }
    
    public function geteditPublisher($id){
        $pub = Publisher::find($id);
        return view('admin.publisher.editpublisher',['pub' => $pub]);
    }
    
    public function posteditPublisher($id, Request $request){
        $pub = Publisher::find($id);
        $this->validate($request,[
            'pubname' => 'required|min:1|max:300',
            'pubemail' => 'required|min:3',
            'pubphone' => 'required'
        ],
        [
            'pubname.required' => 'Không được để trống tên nhà xuất bản',
            'pubname.min' => 'Tên nhà xuất bản quá ngắn',
            'pubname.max' => 'Tên nhà xuất bản quá dài',
            'pubemail.required' => 'Không được để trống Email',
            'pubemail.min' => 'Email quá ngắn hoặc không phù hợp',
            'pubphone' => 'Không được để trống số điện thoại'
        ]);
        
        $pub->pub_name = $request->pubname;
        $pub->pub_name_unc = changeTitle($request->pubname);
        $pub->pub_email = $request->pubemail;
        $pub->phone = $request->pubphone;
        $pub->save();
        return redirect('admin/publisher/geteditpublisher/'.$id)->with('success_mesage','Sửa nhà xuất bản thành công');
    }

    public function getdeletePublisher($id){
        $pub = Publisher::find($id);
        $pub->delete();
        return redirect('admin/publisher')->with('success_mesage','Xóa nhà xuất bản thành công');
    }
}
