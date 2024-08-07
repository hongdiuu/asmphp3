<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function listProducts()
    {
        // images duoc lay tu ham ben product model
        $listProducts = Product::with('images:id,product_id,image_url')->with('category:id,name')->paginate(4);
        return view('admin.product.list-product')->with(['listProducts' => $listProducts]);
    }
    public function addProduct()
    {
        // dd('hiada');
        $categories = Category::select('id', 'name')->get();
        // dd($categories);
        return view('admin.product.add-product')->with(['categories' => $categories]);
    }

    public function addPostProduct(ProductRequest $request)
    {
        // dd($request->all());
        $imageURL = '';
        if ($request->hasFile('imageProduct')) {
            $image = $request->file('imageProduct');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "imageProduct/";
            $image->move(public_path($link), $nameImage);
            $imageURL = $link . $nameImage;
        }
        $data = [
            'name' => $request->nameProduct,
            'image' => $imageURL,
            'price' => $request->priceProduct,
            'description' => $request->descriptionProduct,
            'category_id' => $request->category_id,
        ];
        Product::create($data);
        return redirect()->route('admin.product.listProducts')->with(['message' => 'Thêm Mới Thành Công']);
    }
    public function deleteProduct(Request $request)
    {
        $products = Product::find($request->id);
        if ($products->image != null && $products->image != '') {
            File::delete(public_path($products->image));
        }
        $products->delete();
        return redirect()->back()->with(['message' => 'Xoá thành công']);
    }

    public function detailProduct($idProduct)
    {
        $listProducts = Product::where('id', $idProduct)->first();
        return view('admin.product.detail-product')->with(['listProducts' => $listProducts]);
    }

    public function updateProduct($idProduct)
    {
        $listProducts = Product::where('id', $idProduct)->first();
        $categories = Category::all();
        return view('admin.product.update-product')->with([
            'listProducts' => $listProducts,
            'categories' => $categories
        ]);
    }

    public function updatePactchProduct(UpdateProductRequest $request, $idProduct)
    {

        $listProducts = Product::where('id', $idProduct)->first();
        $linkImage = $listProducts->image;
        if ($request->hasFile('imageProduct')) {
            File::delete(public_path($listProducts->image));   // xoá ảnh cũ 
            $image = $request->file('imageProduct');
            $newName = time() . "." . $image->getClientOriginalExtension();
            $linkStorage = 'imageProduct/';
            $image->move(public_path($linkStorage), $newName);

            $linkImage = $linkStorage . $newName;
        }
        $data = [
            'name' => $request->nameProduct,
            'image' => $linkImage,
            'price' => $request->priceProduct,
            'description' => $request->descriptionProduct,
            'category_id' => $request->category_id,
        ];
        Product::where('id', $idProduct)->update($data);
        return redirect()->route('admin.product.listProducts')->with(['message' => 'Sửa Thành Công']);
    }

    


}
