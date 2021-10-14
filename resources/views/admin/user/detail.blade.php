@extends('template/main')

@section('title', 'Detail User')

@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user"></i> Detail User</h1>
            <p>Menu untuk menampilkan detail user</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User</a></li>
            <li class="breadcrumb-item">Detail User</li>
        </ul>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title">Detail User</h3>
                    <a class="btn btn-primary" href="{{ route('admin.user.edit', ['id' => $user->id]) }}"><i class="fa fa-lg fa-edit mr-2"></i>Edit User</a>
                </div>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama:</label>
                                <br>
                                {{ $user->name }}
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir:</label>
                                <br>
                                {{ date('d/m/Y', strtotime($user->birthdate)) }}
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin:</label>
                                <br>
                                {{ $user->gender == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                            </div>
                            <div class="form-group">
                                <label>Nomor HP:</label>
                                <br>
                                {{ $user->phone_number }}
                            </div>
                            <div class="form-group">
                                <label>Alamat:</label>
                                <br>
                                {{ $user->address != '' ? $user->address : '-' }}
                            </div>
                            <div class="form-group">
                                <label>Pendidikan Terakhir:</label>
                                <br>
                                {{ $user->latest_education != '' ? $user->latest_education : '-' }}
                            </div>
                            <div class="form-group">
                                <label>Mulai Bekerja:</label>
                                <br>
                                {{ date('d/m/Y', strtotime($user->start_date)) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email:</label>
                                <br>
                                {{ $user->email }}
                            </div>
                            <div class="form-group">
                                <label>Username:</label>
                                <br>
                                {{ $user->username }}
                            </div>
                            <div class="form-group">
                                <label>Status:</label>
                                <br>
                                {{ $user->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                            </div>
                            <div class="form-group">
                                <label>Waktu Mendaftar:</label>
                                <br>
                                {{ date('d/m/Y H:i', strtotime($user->created_at)) }}
                            </div>
                            <div class="form-group">
                                <label>Kunjungan Terakhir:</label>
                                <br>
                                {{ date('d/m/Y H:i', strtotime($user->last_visit)) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Role:</label>
                                <br>
                                {{ role($user->role) }}
                            </div>
                            <div class="form-group">
                                <label>Grup:</label>
                                <br>
                                {{ $user->group ? $user->group->name : '-' }}
                            </div>
                            <div class="form-group">
                                <label>Kantor:</label>
                                <br>
                                {{ $user->office ? $user->office->name : '-' }}
                            </div>
                            <div class="form-group">
                                <label>Jabatan:</label>
                                <br>
                                {{ $user->position ? $user->position->name : '-' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('css')

<style type="text/css">
    label {font-weight: bold;}
</style>

@endsection