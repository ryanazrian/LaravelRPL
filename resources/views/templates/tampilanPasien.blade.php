@extends('templates.default1')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ $message }}</strong>
                </div>
                @endif
                
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
                </div>
                @endif
                
                @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
                </div>
                @endif
                
                @if ($message = Session::get('info'))
                <div class="alert alert-info alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
                </div>
                @endif
                
                @if ($errors->any())
                <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                Please check the form below for errors
                </div>
                @endif
            <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Data Pasien</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>No.</th>
                        <th>Nama Pasien</th>
                        <th>Taggal Lahir</th>
                        <th>No. Hp</th>
                        <th>Deskripsi Penyakit</th>
                        <th>Nama Gedung</th>
                        <th>Nama Kamar</th>
                        <th>Nama Dokter</th>
                        <th>Biaya Kamar</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <?php $no = 0 ?>
                        <?php $total = 0?>
                        @foreach ($pasiens as $pasien)
                        <tbody>
                                <tr>
                                <td>{{++$no}}</td>
                                <td>{{$pasien -> nama}}
                                </td>
                                <td>{{$pasien -> tanggalLahir}}</td>
                                <td> {{$pasien -> noHp}}</td>
                                <td> {{$pasien -> deskripsiPenyakit}}</td>
                                <td> {{$pasien->gedung['namaGedung']}}</td>
                                <td> {{$pasien->kamar['namaKamar']}}</td>
                                <td> {{$pasien->pasien['nama_dokter']}}</td>
                                <td> Rp{{ number_format(Carbon\Carbon::now()->diffInDays(new Carbon\Carbon($pasien->created_at)) * $pasien->kamar['hargaPerMalam'])}}</td>
                                <td> 
                                    <?php $total+=(Carbon\Carbon::now()->diffInDays(new Carbon\Carbon($pasien->created_at)) * $pasien->kamar['hargaPerMalam']) ?>
                                    <button class="edit-modal btn btn-info" data-id="{{$pasien->ids}}"
                                            data-name="{{$pasien->nama}}" data-hp="{{$pasien->noHp}}" data-tanggallahir="{{$pasien->tanggalLahir}}" data-penyakit="{{$pasien->deskripsiPenyakit}}" data-namagedung = "{{$pasien->id_Gedung}}" data-namakamar = "{{$pasien->id_kamar}}" data-dokter ="{{$pasien->id_Dokter}}">
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                    </button>

                                    <button class="delete-modal btn btn-danger"
                                        data-id="{{$pasien->ids}}" data-name="{{$pasien->kamar['namaKamar']}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </button>
                                </td>
                                </tr>
                                </tbody>
                        @endforeach
                        <tfoot>
                                <tr>
                                  <th>Jumlah Total</th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th>Rp{{number_format($total)}}</th>
                                </tr>
                                </tfoot>
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id">ID:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fid" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nama Pasien</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                   <input type="text" class="form-control" id="lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                 <label class="control-label col-sm-2" for="name">No. Hp</label>
                                  <div class="col-sm-10">
                                   <input type="number" class="form-control" id="l">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Deskripsi Penyakit</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="p" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nama Gedung</label>
                                <div class="col-sm-10">
                                        <select name="id_Gedung" id="gedung" class="form-control select2" style="width: 100%;" value="">
                                            <option value="">--Pilih Gedung--</option>
                                            @foreach ($gedung as $key)
                                              <option value="{{ $key->id }}">{{ $key->namaGedung }}</option>
                                          @endforeach
                                          </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nama Kamar</label>
                                <div class="col-sm-10">
                                        <select id="kamar" name="id_kamar" class="form-control select2" style="width: 100%;">
                                                <option value="">--Pilih Kamar--</option>
                                            </select>
                                        {{-- <textarea class="form-control" id="kamar" rows="3"></textarea> --}}

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nama Dokter</label>
                                <div class="col-sm-10">
                                    <select id="dokter" name="id_Dokter" class="form-control select2" style="width: 100%;">
                                        <option value="">--Pilih Dokter--</option>
                                    @foreach ($dokter as $data )
                                       <option value="{{$data->id}}">{{$data->nama_dokter}}</option>
                                    @endforeach
                                    </select>

                                    {{-- <textarea class="form-control" id="dokter" rows="3"></textarea> --}}
                            </div>
                            </div>
                        </form>
                        <div class="deleteContent">
                            Are you Sure you want to delete <span class="dname"></span> ? <span
                                class="did"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn actionBtn" data-dismiss="modal">
                                <span id="footer_action_button" class='glyphicon'> </span>
                            </button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

</section>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/scriptPasien.js') }}"></script>
@endsection