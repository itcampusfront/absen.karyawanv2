@extends('template/main')

@section('title', 'Tambah Jam Kerja')

@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-clock-o"></i> Tambah Jam Kerja</h1>
            <p>Menu untuk menambah data jam kerja</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.work-hour.index') }}">Jam Kerja</a></li>
            <li class="breadcrumb-item">Tambah Jam Kerja</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="tile">
                <form method="post" action="{{ route('admin.work-hour.store') }}">
                    @csrf
                    <div class="tile-title-w-btn">
                        <h3 class="title">Tambah Jam Kerja</h3>
                        <p><button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-save mr-2"></i>Simpan</button></p>
                    </div>
                    <div class="tile-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Nama Jam Kerja <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Masukkan Nama Jam Kerja">
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
                                    <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('group_id'))
                                <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('group_id')) }}</div>
                                @endif
                            </div>
                            @endif
                            <div class="form-group col-md-12">
                                <label>Kategori <span class="text-danger">*</span></label>
                                <select name="category" class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}">
                                    <option value="" disabled selected>--Pilih--</option>
                                    <option value="1" {{ old('category') == 1 ? 'selected' : '' }}>Full-Time</option>
                                    <option value="2" {{ old('category') == 2 ? 'selected' : '' }}>Part-Time</option>
                                </select>
                                @if($errors->has('category'))
                                <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('category')) }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label>Kuota <span class="text-danger">*</span></label>
                                <input type="text" name="quota" class="form-control {{ $errors->has('quota') ? 'is-invalid' : '' }}" value="{{ old('quota') }}" placeholder="Masukkan Kuota">
                                @if($errors->has('quota'))
                                <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('quota')) }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>Mulai <span class="text-danger">*</span></label>
                                <input type="text" name="start_at" class="form-control clockpicker {{ $errors->has('start_at') ? 'is-invalid' : '' }}" value="{{ old('start_at') }}" placeholder="Masukkan Jam Mulai" autocomplete="off">
                                @if($errors->has('start_at'))
                                <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('start_at')) }}</div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label>Selesai <span class="text-danger">*</span></label>
                                <input type="text" name="end_at" class="form-control clockpicker {{ $errors->has('end_at') ? 'is-invalid' : '' }}" value="{{ old('end_at') }}" placeholder="Masukkan Jam Selesai" autocomplete="off">
                                @if($errors->has('end_at'))
                                <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('end_at')) }}</div>
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

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/jquery-clockpicker.min.js" integrity="sha512-x0qixPCOQbS3xAQw8BL9qjhAh185N7JSw39hzE/ff71BXg7P1fkynTqcLYMlNmwRDtgdoYgURIvos+NJ6g0rNg==" crossorigin="anonymous"></script>
<script type="text/javascript">
    // Clockpicker
    $(".clockpicker").clockpicker({
        autoclose: true
    });
</script>

@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/jquery-clockpicker.min.css" integrity="sha512-Dh9t60z8OKsbnVsKAY3RcL2otV6FZ8fbZjBrFENxFK5H088Cdf0UVQaPoZd/E0QIccxqRxaSakNlmONJfiDX3g==" crossorigin="anonymous" />

@endsection