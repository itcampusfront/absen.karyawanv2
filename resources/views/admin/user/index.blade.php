@extends('template/main')

@section('title', 'Kelola User')

@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user"></i> Kelola User</h1>
        <p>Menu untuk mengelola data user</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User</a></li>
            <li class="breadcrumb-item">Kelola User</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title">Kelola User</h3>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.user.create') }}"><i class="fa fa-lg fa-plus"></i> Tambah User</a>
                    </div>
                </div>
                <div class="tile-body">
                    @if(Session::get('message') != null)
                    <div class="alert alert-dismissible alert-success">
                        <button class="close" type="button" data-dismiss="alert">×</button>{{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th width="20"><input type="checkbox"></th>
                                    <th>Identitas</th>
                                    <th>Kantor, Jabatan</th>
                                    <th width="40">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td align="center"><input type="checkbox"></td>
                                        <td>
                                            <a href="/admin/user/detail/{{ $user->id }}">{{ $user->name }}</a>
                                            <br>
                                            <small class="text-dark">{{ $user->email }}</small>
                                            <br>
                                            <small class="text-muted">{{ $user->phone_number }}</small>
                                        </td>
                                        <td>
                                        @if(Auth::user()->role == role('super-admin') && $user->role == role('super-admin'))
                                            SUPER ADMIN
                                        @else
                                            {{ $user->role == role('admin') && $user->office_id == 0 ? 'ADMIN' : $user->office->name }}
                                            <br>
                                            @if(Auth::user()->role == role('super-admin'))
                                            <small><a href="#">{{ $user->group->name }}</a></small>
                                            <br>
                                            @endif
                                            <small class="text-muted">{{ $user->position ? $user->position->name : '' }}</small>
                                        @endif
                                        </td>
                                        <td align="center">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                @if(Auth::user()->role == role('super-admin'))
                                                <a href="#" class="btn btn-danger btn-sm {{ $user->id > 1 ? 'btn-delete' : '' }}" data-id="{{ $user->id }}" style="{{ $user->id > 1 ? '' : 'cursor: not-allowed' }}" title="{{ $user->id <= 1 ? $user->id == Auth::user()->id ? 'Tidak dapat menghapus akun sendiri' : 'Akun ini tidak boleh dihapus' : 'Hapus' }}"><i class="fa fa-trash"></i></a>
                                                @elseif(Auth::user()->role == role('admin'))
                                                <a href="#" class="btn btn-danger btn-sm {{ $user->id != Auth::user()->id ? 'btn-delete' : '' }}" data-id="{{ $user->id }}" style="{{ $user->id != Auth::user()->id ? '' : 'cursor: not-allowed' }}" title="{{ $user->id == Auth::user()->id ? 'Tidak dapat menghapus akun sendiri' : 'Hapus' }}"><i class="fa fa-trash"></i></a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<form id="form-delete" class="d-none" method="post" action="{{ route('admin.user.delete') }}">
    @csrf
    <input type="hidden" name="id">
</form>

@endsection

@section('js')

@include('template/js/datatable')

<script type="text/javascript">
	// DataTable
	DataTable("#table");

	// Button Delete
	$(document).on("click", ".btn-delete", function(e){
		e.preventDefault();
		var id = $(this).data("id");
		var ask = confirm("Anda yakin ingin menghapus data ini?");
		if(ask){
			$("#form-delete input[name=id]").val(id);
			$("#form-delete").submit();
		}
	});
</script>

@endsection