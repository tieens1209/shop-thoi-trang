@extends('layout.admin')
@section('title')
    Danh sách loại sản phẩm
@endsection
@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4 mt-5">Phân loại</h5>

                        <a href="{{ route('admin.category.create') }}"><button type="submit" class="btn btn-success m-1">Thêm
                                loại sản phẩm</button></a>

                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">STT</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Tên loại</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Trạng thái</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Hoạt động</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $stt }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $category->name }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">
                                                    @if ($category->status)
                                                        <i class="fa-solid fa-circle" style="color: #59f505;"></i>
                                                    @else
                                                        <i class="fa-solid fa-circle" style="color: #ff0a0a;"></i>
                                                    @endif
                                                </p>
                                            </td>
                                            <td class="border-bottom-0" style="display: flex;">
                                                @if (is_null($category->deleted_at))
                                                    <a href="{{ route('admin.category.edit', $category->id) }}"><button
                                                            type="submit" class="btn btn-info m-1">Chỉnh sửa</button></a>

                                                    <form action="{{ route('admin.category.destroy', $category->id) }}"
                                                        method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger m-1"
                                                            onclick="return deleteConfirmation()">Xóa</button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('admin.category.restore', $category->id) }}"><button
                                                            type="submit" class="btn btn-primary m-1">Restore</button></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                            $stt++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
