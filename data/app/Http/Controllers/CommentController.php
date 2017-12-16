<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\Book;
use App\User;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    //
	public function listComment(){
		$cmt = Comment::paginate(5);
		return view('admin.comments.comments',['cmt' => $cmt]);
	}
    
    public function getXoacomment($id, $bookid){
        $cmt = Comment::find($id);
        $cmt->delete();
        
        return redirect('admin/books/geteditbook/'.$bookid)->with('success_mesage','Xóa bình luận thành công');
    }
    public function postComment($id,Request $request){
        		$this->validate($request, 
						[
							'content' => 'required|min:3|max:200'
						], 
						[
							'content.required' => 'Không được để trống trường',
                            'content.min' => 'Không được bình luận dưới 3 ký tự',
                            'content.max' => 'Không được bình luận trên 200 ký tự'
						]);

        $book = Book::find($id);
        $cmt = new Comment();
        $cmt->book_id = $book->id;
        $cmt->user_id = Auth::user()->id;
        $cmt->comment_content = $request->content;
        $cmt->comment_ip = $request->ip;
        $cmt->comment_user_agent = $request->agent;
        $cmt->save();
        
        return redirect('lv/bookread/'.$book->id."/#newcomment")->with('success_mesage','Thêm bình luận thành công');
    }
}
