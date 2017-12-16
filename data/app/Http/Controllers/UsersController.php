<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Permission;
use App\Banned;
class UsersController extends Controller
{
    public function getDanhsach(){
		$users = User::paginate(5);
		return view('admin.users.listusers',['users' => $users]);
	}
	
	public function addUsers(){
        $per = Permission::all();
		return view('admin.users.addusers',['per' => $per]);
	}
    
    public function postaddUser(Request $request){
        $this->validate($request, 
                        [
                            'username' => 'required|min:3|max:40',
                            'password' => 'required|min:6|max:40',
                            'phone' => 'min:10|max:12',
                            'email' => 'required'
                        ],
                        [
                            'username.required' => 'Username không được để trống',
                            'username.min' => 'Username phải nhiều hơn  3 ký tự và ít hơn 40 ký tự',
                            'username.max' => 'Username phải nhiều hơn  3 ký tự và ít hơn 40 ký tự',
                            'password.minx' => 'Password phải nhiều hơn  6 ký tự và ít hơn 40 ký tự',
                            'password.max' => 'Password phải nhiều hơn  6 ký tự và ít hơn 40 ký tự',
                            'phone.min' => 'Số điện thoại phải từ 10 số tới 11 số',
                            'phone.max' => 'Số điện thoại phải từ 10 số tới 11 số',
                            'email.required' => 'Email không được để trống'
                        ]);
        $user = new User();
		$user->username = $request->username;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->per_id = $request->permission;
        $user->save();
		return redirect('admin/users/addusers')->with('success_mesage','Tạo thành viên thành công');
    }
    
    public function geteditUser($id){
        $per = Permission::all();
        $user = User::find($id);
        return view('admin.users.editusers',['user' => $user, 'per' => $per]);
    }
    
    public function posteditUser(Request $request, $id){
        $user = User::find($id);
        $this->validate($request, 
                        [
                            'username' => 'required|min:3|max:40',
                            'phone' => 'min:10|max:12',
                            'email' => 'required'
                        ],
                        [
                            'username.required' => 'Username không được để trống',
                            'username.min' => 'Username phải nhiều hơn  3 ký tự và ít hơn 40 ký tự',
                            'username.max' => 'Username phải nhiều hơn  3 ký tự và ít hơn 40 ký tự',
                            'phone.min' => 'Số điện thoại phải từ 10 số tới 11 số',
                            'phone.max' => 'Số điện thoại phải từ 10 số tới 11 số',
                            'email.required' => 'Email không được để trống'
                        ]);
		$user->username = $request->username;
        if($request->password != ""){
        $user->password = $request->password;
        }
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->per_id = $request->permission;
        $user->save();
		return redirect('admin/users/getedituser/'.$id)->with('success_mesage','Sửa thành viên thành công');
    }
    
    public function getdeleteUser($id){
        $user = User::find($id);
		$user->delete();
		return redirect('admin/users')->with('success_mesage','Xóa thành viên thành công');
    }
    
