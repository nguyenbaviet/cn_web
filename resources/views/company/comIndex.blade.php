@extends('company.layout.commaster')
@section('content')
<div class="main-panel" id="main-panel">

   <section class="ftco-section bg-light">
   		@foreach($user as $row)
	 @php
	 $job=DB::table('job')->where('idUser',$row->username)->get();
	 $b = 0;
	 	
	 	$num1 = DB::table('job')->where('idUser',$row->username)->count();
	 	foreach($job as $a){
	 	$num2 =DB::table('apply')->where('idJob',$a->Id)->count();
	 	$b=$b+$num2;
	 }
	 @endphp
	 @if(Session('user'))
<div class="container">
	            <div class="main-content-inner">
	            	<h3>Xin chào {{$row->name}}</h3>
                <div class="row">
                    <!-- seo fact area start -->
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-thumb-up"><a href="company/jobPost/allJob/{{Session('user')}}"></i> Công việc đã đăng </a></div>
                                            <h2>{{$num1}}</h2>
                                        </div>
                                        <canvas id="seolinechart1" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><a href="company/applyJob/allApplyJob/{{Session('user')}}"><i class="ti-share"></i> Ứng tuyển</a></div>
                                            <h2>{{$b}}</h2>
                                        </div>
                                        <canvas id="seolinechart2" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                     @endif


                </div>
            </div>
	
	@endforeach
</div>
</section>

</div>
@endsection