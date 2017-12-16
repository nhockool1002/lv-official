<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//       DB::table('title')->insert([
//		 	['title_name' => 'New Members'], ['title_name' => 'Fresher Members'],['title_name' => 'Senior Members'],['title_name' => 'Master Members']
//	   ]);
		DB::table('permission')->insert([
		 	['per_name' => 'User','per_color' => '#273c57','per_style' => '','per_icon' => 'mem.gif'], ['per_name' => 'Moderator','per_color' => '#458b2d','per_style' => 'font-weight:bolder;','per_icon' => 'mod.gif'],['per_name' => 'Global Moderator','per_color' => '#0477fc','per_style' => 'font-weight:bolder;','per_icon' => 'smod.gif'],['per_name' => 'Administrator','per_color' => '#f53810','per_style' => 'font-weight:bolder;','per_icon' => 'admin.gif'],['per_name' => 'Banned','per_color' => '#fff','per_style' => 'font-style:strike','per_icon' => 'banned.gif']
	   ]);
		
		DB::table('publisher')->insert([
		 	['pub_name' => 'Trẻ', 'pub_name_unc' => 'tre', 'pub_email' => 'hopthubandoc@nxbtre.com.vn', 'phone' => '02838437450 '],
			['pub_name' => 'Thanh Niên', 'pub_name_unc' => 'thanhnien', 'pub_email' => 'chinhanhnxbthanhnien@gmail.com', 'phone' => '0982526569'],
			['pub_name' => 'Kim Đồng', 'pub_name_unc' => 'kimdong', 'pub_email' => 'kimdong@hn.vnn.vn', 'phone' => '839250170'],
			['pub_name' => 'Tri Thức', 'pub_name_unc' => 'trithuc', 'pub_email' => 'lienhe@nxbtrithuc.com.vn', 'phone' => '02439454661'],
            ['pub_name' => 'Phụ Nữ', 'pub_name_unc' => 'phunu', 'pub_email' => 'truyenthongvaprnxbpn@gmail.com', 'phone' => '02838294459']
	   ]);
		
		DB::table('author')->insert([
		 	['auth_name' => 'Nguyễn Nhật Ánh', 'auth_nickname' => 'Nguyễn Nhật Ánh', 'auth_email' => '', 'date_of_birth' =>'1955/5/7'],
			['auth_name' => 'Vũ Phương Thanh', 'auth_nickname' => 'Gào', 'auth_email' => 'tannygao@gmail.com', 'date_of_birth' => '1988/8/7'],
			['auth_name' => 'Lê Thị Hồng Phương', 'auth_nickname' => 'Kawi Hồng Phương', 'auth_email' => '', 'date_of_birth' => '1992/4/21'],
			['auth_name' => 'Nguyễn Phong Việt', 'auth_nickname' => 'Nguyễn Phong Việt', 'auth_email' => '', 'date_of_birth' => '1980/7/18'],
            ['auth_name' => 'Phùng Thị Như Quỳnh', 'auth_nickname' => 'Quỳnh Thy', 'auth_email' => '', 'date_of_birth' => '1990/5/1']
	   ]);
		
		DB::table('categories')->insert([
            ['cat_name' => 'Giáo trình', 'cat_name_slug' => 'giao-trinh', 'cat_desc' => '', 'parent_id' => '0'],
		 	['cat_name' => 'Công nghệ thực phẩm', 'cat_name_slug' => 'cong-nghe-thuc-pham', 'cat_desc' => '', 'parent_id' => '1'],
			['cat_name' => 'Công nghệ sinh học', 'cat_name_slug' => 'cong-nghe-sinh-hoc', 'cat_desc' => '', 'parent_id' => '1'],
			['cat_name' => 'Công nghệ kỹ thuật điện', 'cat_name_slug' => 'cong-nghe-ky-thuat-dien', 'cat_desc' => '', 'parent_id' => '1'],
			['cat_name' => 'Công nghệ viễn thông', 'cat_name_slug' => 'cong-nghe-vien-thong', 'cat_desc' => '', 'parent_id' => '1'],
            ['cat_name' => 'Công nghệ thông tin', 'cat_name_slug' => 'cong-nghe-thong-tin', 'cat_desc' => '', 'parent_id' => '1'],
            ['cat_name' => 'Văn hóa', 'cat_name_slug' => 'van-hoa', 'cat_desc' => '', 'parent_id' => '0']
	   ]);
        
        DB::table('languages')->insert([
            ['lang_name'=> 'Tiếng Việt','created_at' => new DateTime()],
            ['lang_name'=> 'Tiếng Anh','created_at' => new DateTime()],
            ['lang_name'=> 'Tiếng Pháp','created_at' => new DateTime()],
        ]);
		
		DB::table('users')->insert([
		 	['username' => 'test', 'password' => bcrypt('123456'), 'email' => 'test@gmail.com',  'per_id' => '1', 'created_at' => new DateTime(),'lastlogin' => new DateTime(),],
			['username' => 'test1', 'password' => bcrypt('123456'), 'email' => 'test1@gmail.com', 'per_id' => '2','created_at' => new DateTime(),'lastlogin' => new DateTime()],
			['username' => 'test2', 'password' => bcrypt('123456'), 'email' => 'test2@gmail.com',  'per_id' => '3','created_at' => new DateTime(),'lastlogin' => new DateTime()],
			['username' => 'test3', 'password' => bcrypt('123456'), 'email' => 'test3@gmail.com',  'per_id' => '5','created_at' => new DateTime(),'lastlogin' => new DateTime()],
            ['username' => 'nhockool1002', 'password' => bcrypt('0909274128'), 'email' => 'kangtadragon@gmail.com',  'per_id' => '4','created_at' => new DateTime(),'lastlogin' => new DateTime()]
	   ]);
		
		DB::table('book')->insert([
		 	['book_name' => 'C/C++ DEvS', 'book_desc' => 'lorem insukd skk lao clakfgk chamch oiaoci lcoaj local nal elkvl fauckack table kckso', 'edition' => '1', 'auth_id' => '1', 'cat_id' => '3', 'pub_id' => '2', 'img' => 'gfddVVddfg.jpg', 'created_at' => new DateTime(), 'lang_id' => '1', 'url'=> 'http://google.com', 'filename' => 'okRMLLMRko.pdf'],
			['book_name' => 'PHP Development', 'book_desc' => 'lorem insukd skk lao clakfgk chamch oiaoci lcoaj local nal elkvl fauckack table kckso', 'edition' => '1', 'auth_id' => '2', 'cat_id' => '3', 'pub_id' => '3', 'img' => 'xYu8II8uYx.jpg', 'created_at' => new DateTime(), 'lang_id' => '2', 'url'=> 'http://google.com', 'filename' => 'ecpfjjfpce.pdf'],
			['book_name' => 'Java ES6', 'book_desc' => 'lorem insukd skk lao clakfgk chamch oiaoci lcoaj local nal elkvl fauckack table kckso', 'edition' => '2', 'auth_id' => '2', 'cat_id' => '3', 'pub_id' => '2', 'img' => 'CA2u66u2AC.jpeg', 'created_at' => new DateTime(), 'lang_id' => '3', 'url'=> 'http://google.com', 'filename' => 'ysdXppXdsy.pdf'],
			['book_name' => 'Windows', 'book_desc' => 'lorem insukd skk lao clakfgk chamch oiaoci lcoaj local nal elkvl fauckack table kckso', 'edition' => '2', 'auth_id' => '3', 'cat_id' => '2', 'pub_id' => '1', 'img' => 'ZhqueeuqhZ.png', 'created_at' => new DateTime(),'lang_id' => '3', 'url'=> 'http://google.com', 'filename' => 'yTxwggwxTy.pdf']
	   ]);
		DB::table('comment')->insert([
		 	['book_id' => '1', 'user_id' => '1', 'comment_content' => 'Dữ liệu mẫu thứ 1'],
			['book_id' => '1', 'user_id' => '2', 'comment_content' => 'Dữ liệu mẫu thứ 2'],
			['book_id' => '2', 'user_id' => '1', 'comment_content' => 'Dữ liệu mẫu thứ 3'],
			['book_id' => '3', 'user_id' => '3', 'comment_content' => 'Dữ liệu mẫu thứ 4']
	   ]);
    }
}
