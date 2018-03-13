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
                    <h3 class="box-title">Data Dokter</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>No.</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>No. Hp</th>
                        <th>email</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <?php $no = 0 ?>
                        @foreach ($dokters as $dokter)
                        <tbody>
                                <tr>
                                <td>{{++$no}}</td>
                                <td>{{$dokter -> nama_dokter}}
                                </td>
                                <td>{{$dokter -> spesialis}}</td>
                                <td> {{$dokter -> noHp}}</td>
                                <td>{{$dokter -> email}}</td>
                                <td> 
                                    <button class="edit-modal btn btn-info" data-id="{{$dokter->id}}"
                                            data-name="{{$dokter->nama_dokter}}" data-hp={{$dokter -> noHp}} data-spesialis={{$dokter->spesialis}} data-email={{$dokter->email}} $nasi = {{$dokter->spesialis}}>
                                            <span class="glyphicon glyphicon-edit"></span> Edit
                                    </button>

                                    <button class="delete-modal btn btn-danger"
                                        data-id="{{$dokter->id}}" data-name="{{$dokter->nama_dokter}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </button>
                                </td>
                                </tr>
                                </tbody>
                        @endforeach
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
                                <label class="control-label col-sm-2" for="name">Nama Dokter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="n">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Spesialis</label>
                                <div class="col-sm-10">
                                        <select id="s" class="form-control select2" style="width: 100%;">
                                        @foreach ($spesialis as $data )
                                           <option value="{{$data->spesialis}}" 
                                            @if ($data->id)
                                                selected
                                            @endif
                                            
                                            >{{$data->spesialis}}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                 <label class="control-label col-sm-2" for="name">No. Hp</label>
                                  <div class="col-sm-10">
                                   <input type="number" class="form-control" id="l">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="e">
                                </div>
                            </div>
                        </form>
                        <div class="deleteContent">
                            Are you Sure you want to delete <span class="dname"></span> ? <span
                                class="hidden did"></span>
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
<script src="{{ asset('js/script.js') }}"></script>
@endsection