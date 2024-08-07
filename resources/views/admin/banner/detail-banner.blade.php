{{-- resources/views/admin/banner/detail-banner.blade.php --}}
@extends('admin.layout.index')
@section('title')
    @parent
    Chi Tiết Banner
@endsection
@push('style')
@endpush
@section('content')
    <div class="container">
        <div class="p-4" style="min-height: 800px;">
            <h3 class="text-center">Chi Tiết Banner</h3>
            <p>
                Tên Banner:
                <span class="font-weight-bold">{{ $banner->name }}</span>
            </p>
            <p>
                Hình Ảnh Banner:
                <br>
                <br>
                <img src="{{ asset($banner->image) }}" alt="Banner Image" width="150px" class="img-banner">
            </p>
            <p>
                Mô Tả:
                <span class="font-weight-bold">{{ $banner->description }}</span>
            </p>
            <a href="{{ route('admin.banner.listBanner') }}" class="btn btn-info mt-3">Quay lại</a>
        </div>
    </div>
@endsection
@push('script')
@endpush