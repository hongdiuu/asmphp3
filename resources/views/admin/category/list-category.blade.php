@extends('admin.layout.index')
@section('title')
    @parent
    Danh Sách Danh Mục
@endsection
@push('style')
@endpush
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
        @if (session('message'))
            <div class="alert alert-info" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('admin.category.addCategories') }}" class="btn btn-success">Thêm Mới</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Hành Động</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($listCategories as $item => $value)
                                <tr>
                                    <td>{{ $item + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.updateCategories', $value->id) }}"
                                            class="btn btn-warning">Sửa</a> |
                                        <button data-id="{{ $value->id }}" data-toggle="modal" data-target="#modelDelete"
                                            class="btn btn-danger">Xoá</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $listCategories->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modelDelete" tabindex="-1" role="dialog" aria-labelledby="modelDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelDeleteLabel">Xoá User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn Có Chắc Chắn Muốn Xoá Không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <form action="" id="confirmDelete" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Xác Nhận Xoá</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    $('#modelDelete').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('id') // Extract info from data-* attributes

        var confirmDelete = $('#confirmDelete')
        confirmDelete.attr('action', '{{ route('admin.category.deleteCategories') }}?id=' + recipient)
    })
</script>
@endpush
