@extends('company.layout.commaster')
@section('content')

<div class="main-panel" id="main-panel">
       <section class="ftco-section bg-light">
      <div class="container"><h4>	Chi tiết công việc </h4></br>
	 Title: {{$job->title}}</br>
	 Type: {{$type->Name}}</br>
	 Category: {{$cate->Name}}</br>
	 Salary: {{$job->salary}} USD</br>
	 Description: <article>{!! $job->description !!}</article></br>
	 Requirement: <article>{!! $job->description !!}</article></br>
	 Deadline: {{$job->deadline}}</br>
	 Location: {{$job->location}}</br>
	 Số người ứng tuyển:
	

        @php
            $num = DB::table('apply')->where('idJob',$job->Id)->count();
             echo($num);
        @endphp
	</br>
	 Views:</br>

	</div>
</section>
</div>

@endsection