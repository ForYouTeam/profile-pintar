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
  <div class="card-body" id="app">
    <div class="row">
			<div class="col-lg-3">
					<dashboard/>
			</div>
			<div class="col-lg-9">
				
			</div>
    </div>
  </div>
</div>
@endsection
@section('script')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection