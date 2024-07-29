@extends('admin.layout.index')
@section('title')
    @parent
    Danh Sách Sản Phẩm
@endsection
@push('style')

@endpush
@section('content')
    <div class="container">
        <h3 class="text-center">Sửa Danh Mục</h3>
        <div class="p-4" style="min-height: 800px;">
            <form action="{{ route('admin.category.updateCategories',$listCategories->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="nameProduct" class="form-label">Tên Danh Mục</label>
                    <input type="text" class="form-control" id="nameCategory" name="nameCategory" value="{{$listCategories->name}}"
                        placeholder="Tên Danh Mục">
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>
@endsection
@push('script')
@endpush
 