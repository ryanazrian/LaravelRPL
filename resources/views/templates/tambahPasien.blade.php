@extends('templates.default1')
@section('content')
<section class="content">
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
    <br>
    <br>
    <br>
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Pasien</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{ route('post.pasien') }}">
          @csrf
          <div class="box-body">
            <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pasien</label>
                    <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Masukan Nama Pasien">
            </div>

            <div class="form-group"
                <label for="exampleInputEmail1">No. Hp</label>
                <input type="number" class="form-control" name="noHp" id="exampleInputEmail1" placeholder="Masukan No. Hp keluarga pasien">
            </div>

            <div class="form-group">
                    <label>Tanggal Lahir:</label>
    
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggalLahir" class="form-control pull-right" id="datepicker">
                    </div>
                    <!-- /.input group -->
                  </div>

            <div class="form-group">
                    <label for="exampleInputEmail1">Desrkipsi Penyakit</label>
                    <textarea class="form-control" name="deskripsiPenyakit" rows="3" placeholder="Deskripsi Penyakit....."></textarea>
                </div>

            <div class="form-group">
              <label for="exampleInputFile">Nama Gedung</label>
              <select name="id_Gedung" class="form-control select2" style="width: 100%;" value="">--- Pilih Gedung ---</option>
                <option value="">--Pilih Gedung--</option>
                @foreach ($gedung as $key)
                  <option value="{{ $key->id }}">{{ $key->namaGedung }}</option>
              @endforeach
              </select>
            </div>
            
            <div class="form-group">
              <label for="exampleInputFile">Nama Kamar</label>
              <select name="id_kamar" class="form-control select2" style="width: 100%;">
                  <option value="">--Pilih Kamar--</option>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputFile">Nama Dokter</label>
              <select name="id_Dokter" class="form-control select2" style="width: 100%;" value="">--- Pilih Gedung ---</option>
                @foreach ($dokters as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter  ->nama_dokter }}</option>
                @endforeach
                </select>
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox"> Check me out
              </label>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</section>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@endsection

