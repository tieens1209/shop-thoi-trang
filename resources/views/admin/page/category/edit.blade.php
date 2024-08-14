@extends('layout.admin')
@section('title')
    Chỉnh sửa loại {{ $category->name }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Chỉnh sửa loại {{ $category->name }}</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên loại</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->name }}">
                                @error('name')
                                <div id="emailHelp" class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Trạng thái</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="1" {{ $category->status ? 'selected' : '' }}>Bật</option>
                                    <option value="0" {{ !$category->status ? 'selected' : '' }}>Tắt</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection