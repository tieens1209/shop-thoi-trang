<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::get();
        
        $products = Product::orderByDesc('view')->limit(8)->get();
        $blogs = Blog::select('id', 'title', 'created_at')
            ->with(['image' => function ($query) {
                $query->select('id', 'idBlog', 'srcImage');
            }])
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        $images = Image::all();
        // Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
        foreach ($products as $product) {
            foreach ($images as $image) {
                if ($image->idProduct == $product->id) {
                    $product->image = $image;
                    break;
                }
            }
        }
        return view('client.page.home', compact('banners', 'products', 'blogs'));
    }

    public function listProduct(Request $request)
    {
        $categories = Category::get();
        $query = Product::query();
        // Apply filters based on request inputs for non-Ajax requests
        if ($request->input('category')) {
            $query->where('idCategory', $request->input('category'));
        }

        if ($request->input('priceSaleGap')) {
            if ($request->input('priceSaleGap') == '500000+') {
                $query->where('priceSale', '>=', 500000);
            } else {
                $priceRange = explode('-', $request->input('priceSaleGap'));
                $query->whereBetween('priceSale', [$priceRange[0], $priceRange[1]]);
            }
        }

        if ($request->input('priceSale')) {
            $query->orderBy('priceSale', $request->input('priceSale'));
        }

        if ($request->input('search')) {
            // Only apply search condition if category is not provided
            if (!$request->input('category') && !$request->input('priceSaleGap')) {
                $query->where('name', 'like', '%' . $request->input('search') . '%');
            }
        }

        $products = $query->with('images')->paginate(12);
        $productIds = $products->pluck('id')->toArray();
        $images = Image::whereIn('idProduct', $productIds)->get();

        // Assign images to paginated products
        foreach ($products as $product) {
            $product->image = $images->where('idProduct', $product->id)->first();
        }

        // Return view based on request type
        if ($request->ajax()) {
            return view('client.page.product.listProducts', compact('products', 'categories', 'images'))->render();
        } else {
            return view('client.page.product.listProducts', compact('products', 'categories'));
        }
    }

    public function detailProduct($id)
    {
        $product = Product::where('id', $id)->first();
        $product->load('size', 'category');
        $images = Image::where('idProduct', $id)->get();

        $productImage = $images->where('idProduct', $product->id)->first();


        $relatedProducts = Product::where('idCategory', $product->idCategory)
            ->where('id', '<>', $product->id)
            ->take(4)
            ->get();
        // Gán ảnh
        foreach ($relatedProducts as $relatedProduct) {
            $relatedProduct->srcImage = Image::where('idProduct', $relatedProduct->id)->first()->srcImage;
        }
        // Tăng lượt xem 
        Product::where('id', $id)->update(['view' => $product->view + 1]);
        return view('client.page.product.detailProduct', compact('product', 'images', 'relatedProducts', 'productImage'));
    }

    public function listProductByCategory($id)
    {
        $categories = Category::get();
        $products = Product::where('idCategory', $id)->get();

        $images = Image::all();
        // Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
        foreach ($products as $product) {
            foreach ($images as $image) {
                if ($image->idProduct == $product->id) {
                    $product->image = $image;
                    break;
                }
            }
        }
        return view('product.productList', compact('products', 'categories'));
    }

    public function searchProduct(Request $request)
    {
        $categories = Category::get();
        $products = Product::where('name', 'like', '%' . $request->kyw . '%')->paginate(1);
        $images = Image::all();
        // Lấy ra ảnh đầu tiên làm ảnh đại diện cho sản phẩm
        foreach ($products as $product) {
            foreach ($images as $image) {
                if ($image->idProduct == $product->id) {
                    $product->image = $image;
                    break;
                }
            }
        }
        return view('product.productList', compact('products', 'categories'));
    }
}
