<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Banned;
use App\User;

class BannedController extends Controller
{
    public function getbannedList(){
        $ban = Banned::all();
        return view('admin.users.listbanned',['ban' => $ban]);
    }
    
    public function postunbanned(Request $request,$id){
        $user = User::find($id);
        $ban = Banned::where('idUser','=',$id)->first();
        
        $user->per_id = 1;
        $user->timeswarning = $ban->times;
        $user->save();
        
        $ban->delete();
        return redirect('admin/users/getbannedlist/')->with('success_mesage','Mở khóa thành viên thành công');
    }
}
