<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;
use App\Comment;
class AjaxController extends Controller
{
    function getVoice($id){
        $book = Book::find($id);
        $str = $book->book_name."  của tác giả ".$book->author->auth_name;
        getVoice($str);
    }
    function getVoiceComment($id){
        $cmt = Comment::find($id);
        $str = "Thành viên ".$cmt->users->username." đã bình luận : ".$cmt->comment_content;
        getVoice($str);
    }
}
