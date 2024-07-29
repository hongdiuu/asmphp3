@extends('admin.layout.index')
@section('title')
    @parent
    Danh Sách Sản Phẩm
@endsection
@push('style')
@endpush
@section('content')
    <div class="container">
        <h3 class="text-center">Thêm Sản Phẩm</h3>
        <div class="p-4" style="min-height: 800px;">
            <form action="{{ route('admin.product.addPostProduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nameProduct" class="form-label">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" id="nameProduct" name="nameProduct"
                        placeholder="Ten San Pham">
                </div>
                <div class="mb-3">
                    <label for="imageProduct" class="form-label">Anh san pham</label>
                    <br>
                    <input type="file" id="imageProduct" name="imageProduct" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="priceProduct" class="form-label">Giá Sản Phẩm</label>
                    <input type="text" class="form-control" id="priceProduct" name="priceProduct"
                        placeholder="Gia San Pham">
                </div>
                <div class="mb-3">
                    <label for="descriptionProduct" class="form-label">Mô Tả Sản Phẩm</label>
                    <input type="text" class="form-control" id="descriptionProduct" name="descriptionProduct"
                        placeholder="Mo ta San Pham">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Chọn Danh Mục</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
      

                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
@endsection
@push('script')
@endpush
