{{-- resources/views/admin/banner/add-banner.blade.php --}}
@extends('admin.layout.index')
@section('title')
    @parent
    Thêm Banner
@endsection
@push('style')

@endpush
@section('content')
    <div class="container">
        <h3 class="text-center">Thêm Banner</h3>
        @if (session('message'))
            <p class="text-danger">{{ session('message') }}</p>
        @endif
        <div class="p-4" style="min-height: 800px;">
            <form action="{{ route('admin.banner.addPostBanner') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nameBanner" class="form-label">Tên Banner</label>
                    <input type="text" class="form-control" id="nameBanner" name="nameBanner"
                        placeholder="Tên Banner" required>
                    @error('nameBanner')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="imageBanner" class="form-label">Hình Ảnh</label>
                    <input type="file" class="form-control" id="imageBanner" name="imageBanner">
                    @error('imageBanner')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descriptionBanner" class="form-label">Mô Tả</label>
                    <textarea class="form-control" id="descriptionBanner" name="descriptionBanner"
                        placeholder="Mô Tả Banner"></textarea>
                    @error('descriptionBanner')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
          
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
@endsection
@push('script')
@endpush