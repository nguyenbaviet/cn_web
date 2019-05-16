@extends('company.layout.commaster')
@section('content')
<div class="main-panel" id="main-panel">

        <section class="ftco-section bg-light">
      <div class="container">
    
         <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Danh sách công việc</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                                             @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('xoa'))

                        <div class="alert alert-success">{{Session::get('xoa')}}</div>
                    @endif
                       @if(Session::has('chinhsua'))

                        <div class="alert alert-success">{{Session::get('chinhsua')}}</div>
                    @endif
                    @if(Session::has('thanhcong'))

                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                    @endif
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Category</th>
                                                   
                                                    <th scope="col">Deadline</th>
                                                    <th scope="col">Ứng tuyển</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($job as $row)
                                                    <tr>
                                                    <th>{{$row->title}}</th>
                                                    <td>
                                                        @php
                                                         $cate = DB::table('category')->where('Id',$row->idCategory)->first();
                                                         echo($cate->Name);
                                                         
                                                        @endphp
                                                    </td>
                                                        
                                                   
                                                    <td>{{$row->deadline}}</td>
                                                    <td>
                                                        @php
                                                            $num = DB::table('apply')->where('idJob',$row->Id)->count();
                                                            echo($num);
                                                        @endphp
                                                    </td>
                                                    <td> <?php if($row->state == 0) echo("Active"); else echo("Đóng"); ?></td>
                                                    <td>
                                                        
                                                        <ul class="d-flex justify-content-center">
                                                            <?php if($row->state == 0){ ?>
                                                            <li class="mr-2"><a href="company/jobPost/updateJob/{{$row->Id}}" ><button class="btn btn-primary mt-2 pr-2 pl-2">Update</button></a></li>
                                                            <?php } else{?> 
                                                            <li class="mr-2"><a href="company/jobPost/active/{{$row->Id}}" ><button class="btn btn-primary mt-2 pr-2 pl-2">Active</button></a></li>
                                                            <?php } ?>
                                                            <li class="mr-2"><a href="company/jobPost/deleteJob/{{$row->Id}}" class="text-danger" onclick="return confirm('Việc này sẽ xóa tất cả các ứng tuyển cho công việc này. Bạn có muốn tiếp tục không?')"><button class="btn btn-primary mt-2 pr-2 pl-2">Delete</button></a></li>
                                                            <li class="mr-2"><a href="company/jobPost/detailJob/{{$row->Id}}" class="text-secondary"><button class="btn btn-primary mt-2 pr-2 pl-2">Detail</button></li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                                @endforeach
                                           
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
