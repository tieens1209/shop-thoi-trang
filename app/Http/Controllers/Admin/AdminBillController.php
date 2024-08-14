<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Image;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Spatie\Permission\Models\Permission;
use PDF;

class AdminBillController extends Controller
{
    public function index(){
        $bills = Order::orderByDesc('id')->get();
        $bills->load('user');
        return view('admin.page.bill.index', compact('bills'));
    }
    public function detailBill($id){
        $images = Image::all();
        $bill = Order::where('id', $id)->first();
        $carts = Cart::where('idOrder', $id)->get();
        $carts->load(['product' => function ($query) {
            $query->withTrashed(); // Load cả sản phẩm đã bị xóa
        }]);;
        $totalBill = 0;
        foreach($carts as $cart){
            $cart->total = $cart->product->priceSale * $cart->qty;
            $totalBill += $cart->total;
            foreach($images as $image){
                if($image->idProduct == $cart->product->id){
                    $cart->product->srcImage = $image->srcImage;
                    break;
                }
            }
        }
        return view('admin.page.bill.detailBill', compact('bill', 'carts', 'totalBill'));
    }
    public function updateBill($id, Request $request){
        Order::where('id', $id)->update(['status' => $request->status]);
        
        $request->session()->flash('success', 'Updates order.');
        return redirect()->route('admin.bill.index');
    }
    public function invoice($id)
{
    // Lấy tất cả hình ảnh và sắp xếp chúng theo idProduct để dễ dàng tra cứu
    $images = Image::pluck('srcImage', 'idProduct')->toArray();

    // Lấy thông tin đơn hàng và các sản phẩm trong giỏ hàng
    $bill = Order::findOrFail($id);
    $carts = Cart::where('idOrder', $id)->with(['product' => function ($query) {
        $query->withTrashed(); // Load cả sản phẩm đã bị xóa
    }])->get();

    // Tính tổng số tiền của đơn hàng và cập nhật thông tin hình ảnh cho sản phẩm
    $totalBill = 0;
    foreach ($carts as $cart) {
        $cart->total = $cart->product->priceSale * $cart->qty;
        $totalBill += $cart->total;
        $cart->product->srcImage = $images[$cart->product->id] ?? null;
    }

    // Tạo và tải xuống file PDF
    $pdf = PDF::loadView('admin.page.bill.billPDF', [
        'bill' => $bill,
        'carts' => $carts,
        'totalBill' => $totalBill
    ]);

    return $pdf->download('bill_' . $id . '.pdf');
}

}
