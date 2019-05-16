@extends('company.layout.commaster')
@section('content')
<div class="main-panel" id="main-panel">
	        <section class="ftco-section bg-light">
      <div class="container">
    
         <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Hộp thư đi</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Người nhận</th>
                                                    <th scope="col">Chủ đề</th>
                                                    <th scope="col">Nội dung</th>



                                                </tr>
                                            </thead>
                                            @foreach($mail as $row)
                                            <tr>
                                            	<td>{{$row->To_user}}</td>
                                            	<td>{{$row->subject}}</td>
                                            	<td ><article>{!!$row->mail!!}</article></td>

                                            </tr>
                                            @endforeach
                                            <tbody>
                                            	
                                            </tbody>
                                           </table>
                                       </div>
                                   </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


</div>

@endsection