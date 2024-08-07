@extends('admin.layout.index')
@section('title')
    @parent
    Chi Tiết Sản Phẩm
@endsection
@push('style')
@endpush
@section('content')
    <div class="container">
        <div class="p-4" style="min-height: 800px;">
            <h3 class="text-center">Chi Tiết Sản Phẩm</h3>
            <p>
                Tên Sản Phẩm
                <span class="font-weight-bold">{{ $listProducts->name }}</span>
            </p>
            <p>
                Ảnh Sản Phẩm
                <br>
                <br>
               <img src="{{asset($listProducts->image)}}" alt="" width="150px" class="img-product">
            </p>
            <p>
                Giá Sản Phẩm
                <span class="font-weight-bold">{{ $listProducts->price }}</span>
            </p>
            <p>
                Mô Tả Sản Phẩm
                <span class="font-weight-bold">{{ $listProducts->description }}</span>
            </p>
            <p>
                Danh Mục Sản Phẩm:
                <span class="font-weight-bold">{{ $listProducts->category->name ?? 'Không có danh mục' }}</span>
            </p>
            <a href="{{ route('admin.product.listProducts') }}" class="btn btn-info mt-3">Quay lai</a>
        </div>
    </div>
@endsection
@push('script')
@endpush
