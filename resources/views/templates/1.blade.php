
@extends('templates.dashboard')

@section('styles')
    <!--  jQuery -->
    {{--  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>  --}}

    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <style>
    table, th, td {
        border: 2px solid #aaaaaa;
        {{--  border-collapse: collapse;  --}}
    }
    th, td {
        {{--  padding: 5px;  --}}
        {{--  text-align: left;      --}}
    }
    </style>
    <style>
    .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
    }
    .example-modal .modal {
        background: transparent !important;
    }
    </style>
    <!-- Bootstrap Date-Picker Plugin -->
    {{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>  --}}
@endsection

@section('content')
    <section class="content-header">
      <h1>
        Lihat
        {{--  <small>Control panel</small>  --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Absen</li>
        <li class="active">Lihat</li>
      </ol>
    </section>

    <section>
      <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <i class="fa fa-book"></i>
                            <h3 class="box-title">Masukan Absensi Kegiatan</h3>
                            <div><br></div>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Sodung</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Solong</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">Ngadung</a></li>
                                    <li><a href="#tab_4" data-toggle="tab">Ngalong</a></li>
                                    <li><a href="#tab_5" data-toggle="tab">Apel</a></li>
                                    <li><a href="#tab_6" data-toggle="tab">HBA</a></li>
                                    {{--  <li><a href="#tab_7" data-toggle="tab">Acara Lain</a></li>  --}}
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Sodung</h4> 
                                                <p>Menampilkan presensi kegiatan sodung.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table id="example1" class="table table-bordered table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">No</th>
                                                                <th rowspan="2">Nama</th>
                                                                <th rowspan="2">NIM</th>
                                                                <th rowspan="2">Kamar</th>
                                                                <th colspan="{{ $sum_sodung}} ">Sodung ke</th>
                                                                <th rowspan="2">Persentase</th>
                                                                <th rowspan="2">Edit</th>
                                                            </tr>
                                                            <tr>
                                                                @for ($i = $sum_sodung; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>{{$user->kamar}}</td>
                                                                <p hidden {{$i=0, $ii=0}}></p>
                                                                @foreach ($sodungs as $sodung)
                                                                    @if($user->id == $sodung->id_mahasiswa)
                                                                    <td>
                                                                        @if ($sodung->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        <p hidden {{$i+=1}}></p>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                        <p hidden {{$ii+=1}}></p>
                                                                    </td>
                                                                    @endif
                                                                @endforeach
                                                                <td>@if($ii == 0)
                                                                    0
                                                                    @else
                                                                    {{$i/$ii*100}}
                                                                    @endif 
                                                                    %
                                                                </td>
                                                                <td><a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sodung{{$user->id}}" value="{{$user->id}}">Edit</button></a></td>
                                                                <div class="modal fade" id="modal-sodung{{$user->id}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title">Edit Data Sodung {{$user->name}}</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form method="POST" role="form" action="{{route('editAbsen')}}">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('PATCH')}}
                                                                                <input type="hidden" name="model" value="sodung">
                                                                                <div class="form-group">
                                                                                    <label>Nama</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->name}}" value="{{$user->name}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>NIM</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->nim}}" value="{{$user->nim}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Lorong / Kamar</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->lorong}} / {{$user->kamar}}" value="{{$user->lorong}} / {{$user->kamar}}" disabled>
                                                                                </div>
                                                                                <i hidden {{$index_id=0}}></i>
                                                                                @foreach($sodungs as $sodung)
                                                                                    @if($user->id == $sodung->id_mahasiswa)
                                                                                        <div class="form-group">
                                                                                            <label>@php
                                                                                                echo date('d F Y', strtotime($sodung->tanggal));
                                                                                            @endphp</label>
                                                                                            <select class="form-control" name="kehadirans[{{$index_id}}]" >
                                                                                                <option value="1" @if($sodung->kehadiran == 1) selected @endif>Hadir</option>
                                                                                                <option value="0" @if($sodung->kehadiran == 0) selected @endif>Tidak Hadir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <input type="hidden" name="ids[{{$index_id}}]" value="{{$sodung->id}}">
                                                                                        <i hidden {{$index_id+=1}}></i>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}></p>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Sodung</h4> 
                                                <p>Menampilkan presensi kegiatan sodung.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table id="example2" class="table table-bordered table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">No</th>
                                                                <th rowspan="2">Nama</th>
                                                                <th rowspan="2">NIM</th>
                                                                <th rowspan="2">Kamar</th>
                                                                <th colspan="{{ $sum_solong}} ">Solong ke</th>
                                                                <th rowspan="2">Persentase</th>
                                                                <th rowspan="2">Edit</th>
                                                            </tr>
                                                            <tr>
                                                                @for ($i = $sum_solong; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>{{$user->kamar}}</td>
                                                                <p hidden {{$i=0, $ii=0}}></p>
                                                                @foreach ($solongs as $solong)
                                                                    @if($user->id == $solong->id_mahasiswa)
                                                                    <td>
                                                                        @if ($solong->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        <p hidden {{$i+=1}}></p>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                        <p hidden {{$ii+=1}}></p>
                                                                    </td>
                                                                    @endif
                                                                @endforeach
                                                                <td>@if($ii == 0)
                                                                    0
                                                                    @else
                                                                    {{$i/$ii*100}}
                                                                    @endif 
                                                                    %
                                                                </td>
                                                                <td><a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-solong{{$user->id}}" value="{{$user->id}}">Edit</button></a></td>
                                                                <div class="modal fade" id="modal-solong{{$user->id}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title">Edit Data Ngalong {{$user->name}}</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form method="POST" role="form" action="#">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('PATCH')}}
                                                                                <input type="hidden" name="model" value="solong">
                                                                                <div class="form-group">
                                                                                    <label>Nama</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->name}}" value="{{$user->name}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>NIM</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->nim}}" value="{{$user->nim}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Lorong / Kamar</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->lorong}} / {{$user->kamar}}" value="{{$user->lorong}} / {{$user->kamar}}" disabled>
                                                                                </div>
                                                                                <i hidden {{$index_id=0}}></i>
                                                                                @foreach($solongs as $solong)
                                                                                    @if($user->id == $solong->id_mahasiswa)
                                                                                        <div class="form-group">
                                                                                            <label>@php
                                                                                                echo date('d F Y', strtotime($solong->tanggal));
                                                                                            @endphp</label>
                                                                                            <select class="form-control" name="kehadirans[{{$index_id}}]" >
                                                                                                <option value="1" @if($solong->kehadiran == 1) selected @endif>Hadir</option>
                                                                                                <option value="0" @if($solong->kehadiran == 0) selected @endif>Tidak Hadir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <input type="hidden" name="ids[{{$index_id}}]" value="{{$solong->id}}">
                                                                                        <i hidden {{$index_id+=1}}></i>
                                                                                    @endif
                                                                                @endforeach
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}></p>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_3">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Ngadung</h4> 
                                                <p>Menampilkan presensi kegiatan ngadung.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table id="example3" class="table table-bordered table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">No</th>
                                                                <th rowspan="2">Nama</th>
                                                                <th rowspan="2">NIM</th>
                                                                <th rowspan="2">Kamar</th>
                                                                <th colspan="{{ $sum_ngadung}} ">Ngadung ke</th>
                                                                <th rowspan="2">Persentase</th>
                                                                <th rowspan="2">Edit</th>
                                                            </tr>
                                                            <tr>
                                                                @for ($i = $sum_ngadung; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>{{$user->kamar}}</td>
                                                                <p hidden {{$i=0, $ii=0}}></p>
                                                                @foreach ($ngadungs as $ngadung)
                                                                    @if($user->id == $ngadung->id_mahasiswa)
                                                                    <td>
                                                                        @if ($ngadung->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        <p hidden {{$i+=1}}></p>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                        <p hidden {{$ii+=1}}></p>
                                                                    </td>
                                                                    @endif
                                                                @endforeach
                                                                <td>@if($ii == 0)
                                                                    0
                                                                    @else
                                                                    {{$i/$ii*100}}
                                                                    @endif 
                                                                    %
                                                                </td>
                                                                <td><a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-ngadung{{$user->id}}" value="{{$user->id}}">Edit</button></a></td>
                                                                <div class="modal fade" id="modal-ngadung{{$user->id}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title">Edit Data Ngadung {{$user->name}}</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form method="POST" role="form" action="#">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('PATCH')}}
                                                                                <input type="hidden" name="model" value="ngadung">
                                                                                <div class="form-group">
                                                                                    <label>Nama</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->name}}" value="{{$user->name}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>NIM</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->nim}}" value="{{$user->nim}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Lorong / Kamar</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->lorong}} / {{$user->kamar}}" value="{{$user->lorong}} / {{$user->kamar}}" disabled>
                                                                                </div>
                                                                                <i hidden {{$index_id=0}}></i>
                                                                                @foreach($ngadungs as $ngadung)
                                                                                    @if($user->id == $ngadung->id_mahasiswa)
                                                                                        <div class="form-group">
                                                                                            <label>@php
                                                                                                echo date('d F Y', strtotime($ngadung->tanggal));
                                                                                            @endphp</label>
                                                                                            <select class="form-control" name="kehadirans[{{$index_id}}]" >
                                                                                                <option value="1" @if($ngadung->kehadiran == 1) selected @endif>Hadir</option>
                                                                                                <option value="0" @if($ngadung->kehadiran == 0) selected @endif>Tidak Hadir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <input type="hidden" name="ids[{{$index_id}}]" value="{{$ngadung->id}}">
                                                                                        <i hidden {{$index_id+=1}}></i>
                                                                                    @endif
                                                                                @endforeach
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_4">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Apel</h4> 
                                                <p>Masukan presensi kegiatan apel.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table id="example4" class="table table-bordered table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">No</th>
                                                                <th rowspan="2">Nama</th>
                                                                <th rowspan="2">NIM</th>
                                                                <th rowspan="2">Kamar</th>
                                                                <th colspan="{{ $sum_ngalong}} ">Ngalong ke</th>
                                                                <th rowspan="2">Persentase</th>
                                                                <th rowspan="2">Edit</th>
                                                            </tr>
                                                            <tr>
                                                                @for ($i = $sum_ngalong; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>{{$user->kamar}}</td>
                                                                <p hidden {{$i=0, $ii=0}}></p>
                                                                @foreach ($ngalongs as $ngalong)
                                                                    @if($user->id == $ngalong->id_mahasiswa)
                                                                    <td>
                                                                        @if ($ngalong->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        <p hidden {{$i+=1}}></p>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                        <p hidden {{$ii+=1}}></p>
                                                                    </td>
                                                                    @endif
                                                                @endforeach
                                                                <td>@if($ii == 0)
                                                                    0
                                                                    @else
                                                                    {{$i/$ii*100}}
                                                                    @endif 
                                                                    %
                                                                </td>
                                                                <td><a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-ngalong{{$user->id}}" value="{{$user->id}}">Edit</button></a></td>
                                                                <div class="modal fade" id="modal-ngalong{{$user->id}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title">Edit Data Ngalong {{$user->name}}</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form method="POST" role="form" action="#">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('PATCH')}}
                                                                                <input type="hidden" name="model" value="ngalong">
                                                                                <div class="form-group">
                                                                                    <label>Nama</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->name}}" value="{{$user->name}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>NIM</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->nim}}" value="{{$user->nim}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Lorong / Kamar</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->lorong}} / {{$user->kamar}}" value="{{$user->lorong}} / {{$user->kamar}}" disabled>
                                                                                </div>
                                                                                <i hidden {{$index_id=0}}></i>
                                                                                @foreach($ngalongs as $ngalong)
                                                                                    @if($user->id == $ngalong->id_mahasiswa)
                                                                                        <div class="form-group">
                                                                                            <label>@php
                                                                                                echo date('d F Y', strtotime($ngalong->tanggal));
                                                                                            @endphp</label>
                                                                                            <select class="form-control" name="kehadirans[{{$index_id}}]" >
                                                                                                <option value="1" @if($ngalong->kehadiran == 1) selected @endif>Hadir</option>
                                                                                                <option value="0" @if($ngalong->kehadiran == 0) selected @endif>Tidak Hadir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <input type="hidden" name="ids[{{$index_id}}]" value="{{$ngalong->id}}">
                                                                                        <i hidden {{$index_id+=1}}></i>
                                                                                    @endif
                                                                                @endforeach
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}></p>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_5">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Ngalong</h4> 
                                                <p>Masukan presensi kegiatan ngalong.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table id="example5" class="table table-bordered table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">No</th>
                                                                <th rowspan="2">Nama</th>
                                                                <th rowspan="2">NIM</th>
                                                                <th rowspan="2">Kamar</th>
                                                                <th colspan="{{ $sum_apel}} ">Apel ke</th>
                                                                <th rowspan="2">Persentase</th>
                                                                <th rowspan="2">Edit</th>
                                                            </tr>
                                                            <tr>
                                                                @for ($i = $sum_apel; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>{{$user->kamar}}</td>
                                                                <p hidden {{$i=0, $ii=0}}></p>
                                                                @foreach ($apels as $apel)
                                                                    @if($user->id == $apel->id_mahasiswa)
                                                                    <td>
                                                                        @if ($apel->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        <p hidden {{$i+=1}}></p>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                        <p hidden {{$ii+=1}}></p>
                                                                    </td>
                                                                    @endif
                                                                @endforeach
                                                                <td>@if($ii == 0)
                                                                    0
                                                                    @else
                                                                    {{$i/$ii*100}}
                                                                    @endif 
                                                                    %
                                                                </td>
                                                                <td><a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-apel{{$user->id}}" value="{{$user->id}}">Edit</button></a></td>
                                                                <div class="modal fade" id="modal-apel{{$user->id}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title">Edit Data apel {{$user->name}}</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form method="POST" role="form" action="#">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('PATCH')}}
                                                                                <input type="hidden" name="model" value="apel">
                                                                                <div class="form-group">
                                                                                    <label>Nama</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->name}}" value="{{$user->name}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>NIM</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->nim}}" value="{{$user->nim}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Lorong / Kamar</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->lorong}} / {{$user->kamar}}" value="{{$user->lorong}} / {{$user->kamar}}" disabled>
                                                                                </div>
                                                                                <i hidden {{$index_id=0}}></i>
                                                                                @foreach($apels as $apel)
                                                                                    @if($user->id == $apel->id_mahasiswa)
                                                                                        <div class="form-group">
                                                                                            <label>@php
                                                                                                echo date('d F Y', strtotime($apel->tanggal));
                                                                                            @endphp</label>
                                                                                            <select class="form-control" name="kehadirans[{{$index_id}}]" >
                                                                                                <option value="1" @if($apel->kehadiran == 1) selected @endif>Hadir</option>
                                                                                                <option value="0" @if($apel->kehadiran == 0) selected @endif>Tidak Hadir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <input type="hidden" name="ids[{{$index_id}}]" value="{{$apel->id}}">
                                                                                        <i hidden {{$index_id+=1}}></i>
                                                                                    @endif
                                                                                @endforeach
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_6">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">HBA</h4> 
                                                <p>Masukan presensi kegiatan HBA.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table id="example6" class="table table-bordered table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">No</th>
                                                                <th rowspan="2">Nama</th>
                                                                <th rowspan="2">NIM</th>
                                                                <th rowspan="2">Kamar</th>
                                                                <th colspan="{{ $sum_hariBersihAsrama}} ">HBA ke</th>
                                                                <th rowspan="2">Persentase</th>
                                                                <th rowspan="2">Edit</th>
                                                            </tr>
                                                            <tr>
                                                                @for ($i = $sum_hariBersihAsrama; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                            @endphp
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>{{$user->kamar}}</td>
                                                                <p hidden {{$i=0, $ii=0}}></p>
                                                                @foreach ($hariBersihAsramas as $hariBersihAsrama)
                                                                    @if($user->id == $hariBersihAsrama->id_mahasiswa)
                                                                    <td>
                                                                        @if ($hariBersihAsrama->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        <p hidden {{$i+=1}}></p>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                        <p hidden {{$ii+=1}}></p>
                                                                    </td>
                                                                    @endif
                                                                @endforeach
                                                                <td>@if($ii == 0)
                                                                    0
                                                                    @else
                                                                    {{$i/$ii*100}}
                                                                    @endif 
                                                                    %
                                                                </td>
                                                                <td><a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-hariBersihAsrama{{$user->id}}" value="{{$user->id}}">Edit</button></a></td>
                                                                <div class="modal fade" id="modal-hariBersihAsrama{{$user->id}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title">Edit Data hariBersihAsrama {{$user->name}}</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form method="POST" role="form" action="#">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('PATCH')}}
                                                                                <input type="hidden" name="model" value="hariBersihAsrama">
                                                                                <div class="form-group">
                                                                                    <label>Nama</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->name}}" value="{{$user->name}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>NIM</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->nim}}" value="{{$user->nim}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Lorong / Kamar</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->lorong}} / {{$user->kamar}}" value="{{$user->lorong}} / {{$user->kamar}}" disabled>
                                                                                </div>
                                                                                <i hidden {{$index_id=0}}></i>
                                                                                @foreach($hariBersihAsramas as $hariBersihAsrama)
                                                                                    @if($user->id == $hariBersihAsrama->id_mahasiswa)
                                                                                        <div class="form-group">
                                                                                            <label>@php
                                                                                                echo date('d F Y', strtotime($hariBersihAsrama->tanggal));
                                                                                            @endphp</label>
                                                                                            <select class="form-control" name="kehadirans[{{$index_id}}]" >
                                                                                                <option value="1" @if($hariBersihAsrama->kehadiran == 1) selected @endif>Hadir</option>
                                                                                                <option value="0" @if($hariBersihAsrama->kehadiran == 0) selected @endif>Tidak Hadir</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <input type="hidden" name="ids[{{$index_id}}]" value="{{$hariBersihAsrama->id}}">
                                                                                        <i hidden {{$index_id+=1}}></i>
                                                                                    @endif
                                                                                @endforeach
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                            </tr>
                                                            @endforeach
                                                            <p hidden {{$nomor=0}}></p>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_7">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <h4 class="title">Acara Lain</h4> 
                                                <p>Masukan presensi kegiatan Acara Lain.</p>
                                            </div>
                                            <div class="card-content table-responsive">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <table id="example7" class="table table-bordered table-hover text-center">
                                                            <thead>
                                                            <tr>
                                                                <th rowspan="2">No</th>
                                                                <th rowspan="2">Nama</th>
                                                                <th rowspan="2">NIM</th>
                                                                <th rowspan="2">Kamar</th>
                                                                <th colspan="{{ $sum_sodung}} ">Sodung ke</th>
                                                                <th rowspan="2">Edit</th>
                                                            </tr>
                                                            <tr>
                                                                @for ($i = $sum_sodung; $i-- > 0;)
                                                                    <th>{{ $nomor2+=1 }}</th>
                                                                @endfor
                                                                <p hidden{{ $nomor2=0 }}></p>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                            @endphp
                                                            @foreach($users as $user)
                                                            <tr>
                                                                <td>{{$nomor+=1}}</td>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->nim}}</td>
                                                                <td>{{$user->kamar}}</td>
                                                                @foreach ($sodungs as $sodung)
                                                                    
                                                                    @if($user->id == $sodung->id_mahasiswa)
                                                                    <td>
                                                                        {{--  @foreach($sodungs as $sodung)  --}}
                                                                        @if ($sodung->kehadiran == 1)
                                                                        <i class="fa fa-check"></i>
                                                                        @else
                                                                        <i class="fa fa-close"></i>
                                                                        @endif
                                                                    </td>
                                                                    {{--  @endforeach  --}}
                                                                    @endif
                                                                    
                                                                @endforeach
                                                                <td><a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sodung{{$user->id}}" value="{{$user->id}}">Edit</button></a></td>
                                                                <div class="modal fade" id="modal-sodung{{$user->id}}">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title">Edit Data sodung {{$user->name}}</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form method="POST" role="form" action="#">
                                                                            {{ csrf_field() }}
                                                                                <div class="form-group">
                                                                                    <label>Nama</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->name}}" value="{{$user->name}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>NIM</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->nim}}" value="{{$user->nim}}" disabled>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Lorong / Kamar</label>
                                                                                    <input type="text" class="form-control" placeholder="{{$user->lorong}} / {{$user->kamar}}" value="{{$user->lorong}} / {{$user->kamar}}" disabled>
                                                                                </div>
                                                                                <i hidden {{$editNumber=0}}></i>
                                                                                @foreach($sodungs as $sodung)
                                                                                    @if($user->id == $sodung->id_mahasiswa)
                                                                                        <div class="form-group">
                                                                                            <label>@php
                                                                                                echo date('d F Y', strtotime($sodung->tanggal));
                                                                                            @endphp</label>
                                                                                            <select class="form-control">
                                                                                                <option @if($sodung->kehadiran == 1) selected @endif value="1">Hadir</option>
                                                                                                <option @if($sodung->kehadiran == 0) selected @endif value="0">Tidak Hadir</option>
                                                                                            </select>
                                                                                        </div>  
                                                                                    @endif
                                                                                @endforeach
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <!-- /.modal-content -->
                                                                    </div>
                                                                    <!-- /.modal-dialog -->
                                                                </div>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- /.tab-content -->
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                  
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
    $(function () {
        $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
        $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
        $('#example3').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
        $('#example4').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
        $('#example5').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
        $('#example6').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
        $('#example7').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
        $('#example1modal').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
    </script>
@endsection