    public function postbannedUser(Request $request, $id){
        $user = User::find($id);
        $ngayupdate = $user->updated_at;
        $rangeone = (3*86400);
        $rangetwo = (7*86400);
        $rangethree = (30*86400);
        $type = $request->optradio;
        $vv = "2030-12-03 16:56:4";
        if($type == 1){
            $user->per_id = 5;
            $user->save();
            if($ban = Banned::where('idUser', '=', $user->id)->count() > 0){
                $ban = Banned::where('idUser', '=', $user->id)->first();
            $ban->idUser = $user->id;
                $times = $ban->times;
                $kq = $times + 1;
            $ban->times = $kq;
                $ban->reason = $request->reason;
            $ban->expire = $vv;
            $ban->save();
                return redirect('admin/users/getedituser/'.$id)->with('success_mesage','Khóa thành viên vĩnh viễn');
            }
            else{
            $ban = new Banned();
            $ban->idUser = $user->id;
            $ban->times = $user->timeswarning + 1;
                $ban->reason = $request->reason;
            $ban->expire = $vv;
            $ban->save();
                return redirect('admin/users/getedituser/'.$id)->with('success_mesage','Khóa thành viên vĩnh viễn');
                }
        }
        else{
            $range = $request->choose;
            if($range == 0){
                $user->per_id = 5;
                $user->save();
                if($ban = Banned::where('idUser', '=', $user->id)->count() > 0){
                $ban = Banned::where('idUser', '=', $user->id)->first();

            $ban->idUser = $user->id;
            $s = $ban->expire;
                $time = strtotime($s);
                $timeadd = $time + $rangeone;
                $rs = date('Y-m-d H:i:s', $timeadd);
            $ban->expire = $rs;
                $times = $ban->times;
                $kq = $times + 1;
            $ban->times = $kq;
                    $ban->reason = $request->reason;
            $ban->save();
                    return redirect('admin/users/getedituser/'.$id)->with('success_mesage','Thời gian khóa thành viên +3 ngày');
            }
            else{
            $ban = new Banned();
            $ban->idUser = $user->id;
                $time = strtotime($ngayupdate);
                $timeadd = $time + $rangeone;
                $rs = date('Y-m-d H:i:s', $timeadd);
            $ban->expire = $rs;
            $ban->times = $user->timeswarning + 1;
                $ban->reason = $request->reason;
            $ban->save();
                return redirect('admin/users/getedituser/'.$id)->with('success_mesage','Khóa thành viên 3 ngày');
                }
            }
            elseif($range == 1){
                echo "Khóa 7 ngày";
                $user->per_id = 5;
                $user->save();
                if($ban = Banned::where('idUser', '=', $user->id)->count() > 0){
                    $ban = Banned::where('idUser', '=', $user->id)->first();
                    $ban->idUser = $user->id;
                   $s = $ban->expire;
                $time = strtotime($s);
                $timeadd = $time + $rangetwo;
                $rs = date('Y-m-d H:i:s', $timeadd);
            $ban->expire = $rs;
                $times = $ban->times;
                $kq = $times + 1;
            $ban->times = $kq;
                    $ban->reason = $request->reason;
            $ban->save();
                    return redirect('admin/users/getedituser/'.$id)->with('success_mesage','Thời gian khóa thành viên +7 ngày');
                }
                else{
                    $ban = new Banned();
                    $ban->idUser = $user->id;
                    $time = strtotime($ngayupdate);
                    $timeadd = $time + $rangetwo;
                    $rs = date('Y-m-d H:i:s', $timeadd);
                    $ban->expire = $rs;
                    $ban->times = $user->timeswarning + 1;
                    $ban->reason = $request->reason;
                    $ban->save();
                    return redirect('admin/users/getedituser/'.$id)->with('success_mesage','Khóa thành viên 7 ngày');
                }
            }else{
                echo "Khóa 30 ngày";
                $user->per_id = 5;
            $user->save();
             if($ban = Banned::where('idUser', '=', $user->id)->count() > 0){
                $ban = Banned::where('idUser', '=', $user->id)->first();
            $ban->idUser = $user->id;
                $s = $ban->expire;
                $time = strtotime($s);
                $timeadd = $time + $rangethree;
                $rs = date('Y-m-d H:i:s', $timeadd);
            $ban->expire = $rs;
                $times = $ban->times;
                $kq = $times + 1;
            $ban->times = $kq;
                 $ban->reason = $request->reason;
            $ban->save();
                    return redirect('admin/users/getedituser/'.$id)->with('success_mesage','Thời gian khóa thành viên +30 ngày');
            }
            else{
            $ban = new Banned();
            $ban->idUser = $user->id;
                $time = strtotime($ngayupdate);
                $timeadd = $time + $rangethree;
                $rs = date('Y-m-d H:i:s', $timeadd);
            $ban->expire = $rs;
            $ban->times = $user->timeswarning + 1;
            $ban->reason = $request->reason;
            $ban->save();
                return redirect('admin/users/getedituser/'.$id)->with('success_mesage','Khóa thành viên 30 ngày');
                }
            }
        }

    }
    
    public function getdangnhapAdmin(){
        return view('adminlogin');
    }
    
    public function postdangnhapAdmin(Request $request){
        $this->validate($request,
        [
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Vui lòng không để trống trường Username',
            'password.required' => 'Vui lòng không để trống trường Password'
        ]);
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            $user = Auth::user();
            $user->lastlogin = new DateTime();
            $user->save();
            return redirect('admin');
        }
        else
        {
            return redirect('admin/dangnhap')->with('success_mesage','Vui lòng đăng nhập');
        }
        
    }
    
    public function getlogoutAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap')->with('success_mesage','Vui lòng đăng nhập');
    }
   
    public function getlogoutUser(){
        Auth::logout();
        return redirect('/');
    }
    
    public function postdangnhapUser(Request $request){
        $this->validate($request,
        [
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Vui lòng không để trống trường Username',
            'password.required' => 'Vui lòng không để trống trường Password'
        ]);
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            $user = Auth::user();
            $user->lastlogin = new DateTime();
            $user->save();
            if($user->per_id == 5){
                Auth::logout();
                return redirect('/signin')->with('success_mesage','Tài khoản bạn đang bị khóa không được phép truy cập');
            }
            else{
                return redirect('/');
            }
        }
        else
        {
            return redirect('/signin')->with('success_mesage','Kiểm tra lại tài khoản hoặc mật khẩu');
        }
    }
}
