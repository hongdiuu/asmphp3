<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategories(){
        $listCategories = Category::paginate(7);
        return view('admin.category.list-category')->with(['listCategories' => $listCategories]);
    }
    public function addCategories(){
        return view('admin.category.add-category');
    }
      public function addPostCategories(Request $request){
        $data = [
            'name' => $request->nameCategory,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        Category::create($data);
        return redirect()->route('admin.category.listCategories')->with(['message' => 'Thêm Mới Thành Công']);
    }

    public function deleteCategories(Request $request){
        Category::where('id', $request->id)->delete();
        return redirect()->back()->with([
            'message' => 'Xoá Thành Công',
        ]);
    }

    public function updateCategories($idProduct){
        $listCategories = Category::where('id', $idProduct)->first();
        // Trả view và truyền cả hai biến vào
        return view('admin.category.update-category')->with([
            'listCategories' => $listCategories,
        ]);

    }

    public function updatePatchCategories(Request $request, $idProduct){
    
        Category::where('id', $idProduct)->first();
        $data = [
            'name' => $request->nameCategory,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
           ];
           Category::where('id', $idProduct)->update($data);
           return redirect()->route('admin.category.listCategories')->with(['message' => 'Sửa Thành Công']);
    }
}
