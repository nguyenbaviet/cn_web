@extends('company.layout.commaster')
@section('content')
<div class="main-panel" id="main-panel">

	      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="title">Update Job</h4>
              
              </div>
                  <?php if($job->state == 0 ){ ?>
                  <a href="company/jobPost/deactive/{{$job->Id}}"><button class="btn btn-primary mt-4 pr-4 pl-4">Deactive</button></a>
                                   <?php }?>

              <div class="card-body">
                <form action="company/jobPost/updateJob/{{$job->Id}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @if(Session::has('error'))

            <div class="alert alert-success">{{Session::get('error')}}</div>
          @endif
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label><h5><b>Title</b></h5></label>
                        <input type="text" class="form-control" placeholder="{{$job->title}}" name="title">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label><h5><b>Category</b></h5></label>
                          <select class="form-control" name="category">
                                               @foreach($cate as $ca)
                                               <option>{{$ca->Name}}</option>
                                               @endforeach
                                            </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label ><h5><b>Type</b></h5></label>
                          <select class="form-control" name="type">
                                            @foreach($type as $ty)
                                               <option>{{$ty->Name}}</option>
                                               @endforeach 
                                            </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label><h5><b>Salary</b></h5></label>
                        <input type="text" class="form-control" placeholder="{{$job->salary}}" name="salary">
                      </div>
                    </div>

                      <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label ><h5><b>Location</b></h5></label>
                          <select class="form-control" name="location">
                                               @foreach($location as $loca)
                                               <option>{{$loca->name}}</option>
                                               @endforeach
                                            </select>



              </div>
      </div>
</div>
                    <div class="col-md-12 pl-1">
                      <div class="form-group">
                        <label><h5><b>Description</b></h5></label></br>
                        <p><font color="red">* Để trống nếu muốn giữ nguyên miêu tả</font></p>
                        <textarea name="des" rows="5" cols="80" placeholder="abc"> </textarea>  
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label><h5><b>Requirement</b></h5></label></br>
                        <p><font color="red">* Để trống nếu muốn giữ nguyên miêu tả</font></p>
                        <textarea name="req" placeholder="Requirement" rows="5" cols="80"> </textarea>                   </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label><h5><b>Deadline</b></h5></label>
                        <input class="form-control" type="date" value="{{$job->deadline}}" id="example-date-input" name="deadline" required>
                      </div>
                    </div>
                      
                    </div>
                </div>
                  <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                </form>
              </div>
            </div>
          </div>
          </div>
      </div>
</div>
@endsection