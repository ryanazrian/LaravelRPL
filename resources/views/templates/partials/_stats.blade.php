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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{$banyakPasien}}</h3>
  
                <p>Jumlah Pasien</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="{{url('/tampilanPasien')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{$banyakDokter}}<sup style="font-size: 20px"></sup></h3>
  
                <p>Jumlah Dokter</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('/tampilanDokter')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>Rp{{number_format($banyakPendapatan)}}</h3>
  
                <p>Total Pemasukan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <div class="small-box-footer bg-green"><i class="fa"></i></div>
            </div>
          </div>
          <!-- ./col -->
        </div>
<!-- /.row -->
      <!-- Main row -->
      <div class="position-relative">
            <!-- Left col -->
            <section class="col-lg-8 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                  {{-- <li><a href="#sales-chart" data-toggle="tab">Donut</a></li> --}}
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Pendapatan</li>
                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                  {{-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div> --}}
                </div>
              </div>
            </section>
      </div>    
      

