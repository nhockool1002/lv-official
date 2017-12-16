<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Author;
use File;
class AuthorController extends Controller
{
    //
	public function listAuthor(){
		$author = Author::paginate(5);
		return view('admin.authors.authors',['author' => $author]);
	}	
	public function addAuthor(){
		return view('admin.authors.addauthor');
	}
	public function postaddAuthor(Request $request){
		$this->validate($request, 
						[
							'auth_name' => 'required|min:3|max:50',
							'auth_nickname' => 'min:3|max:50',
							'auth_email' => 'required',
							'date_of_birth' => 'required',
                            'authimg' => 'required',
						], 
						[
							'auth_name.required' => 'Tên tác giả không được để trống',
							'auth_name.min' => 'Tên tác giả phải từ 3 ký tự đến 50 ký tự',
							'auth_name.max' => 'Tên tác giả phải từ 3 ký tự đến 50 ký tự',
							'auth_nickname.min' => 'Tên nickname phải từ 3 ký tự đến 50 ký tự',
							'auth_nickname.max' => 'Tên nickname phải từ 3 ký tự đến 50 ký tự',
							'date_of_birth.required' => 'Ngày sinh không được để trống',
                            'authimg.required' => 'Nhập hình ảnh đại diện cho tác giả'
						]);
        
        if($request->hasFile('authimg')){
			$file = $request->authimg;
			$rand = rand_string(5);
			$namefile = $file->getClientOriginalExtension();
			$revstr = revstr($rand);
			$name = $rand.$revstr.".".$namefile;
			$file->move('upload/img/author/',$name);
            
       	}
        $au = new Author();
        $au->img = $name;
		$au->auth_name = $request->auth_name;
		$au->auth_nickname = $request->auth_nickname;
		$au->auth_email = $request->auth_email;
		$au->date_of_birth = $request->date_of_birth;
		$au->date_of_death = $request->date_of_death;
        $au->height = $request->height;
        $au->weight = $request->weight;
        $au->quote = $request->quote;
        $au->story = $request->story;
		$au->save();
		
		return redirect('admin/authors/addauthor')->with('success_mesage','Thêm tác giả thành công');
	}    
    public function geteditauthor($id){
        $auth = Author::find($id);
        return view('admin.authors.editauthor',['auth' => $auth]);
    }
    public function posteditauthor(Request $request, $id){
        $author = Author::find($id);
        $this->validate($request, 
						[
							'auth_name' => 'required|min:3|max:50',
							'auth_nickname' => 'min:3|max:50',
							'auth_email' => 'required',
							'date_of_birth' => 'required'
						], 
						[
							'auth_name.required' => 'Tên tác giả không được để trống',
							'auth_name.min' => 'Tên tác giả phải từ 3 ký tự đến 50 ký tự',
							'auth_name.max' => 'Tên tác giả phải từ 3 ký tự đến 50 ký tự',
							'auth_nickname.min' => 'Tên nickname phải từ 3 ký tự đến 50 ký tự',
							'auth_nickname.max' => 'Tên nickname phải từ 3 ký tự đến 50 ký tự',
							'date_of_birth.required' => 'Ngày sinh không được để trống'
						]);
        
        if($request->hasFile('authimg')){
			$file = $request->authimg;
			$rand = rand_string(5);
			$namefile = $file->getClientOriginalExtension();
			$revstr = revstr($rand);
			$name = $rand.$revstr.".".$namefile;
            
			$file->move('upload/img/author/',$name);
            File::delete('upload/img/author/'.$author->img);
            
            $author->auth_name = $request->auth_name;
            $author->auth_nickname = $request->auth_nickname;
            $author->auth_email = $request->auth_email;
            $author->date_of_birth = $request->date_of_birth;
            $author->date_of_death = $request->date_of_date;
            $author->height = $request->height;
            $author->weight = $request->weight;
            $author->quote = $request->quote;
            $author->story = $request->story;
            $author->img = $name;
            $author->save();
       	}
        else{
        $author->auth_name = $request->auth_name;
        $author->auth_nickname = $request->auth_nickname;
        $author->auth_email = $request->auth_email;
        $author->date_of_birth = $request->date_of_birth;
        $author->date_of_death = $request->date_of_date;
        $author->height = $request->height;
        $author->weight = $request->weight;
        $author->quote = $request->quote;
        $author->story = $request->story;
        $author->save();
        }
        return redirect('admin/authors/geteditauthor/'.$id)->with('success_mesage','Sửa tác giả thành công');
            
    }  
    public function getdeleteauthor($id){
        $auth = Author::find($id);
        $auth->delete();
        return redirect('admin/authors')->with('success_mesage','Xóa tác giả thành công');
    }
    public function getInfoAuthor($id){
        $au =  Author::find($id);
        return view('home.authorinfo.authorinfo',['au'  => $au]);
    }
}
