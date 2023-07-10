@extends('layout.Base')
@section('header-content')
<div class="page-header-title">
  <h5 class="m-b-10">Dashboard</h5>
</div>
<ul class="breadcrumb">
  <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
</ul>
@endsection
@section('main-content')
<div class="card">
  <div class="card-header">
		<h5>Grafik Data</h5>
  </div>
  <div class="card-body p-4" id="app">
    <div class="row">
			<div class="col-lg-3">
					<dashboard/>
			</div>
			<div class="col-lg-9">
        <div class="row">
          <div class="col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h4 class="text-c-yellow">{{$data['anggota']}}</h4>
                              <h6 class="text-muted m-b-0">Anggota</h6>
                          </div>
                          <div class="col-4 text-right">
                              <i class="feather icon-user f-28"></i>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer bg-c-yellow">
                      <div class="row align-items-center">
                          <div class="col-9">
                              <p class="text-white m-b-0">% TOTAL %</p>
                          </div>
                          <div class="col-3 text-right">
                              <i class="feather icon-user text-white f-16"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h4 class="text-c-green">{{$data['postingan']}}</h4>
                              <h6 class="text-muted m-b-0">Postingan</h6>
                          </div>
                          <div class="col-4 text-right">
                              <i class="feather icon-trending-up f-28"></i>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer bg-c-green">
                      <div class="row align-items-center">
                          <div class="col-9">
                              <p class="text-white m-b-0">% TOTAL %</p>
                          </div>
                          <div class="col-3 text-right">
                              <i class="feather icon-trending-up text-white f-16"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h4 class="text-c-red">{{$data['komentar']}}</h4>
                              <h6 class="text-muted m-b-0">Komentar</h6>
                          </div>
                          <div class="col-4 text-right">
                              <i class="feather icon-message-square f-28"></i>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer bg-c-red">
                      <div class="row align-items-center">
                          <div class="col-9">
                              <p class="text-white m-b-0">% TOTAL %</p>
                          </div>
                          <div class="col-3 text-right">
                              <i class="feather icon-message-square text-white f-16"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h4 class="text-c-blue">{{$data['sektor']}}</h4>
                              <h6 class="text-muted m-b-0">Sektor</h6>
                          </div>
                          <div class="col-4 text-right">
                              <i class="feather icon-users f-28"></i>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer bg-c-blue">
                      <div class="row align-items-center">
                          <div class="col-9">
                              <p class="text-white m-b-0">% TOTAL %</p>
                          </div>
                          <div class="col-3 text-right">
                              <i class="feather icon-users text-white f-16"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
			</div>
    </div>
  </div>
</div>
@endsection
@section('script')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection