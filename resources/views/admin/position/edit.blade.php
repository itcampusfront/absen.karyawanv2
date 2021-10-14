@extends('template/main')

@section('title', 'Edit Jabatan')

@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i> Edit Jabatan</h1>
            <p>Menu untuk mengedit data jabatan</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.position.index') }}">Jabatan</a></li>
            <li class="breadcrumb-item">Edit Jabatan</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="tile">
                <form method="post" action="{{ route('admin.position.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $position->id }}">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Edit Jabatan</h3>
                        <p><button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-save mr-2"></i>Simpan</button></p>
                    </div>
                    <div class="tile-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Nama Jabatan <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $position->name }}" placeholder="Masukkan Nama Jabatan">
                                @if($errors->has('name'))
                                <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('name')) }}</div>
                                @endif
                            </div>
                            @if(Auth::user()->role == role('super-admin'))
                            <div class="form-group col-md-12">
                                <label>Grup <span class="text-danger">*</span></label>
                                <select name="group_id" class="form-control {{ $errors->has('group_id') ? 'is-invalid' : '' }}">
                                    <option value="" disabled selected>--Pilih--</option>
                                    @foreach($groups as $group)
                                    <option value="{{ $group->id }}" {{ $position->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('group_id'))
                                <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('group_id')) }}</div>
                                @endif
                            </div>
                            @endif
                            <div class="form-group col-md-12">
                                <label>Jam Kerja <span class="text-danger">*</span></label>
                                <select name="work_hours" class="form-control {{ $errors->has('work_hours') ? 'is-invalid' : '' }}">
                                    <option value="" disabled selected>--Pilih--</option>
                                    <option value="1" {{ $position->work_hours == 1 ? 'selected' : '' }}>Full-Time</option>
                                    <option value="2" {{ $position->work_hours == 2 ? 'selected' : '' }}>Part-Time</option>
                                </select>
                                @if($errors->has('work_hours'))
                                <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('work_hours')) }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer"><button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-save mr-2"></i>Simpan</button></div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection