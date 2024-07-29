@extends('admin.layout.index')
@section('title')
    @parent
    Danh Sách Người Dùng
@endsection
@push('style')
@endpush
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Danh Sách</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
 
        @if (session('message'))
            <div class="alert alert-info" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addUser">Thêm Mới</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Hành Động</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Hành Động</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($listUser as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>
                                        @if ($value->role == '1')
                                            Admin
                                        @elseif($value->role == '2')
                                            User
                                        @endif
                                    </td>
                                    <td>
                                        <button data-id="{{ $value->id }}" data-toggle="modal" data-target="#modalEdit"
                                            class="btn btn-warning">Sửa</button> |
                                        <button data-id="{{ $value->id }}" data-toggle="modal" data-target="#modelDelete"
                                            class="btn btn-danger">Xoá</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                      {{ $listUser->links('pagination::bootstrap-4')}} 
                </div>
            </div>
        </div>
    </div>


    {{-- modall them moi --}}
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserLabel">Thêm Mới User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.users.addUsers') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">Chọn Role</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm Mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modall delete --}}

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

    {{-- modal edit --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Chỉnh Sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.users.updatelUsers') }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" value="" id="idUserUpdate" name="idUser">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="nameUpdate" name="name" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" id="emailUpdate" name="email" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="roleUpdate" class="col-form-label">Role</label>
                            <select name="role" id="roleUpdate" class="form-control" required>
                                <option value="">Chọn Role</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-warning">Chỉnh Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- scrip bootstrap 5 xóa --}}
    {{-- <script>
        var modelDelete = document.getElementById('modelDelete')
        modelDelete.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-whatever')
            let confirmDelete = document.querySelector(#confirmDelete)
            confirmDelete.setAttribute('action','{{route("admin.users.deleteUsers")}}=id' +recipient)
        })
    </script> --}}

    {{-- scrip bootstrap 5 edit --}}
    {{-- <script>
        var modalEdit = document.getElementById('modalEdit')
        modalEdit.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            // data id đặt trên button sửa xoá
            var idUser = button.getAttribute('data-id')
            
            let url = "{{route('admin.users.detailUsers')}}?id" +idUser; 
            fetch(url,{
                headers:{
                    'Content-Type' : 'application/json',
                    'Accept' : 'application/json',
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
            }).then((response) => response.json()).then((data)=>{
                 document.querySelector('#idUserUpdate').value = data.id
                 document.querySelector('#nameUpdate').value = data.name
                 document.querySelector('#emailUpdate').value = data.email
                 document.querySelector('#roleUpdate').value = data.role

            })
        })
    </script> --}}


  
 {{-- SCRIPT DELETE BOOSTRAP 4 JQUERY --}}  
    <script>
        $('#modelDelete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('id') // Extract info from data-* attributes

            var confirmDelete = $('#confirmDelete')
            confirmDelete.attr('action', '{{ route('admin.users.deleteUsers') }}?id=' + recipient)
        })
    </script>

 

 {{-- SCRIPT EDIT BOOSTRAP 4 JQUERY --}}
 <script>
        var modalEdit = document.getElementById('modalEdit');
        $('#modalEdit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            // data id đặt trên button sửa xoá
            var idUser = button.data('id');

            let url = "{{ route('admin.users.detailUsers') }}?id=" + idUser;
            fetch(url, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                })
                .then((response) => response.json())
                .then((data) => {
                    $('#idUserUpdate').val(data.id);
                    $('#nameUpdate').val(data.name);
                    $('#emailUpdate').val(data.email);
                    $('#roleUpdate').val(data.role);
                });
        });
    </script>
@endpush
