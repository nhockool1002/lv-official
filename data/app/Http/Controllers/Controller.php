<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Auth;
use App\Book;
class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    function __construct(){
            $this->DangNhapAdmin();
        }
    public function DangNhapAdmin(){
        $user = Auth::user();
        view()->share('us',$user);
    }
    public function getAdminHome(){
        return view('admin.home.home');
    }
    public function getHome(){
        $book = Book::orderBy('id','desc')->paginate(9);
        $spec = Book::where('specially','1')->orderBy('id','desc')->take(6)->get();
        return view('home.index.index',['book' => $book,'spec' => $spec]);
    }
    public function rejectPage(){
        return view('home.warning.login');
    }
}
