<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function listBanner()
    {
        $listBanner = Banner::paginate(10); // Lấy danh sách banner và phân trang
        return view('admin.banner.list-banner')->with(['listBanner' => $listBanner]);
    }
    public function addBanner()
    {
        return view('admin.banner.add-banner');
    }

    // Phương thức để xử lý thêm mới banner
    public function addPostBanner(Request $request)
    {
        $imageURL = '';
        if ($request->hasFile('imageBanner')) {
            $image = $request->file('imageBanner');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "banner/";
            $image->move(public_path($link), $nameImage);
            $imageURL = $link . $nameImage;
        }
        $data = [
            'name' => $request->nameBanner,
            'image' => $imageURL,
            'description' => $request->descriptionBanner,
        ];
        Banner::create($data);
        return redirect()->route('admin.banner.listBanner')->with(['message' => 'Thêm Mới Thành Công']);
    }

    public function deleteBanner(Request $request)
    {
        $banner = Banner::find($request->id);
        if ($banner->image != null && $banner->image != '') {
            File::delete(public_path($banner->image)); // Xóa ảnh nếu có
        }
        $banner->delete();
        return redirect()->back()->with(['message' => 'Xoá thành công']);
    }
    // Phương thức để hiển thị chi tiết banner
    public function detailBanner($idBanner)
    {
        $banner = Banner::where('id', $idBanner)->first();
        return view('admin.banner.detail-banner')->with(['banner' => $banner]);
    }

    // Phương thức để hiển thị form cập nhật banner
    public function updateBanner($idBanner)
    {
        $banner = Banner::where('id', $idBanner)->first();
        return view('admin.banner.update-banner')->with(['banner' => $banner]);
    }

    // Phương thức để xử lý cập nhật banner
    public function updatePatchBanner(Request $request, $idBanner)
    {
        $banner = Banner::where('id', $idBanner)->first();
        $linkImage = $banner->image;
        if ($request->hasFile('imageBanner')) {
            File::delete(public_path($banner->image)); // Xóa ảnh cũ
            $image = $request->file('imageBanner');
            $newName = time() . "." . $image->getClientOriginalExtension();
            $linkStorage = 'banner/';
            $image->move(public_path($linkStorage), $newName);
            $linkImage = $linkStorage . $newName;
        }
        $data = [
            'name' => $request->nameBanner,
            'image' => $linkImage,
            'description' => $request->descriptionBanner,
        ];
        Banner::where('id', $idBanner)->update($data);
        return redirect()->route('admin.banner.listBanner')->with(['message' => 'Sửa Thành Công']);
    }
    
}
