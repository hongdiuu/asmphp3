{{-- resources/views/admin/banner/update-banner.blade.php --}}
@extends('admin.layout.index')
@section('title')
    @parent
    Sửa Banner
@endsection
@push('style')

@endpush
@section('content')
    <div class="container">
        <h3 class="text-center">Sửa Banner</h3>
        @if (session('message'))
            <p class="text-danger">{{ session('message') }}</p>
        @endif
        <div class="p-4" style="min-height: 800px;">
            <form action="{{ route('admin.banner.updatePatchBanner', $banner->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="nameBanner" class="form-label">Tên Banner</label>
                    <input type="text" class="form-control" id="nameBanner" name="nameBanner"
                        placeholder="Tên Banner" value="{{ $banner->name }}" required>
                    @error('nameBanner')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="imageBanner" class="form-label">Hình Ảnh</label>
                    <input type="file" class="form-control" id="imageBanner" name="imageBanner">
                    @if ($banner->image)
                        <img src="{{ asset($banner->image) }}" alt="Current Banner Image" style="width: 200px; margin-top: 10px;">
                    @endif
                    @error('imageBanner')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descriptionBanner" class="form-label">Mô Tả</label>
                    <textarea class="form-control" id="descriptionBanner" name="descriptionBanner"
                        placeholder="Mô Tả Banner">{{ $banner->description }}</textarea>
                    @error('descriptionBanner')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
            </form>
        </div>
    </div>
@endsection
@push('script')
@endpush