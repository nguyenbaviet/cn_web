@extends('company.layout.commaster')
@section('content')
<div class="main-panel" id="main-panel">
	        <section class="ftco-section bg-light">
      <div class="container">
    
         <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Progress Table</h4>
                                @if(Session::has('update'))

                        <div class="alert alert-success">{{Session::get('update')}}</div>
                    @endif
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Người ứng tuyển</th>

                                                    <th scope="col">Chi tiết</th>
                                                    <th scope="col">State</th>



                                                </tr>
                                            </thead>
                                            @foreach($apply as $row)
                                            <tr>
                                            	<td>
                                                 @php
                                                   $tit = DB::table('job')->where('Id',$row->idJob)->first();
                                                   echo($tit->title);
                                                 @endphp   
                                                </td>
                                            	<td>{{$row->username}}</td>
                                            	<td class="center">
                                            		<i class="fa fa-pencil fa-fw"></i><a href="company/applyJob/ungVien/{{$row->username}}">Xem chi tiết</a>
                                            	</td>
                                              <td>
                                                <div id ="content1">
                                                <?php if($row->stateapply == NULL) echo('Chưa xử lí'); else echo($row->stateapply); ?>
                                               </div>
                                               </td>
                                               <td>
                                                <form action="company/applyJob/updateState/{{$row->idJob}}/{{$row->username}}" method="POST">
                                                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <select name="state">
                                                  <?php if($row->stateapply == NULL){ ?>
                                                  <option value=""></option>
                                                  <option value="Apply">Apply</option>
                                                  <option value="Reject">Reject</option>
                                                  <?php }else{ ?>
                                                  <option value="Apply">Apply</option>
                                                  <option value="Reject">Reject</option>
                                                  <?php }?>
                                                </select> 

                                              <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                            </form>

                                               </td>


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