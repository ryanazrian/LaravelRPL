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
        <form role="form" method="POST" action="{{ route('post') }}">
          @csrf
          <div class="box-body">
            <div class="form-group">
                    <label for="exampleInputEmail1">Nama Dokter</label>
                    <input type="text" class="form-control" name="nama_dokter" id="exampleInputEmail1" placeholder="Masukan Nama Dokter">
            </div>

            <div class="form-group">
                    <label for="exampleInputEmail1">Spesialis</label>
                    <select name="spesialis" class="form-control select2" style="width: 100%;">
                      @foreach ( $spesialis as $data )
                      <option selected="selected" value="{{$data->spesialis}}">{{$data->spesialis}}</option>    
                      @endforeach
                      
                    </select>
            </div>

            <div class="form-group">
                    <label for="exampleInputEmail1">No. Hp</label>
                    <input type="number" class="form-control" name="noHp" id="exampleInputEmail1" placeholder="Masukan No. Hp">
            </div>

            <div class="form-group"
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Masukan Email">
            </div>

          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
</section>
@endsection