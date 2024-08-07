<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function listClients(Request $request)
    {
        $categories = Category::all(); // Lấy tất cả các danh mục
        $banners = Banner::all();
        $listProducts = Product::paginate(8);
        if ($request->has('category')) {
            $categoryId = $request->input('category');
            $listProducts = Product::where('category_id', $categoryId)->get();
        }
        return view('client.product.list-client')->with(['listProducts' => $listProducts, 'categories' => $categories,'banners' => $banners]);
    }

    public function searchProduct(Request $request)
    {
        $query = $request->input('query');
        $listProducts = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('price', 'like', '%' . $query . '%')
            ->get(); // Hoặc paginate nếu bạn cần phân trang

        $categories = Category::all();

        return view('client.product.list-client', [
            'listProducts' => $listProducts,
            'categories' => $categories,
            'query' => $query
        ]);
    }
   
    public function product(Request $request)
    {
        $categories = Category::all(); // Lấy tất cả các danh mục
        $listProducts = Product::paginate(8);
        if ($request->has('category')) {
            $categoryId = $request->input('category');
            $listProducts = Product::where('category_id', $categoryId)->get();
        }
        return view('client.product.product-shop')->with(['listProducts' => $listProducts, 'categories' => $categories]);
    }
    public function searchProductShop(Request $request)
    {
        $query = $request->input('query');
        $listProducts = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('price', 'like', '%' . $query . '%')
            ->get(); // Hoặc paginate nếu bạn cần phân trang

        $categories = Category::all();

        return view('client.product.product-shop', [
            'listProducts' => $listProducts,
            'categories' => $categories,
            'query' => $query
        ]);
    }
    public function detailProduct($id)
    {
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        $product = Product::find($id);

        // Kiểm tra xem sản phẩm có tồn tại hay không
        if (!$product) {
            return redirect()->route('client.product.list-client')->with('error', 'Sản phẩm không tồn tại');
        }

        // Trả về view chi tiết sản phẩm
        return view('client.product.detail-product')->with(['product'=>$product]);
    }

     public function slider()
    {
        // Lấy tất cả các banner từ cơ sở dữ liệu
        
        $banners = Banner::all();
        // dd($banners);
        // dd(Banner::all());

        // Truyền biến $banners tới view
        return view('client.layout.index')->with(['banners' => $banners]);
    }
}
