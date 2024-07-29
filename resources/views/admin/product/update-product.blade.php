@extends('admin.layout.index')
@section('title')
    @parent
    Danh Sách Sản Phẩm
@endsection
@push('style')
@endpush
@section('content')
    <div class="container">
        <h4 class="text-center">Sửa Sản Phẩm</h4>
        <div class="p-4" style="min-height: 800px;">
            <form action="{{ route('admin.product.updateProduct', $listProducts->id) }}" method="post"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="nameProduct" class="form-label">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" id="nameProduct" name="nameProduct"
                        value="{{ $listProducts->name }}" placeholder="Ten San Pham">
                </div>
                <div class="mb-3">
                    <label for="imageProduct" class="form-label">Anh san pham</label>
                    <br>
                    <img src="{{asset($listProducts->image)}}" alt="" width="150px" class="img-product"> 
                    <br>
                    <br>
                    <input type="file" id="imageProduct" name="imageProduct" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="priceProduct" class="form-label">Giá Sản Phẩm</label>
                    <input type="text" class="form-control" id="priceProduct" name="priceProduct"
                        value="{{ $listProducts->price }}" placeholder="Gia San Pham">
                </div>
                <div class="mb-3">
                    <label for="descriptionProduct" class="form-label">Mô Tả Sản Phẩm</label>
                    <input type="text" class="form-control" id="descriptionProduct" name="descriptionProduct"
                        value="{{ $listProducts->description }}" placeholder="Mo ta San Pham">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select class="form-control" id="category_id" name="category_id"
                        value="{{ $listProducts->category_id }}">
                        <option value="">Chọn Danh Mục</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-warning">Chỉnh Sửa</button>
            </form>
        </div>
    </div>
@endsection
@push('script')
@endpush
