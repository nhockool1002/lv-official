<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;
use App\Categories;
use App\Publisher;
use App\Author;
use App\Comment;
use App\Language;
use File;
class BooksController extends Controller
{
	public function listBook(){
		$book = Book::orderBy('id','desc')->paginate(5);
		return view('admin.books.books',['book' => $book]);
	}
	public function addBook(){
		$book = Book::all();
		$auth = Author::all();
		$pub = Publisher::all();
		$cat = Categories::all();
        $lang = Language::all();
		return view('admin.books.addbook',['cat' => $cat,'auth' => $auth, 'pub' => $pub, 'book' => $book, 'lang' => $lang]);
	}
	public function postaddBook(Request $request){
		$this->validate($request, 
						[
							'book_name' => 'required|min:3|max:50',
							'book_desc' => 'required',
							'edition' => 'numeric|required',
							'filesTest' => 'required',
                            'filesDoc' => 'required',
                            'url' => 'required'
						], 
						[
							'book_name.required' => 'Không được để trống tên sách',
							'book_name.min' => 'Tên sách phải có ít nhất 3 ký tự nhiều nhất 50 ký tự',
							'book_name.max' => 'Tên sách phải có ít nhất 3 ký tự nhiều nhất 50 ký tự',
							'book_desc.required' => 'Phải nhập mô tả sách',
							'edition.numeric' => 'Lần tái bản phải là số',
							'edition.required' => 'Nhập lần tái bản',
							'filesTest.required' => 'Nhập hình ảnh đại diện cho sách',
                            'filesDoc.required' => 'Chọn file tài liệu',
                            'url.required' => 'Nhập liên kết tải tài liệu'
						]);
		if($request->hasFile('filesTest')){
			$file = $request->filesTest;
			$rand = rand_string(5);
			$namefile = $file->getClientOriginalExtension();
			$revstr = revstr($rand);
			$name = $rand.$revstr.".".$namefile;
			$file->move('upload/img/book/',$name);
       	}
        if($request->hasFile('filesDoc')){
			$file = $request->filesDoc;
			$rand = rand_string(5);
			$namefile = $file->getClientOriginalExtension();
			$revstr = revstr($rand);
			$filename = $rand.$revstr.".".$namefile;
			$file->move('upload/file/book/',$filename);
       	}
		$book = new Book();
		$book->book_name = $request->book_name;
		$book->book_desc = $request->book_desc;
		$book->img = $name;
		$book->auth_id = $request->auth_id;
		$book->cat_id = $request->cat_id;
		$book->pub_id = $request->pub_id;
        $book->lang_id = $request->lang_id;
		$book->edition = $request->edition;
		$book->credits = $request->credits;
        $book->specially = $request->specially;
        $book->url = $request->url;
        $book->filename = $filename;
		
//		echo $book->book_name."<br>".$book->book_desc."<br>".$book->img."<br>".$book->auth_id."<br>".$book->cat_id."<br>".$book->pub_id."<br>".$book->edition."<br>".$book->credits;
		$book->save();
		
		return redirect('admin/books/addbook')->with('success_mesage','Thêm sách thành công');
	}	
	public function geteditbook($id){
		$book = Book::find($id);
		$cat = Categories::all();
		$auth = Author::all();
		$pub = Publisher::all();
        $lang = Language::all();
		return view('admin.books.editbook',['book' => $book, 'cat' => $cat, 'auth' => $auth, 'pub' => $pub, 'lang' => $lang]);
	}
	public function posteditbook(Request $request, $id){
		$book = Book::find($id);
		$this->validate($request, 
						[
							'book_name' => 'required|min:3|max:50',
							'book_desc' => 'required',
							'edition' => 'numeric|required',
                            'url' => 'required'
						], 
						[
							'book_name.required' => 'Không được để trống tên sách',
							'book_name.min' => 'Tên sách phải có ít nhất 3 ký tự nhiều nhất 50 ký tự',
							'book_name.max' => 'Tên sách phải có ít nhất 3 ký tự nhiều nhất 50 ký tự',
							'book_desc.required' => 'Phải nhập mô tả sách',
							'edition.numeric' => 'Lần tái bản phải là số',
							'edition.required' => 'Nhập lần tái bản',
                            'filesDoc.required' => 'Chọn file tài liệu',
                            'url.required' => 'Nhập liên kết tải tài liệu'
						]);
		if($request->hasFile('filesTest')){
            if(!$request->hasFile('filesDoc')){
			$file = $request->filesTest;
			$rand = rand_string(5);
			$namefile = $file->getClientOriginalExtension();
			$revstr = revstr($rand);
			$name = $rand.$revstr.".".$namefile;
			$file->move('upload/img/book/',$name);
            File::delete('upload/img/book/'.$book->img);
			$book->book_name = $request->book_name;
			$book->book_desc = $request->book_desc;
			$book->img = $name;
			$book->auth_id = $request->auth_id;
			$book->cat_id = $request->cat_id;
			$book->pub_id = $request->pub_id;
            $book->lang_id = $request->lang_id;
			$book->edition = $request->edition;
			$book->credits = $request->credits;
            $book->specially = $request->specially;
            $book->url = $request->url;
			$book->save();
            }
            else{
            $file = $request->filesTest;
			$rand = rand_string(5);
			$namefile = $file->getClientOriginalExtension();
			$revstr = revstr($rand);
			$name = $rand.$revstr.".".$namefile;
			$file->move('upload/img/book/',$name);
                
            
            $file = $request->filesDoc;
			$rand = rand_string(5);
			$namefile = $file->getClientOriginalExtension();
			$revstr = revstr($rand);
			$filename = $rand.$revstr.".".$namefile;
			$file->move('upload/file/book/',$filename);
                
            File::delete('upload/img/book/'.$book->img);
            File::delete('upload/file/book/'.$book->filename);
                
			$book->book_name = $request->book_name;
			$book->book_desc = $request->book_desc;
			$book->img = $name;
            $book->filename = $filename;
			$book->auth_id = $request->auth_id;
			$book->cat_id = $request->cat_id;
			$book->pub_id = $request->pub_id;
            $book->lang_id = $request->lang_id;
			$book->edition = $request->edition;
			$book->credits = $request->credits;	
            $book->specially = $request->specially;
            $book->url = $request->url;
			$book->save();
            }
       	}
        elseif($request->hasFile('filesDoc')){
            if(!$request->hasFile('filesTest')){
                 $file = $request->filesDoc;
			     $rand = rand_string(5);
			     $namefile = $file->getClientOriginalExtension();
			     $revstr = revstr($rand);
			     $filename = $rand.$revstr.".".$namefile;
			     $file->move('upload/file/book/',$filename);
                File::delete('upload/file/book/'.$book->filename);
            $book->book_name = $request->book_name;
			$book->book_desc = $request->book_desc;
			$book->filename = $filename;
			$book->auth_id = $request->auth_id;
			$book->cat_id = $request->cat_id;
			$book->pub_id = $request->pub_id;
            $book->lang_id = $request->lang_id;
			$book->edition = $request->edition;
			$book->credits = $request->credits;
            $book->specially = $request->specially;
            $book->url = $request->url;
			$book->save();
            }
            else{
                $file = $request->filesTest;
			$rand = rand_string(5);
			$namefile = $file->getClientOriginalExtension();
			$revstr = revstr($rand);
			$name = $rand.$revstr.".".$namefile;
			$file->move('upload/img/book/',$name);
                
            
            $file = $request->filesDoc;
			$rand = rand_string(5);
			$namefile = $file->getClientOriginalExtension();
			$revstr = revstr($rand);
			$filename = $rand.$revstr.".".$namefile;
			$file->move('upload/file/book/',$filename);
                
            File::delete('upload/img/book/'.$book->img);
            File::delete('upload/file/book/'.$book->filename);
                
			$book->book_name = $request->book_name;
			$book->book_desc = $request->book_desc;
			$book->img = $name;
            $book->filename = $filename;
			$book->auth_id = $request->auth_id;
			$book->cat_id = $request->cat_id;
			$book->pub_id = $request->pub_id;
            $book->lang_id = $request->lang_id;
			$book->edition = $request->edition;
			$book->credits = $request->credits;	
            $book->specially = $request->specially;
            $book->url = $request->url;
			$book->save();
            }
        }
		else{
			$book->book_name = $request->book_name;
			$book->book_desc = $request->book_desc;
			$book->auth_id = $request->auth_id;
			$book->cat_id = $request->cat_id;
			$book->pub_id = $request->pub_id;
			$book->edition = $request->edition;
			$book->credits = $request->credits;	
            $book->specially = $request->specially;
            $book->url = $request->url;
			$book->save();
		}
		return redirect('admin/books/geteditbook/'.$id)->with('success_mesage','Sửa sách thành công');
	}	
	public function getdeletebook($id){
		$book = Book::find($id);
        File::delete('upload/file/book/'.$book->filename);
        File::delete('upload/img/book/'.$book->img);
		$book->delete();
		return redirect('admin/books')->with('success_mesage','Xóa sách thành công');
	}
	public function viewinfoBook($id){
        $book = Book::find($id);
        return view('home.bookinfo.bookinfo',['book' => $book]);
    }
    public function readBook($id){
        $book = Book::find($id);
        $cmt = Comment::where('book_id', $id)->orderBy('id', 'desc')->paginate(5);
        return view('home.bookread.bookread',['book' => $book,'cmt' => $cmt]);
    }
}
