<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::withTrashed()->select('id', 'title', 'deleted_at')->with(['image' => function ($query) {
            $query->select('id', 'idBlog', 'srcImage');
        }])->get();

        return view('admin.page.blog.index', compact('blogs'));
    }
    public function create()
    {
        return view('admin.page.blog.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs|max:300',
            'image' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Trường tiêu đề không được để trống.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
            'title.max' => 'Tiêu đề không được vượt quá 300 kí tự.',
            'image.required' => 'Trường ảnh không được để trống.',
            'description.required' => 'Trường mô tả không được để trống.',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];
        Blog::create($data);
        $idBlog = Blog::orderBy('id', 'DESC')->first()->id;
        if ($idBlog) {
            $image = $request->image;
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/blogs', $name);
            Image::create([
                'srcImage' => $name,
                'idBlog' =>  $idBlog,
            ]);
        }
        $request->session()->flash('success', 'Thêm thành công bài viết.');

        return redirect()->route('admin.blog.index');
    }
    public function edit(Blog $blog)
    {
        $blog->load('image');
        return view('admin.page.blog.edit', compact('blog'));
    }
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|max:300|unique:blogs,title,' . $blog->id,
            'description' => 'required',
        ], [
            'title.required' => 'Trường tiêu đề không được để trống.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
            'title.max' => 'Tiêu đề không được vượt quá 300 kí tự.',
            'description.required' => 'Trường mô tả không được để trống.',
        ]);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Xóa ảnh cũ (nếu có)
            $imageOld = Image::where('idBlog', $blog->id)->get();
            if ( $imageOld->count() > 0) {
                Storage::delete('public/images/blogs/' .  $imageOld->first()->srcImage);
                Image::where('id',  $imageOld->first()->id)->delete();
            }

            // Thêm ảnh mới
            $image = $request->image;
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/blogs', $name);
            Image::create([
                'srcImage' => $name,
                'idBlog' => $blog->id,
            ]);
        }
        $blog->fill([
            'title' => $request->title,
            'description' => $request->description
        ])->save();
        return redirect()->route('admin.blog.index');
    }
    public function destroy(Blog $blog, Request $request)
    {
        $blog->delete();
        $request->session()->flash('success', "Đã xóa {$blog->title}.");
        return redirect()->route('admin.blog.index');
    }
    public function restore($idBlog, Request $request)
    {
        $blog = Blog::withTrashed()->where('id', $idBlog)->first();
        // dd($product);
        $blog->restore();
        $request->session()->flash('success', 'Hoàn lại thành công.');
        return redirect()->route('admin.blog.index');
    }
}
