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
    
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Quick Example</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{ route('update', $dokters) }}">
          @csrf
          {{method_field('PATCH')}}
          <div class="box-body">
            <div class="form-group">
                    <label for="exampleInputEmail1">Nama Dokter</label>
                    <input type="text" class="form-control" value="{{$dokters -> nama_dokter}}" name="nama_dokter" id="exampleInputEmail1" placeholder="Masukan Nama Dokter">
            </div>

            <div class="form-group">
                    <label for="exampleInputEmail1">Spesialis</label>
                    <select name="spesialis" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="{{$dokters -> spesialis}}">{{$dokters -> spesialis}}</option>
                            <option value="Penyakit Dalam">Spesialis Penyakit Dalam</option>
                            <option value="Anak">Spesialis Anak</option>
                            <option Value="Kandungan">Spesialis Kandungan</option>
                            <option value="Jantung">Spesialis Jantung</option>
                            <option value="THT">Spesialis THT</option>
                    </select>
                    
            </div>

            <div class="form-group">
                    <label for="exampleInputEmail1">No. Hp</label>
                    <input type="number" class="form-control" value="{{$dokters -> noHp}}" name="noHp" id="exampleInputEmail1" placeholder="Masukan No. Hp">
            </div>

            <div class="form-group"
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" value="{{$dokters -> email}}" name="email" id="exampleInputEmail1" placeholder="Masukan Email">
            </div>

            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <input type="file" id="exampleInputFile">

              <p class="help-block">Example block-level help text here.</p>
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
@endsection