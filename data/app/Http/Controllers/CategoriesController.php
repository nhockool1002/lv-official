<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categories;
class CategoriesController extends Controller
{
    //
	public function getDanhsach(){
		$cat = Categories::paginate(5);
		return view('admin.categories.listcat',['cat' => $cat]);
	}
	
	public function addCat(){ 
		$cat = Categories::all();
		$addcat = "";
		return view('admin.categories.addcat',['addcat' => $addcat,'cat' => $cat]);
	}
	
	public function postaddCat(Request $request){
		$this->validate($request,
					[
						'catname' => 'required|min:3|max:100|unique:categories,cat_name',
						'desc' => 'required',
					],
					[
						'catname.required' => 'Tên danh mục không được để rỗng',
						'catname.min' => 'Tên danh mục không được có dưới 3 ký tự',
						'catname.max' => 'Tên danh mục không được quá 100 ký tự',
						'catname.unique' => 'Tên danh mục này đã tồn tại',
						'desc.required' => 'Mô tả không được để trống'
					]);
		$cat = new Categories();
		$cat->cat_name = $request->catname;
		$cat->cat_name_slug = changeTitle($request->catname);
		$cat->cat_desc = $request->desc;
		$cat->parent_id = $request->parentid;
		$cat->save();
		
		return redirect('admin/categories/addcat')->with('success_mesage','Tạo danh mục sách thành công');
		
	}
	
	public function geteditCat($id){
		$pcat = Categories::all();
		$cat = Categories::find($id);
		return view('admin.categories.editcat',['cat' => $cat, 'pcat' => $pcat]);
	}
	
	public function posteditCat(Request $request,$id){
		$cat = Categories::find($id);
		$this->validate($request,
					[
						'catname' => 'required|min:3|max:100',
						'desc' => 'required',
					],
					[
						'catname.required' => 'Tên danh mục không được để rỗng',
						'catname.min' => 'Tên danh mục không được có dưới 3 ký tự',
						'catname.max' => 'Tên danh mục không được quá 100 ký tự',
						'desc.required' => 'Mô tả không được để trống'
					]);
		$cat->cat_name = $request->catname;
		$cat->cat_name_slug = changeTitle($request->catname);
		$cat->cat_desc = $request->desc;
		$cat->parent_id = $request->parentid;
		$cat->save();
		return redirect('admin/categories/geteditcat/'.$id)->with('success_mesage','Sửa danh mục sách thành công');
	}
	
	
	public function getdeletecat($id){
		$cat = Categories::find($id);
		$cat->delete();
		return redirect('admin/categories')->with('success_mesage','Xóa danh mục sách thành công');
	}
}
