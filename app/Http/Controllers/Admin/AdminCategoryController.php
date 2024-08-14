<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withTrashed()->paginate(10);
        return view('admin.page.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        $data = [
            'name' => $request->name,
            'status' => $request->status
        ];

        Category::create($data);
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.page.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        $category->fill([
            'name' => $request->name,
            'status' => $request->status
        ])->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Product::where('idCategory', $category->id)->delete();
        // toastr()->success('Successfully', 'Deleted category');
        return redirect()->route('admin.category.index');
    }

    public function restore($idCategory){
        Category::where('id', $idCategory)->restore();
        //khôi phục tất cả sản phẩm thuộc danh mục bị xóa
        Product::where('idCategory', $idCategory)->restore();
        // toastr()->success('Successfully', 'Restored category');
        return redirect()->route('admin.category.index');
    }
}
