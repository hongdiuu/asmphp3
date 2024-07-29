@extends('admin.layout.index')
@section('title')
    @parent
    Danh Sách Sản Phẩm
@endsection
@push('style')

@endpush
@section('content')
    <div class="container">
        <h3 class="text-center">Thêm Danh Mục</h3>
        <div class="p-4" style="min-height: 800px;">
            <form action="{{ route('admin.category.addPostCategories') }}" method="post" enctype="multipart/form-data">
                @csrf
           
                <div class="mb-3">
                    <label for="nameProduct" class="form-label">Tên Danh Mục</label>
                    <input type="text" class="form-control" id="nameCategory" name="nameCategory"
                        placeholder="Tên Danh Mục">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
@endsection
@push('script')
@endpush
 