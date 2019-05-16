@extends('company.layout.commaster')
@section('content')
<div class="main-panel" id="main-panel">
	       <section class="ftco-section bg-light">
      <div class="container"><h4>	Thông tin ứng viên </h4></br>
	@foreach($user as $a)
	Họ tên: {{$a->name}} </br>
	Giới tính: {{$a->gender}}</br>
	Ngày sinh: {{$a->DOB}}</br>
	Địa chỉ:  {{$a->address}}</br>
	Email: {{$a->mail}}</br>
	Phone number: {{$a->phone}}</br>
	@foreach($skill as $b)
	Skill: {{$b->skill}} </br>
	Experience: {{$b->experience}}
	@endforeach
	@endforeach

<a href="sendmail"><button class="btn btn-primary btn-block">Email cho ứng viên</button></a>



</div>
	
</section>

@endsection