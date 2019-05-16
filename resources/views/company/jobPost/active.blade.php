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
                <h4 class="title">Active Job</h4>
                @if($job->state ==1) <p><font color="red">Công việc ở trạng thái đóng. Để kích hoạt lại hãy nhập thời gian phù hợp và submit</font></p>@endif
              </div>
              <div class="card-body">
                <form action="company/jobPost/active/{{$job->Id}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                @if(Session::has('error'))

            <div class="alert alert-success">{{Session::get('error')}}</div>
          @endif
                   <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label><h5><b>Deadline</b></h5></label>
                        <input class="form-control" type="date" value="{{$job->deadline}}" id="example-date-input" name="deadline" required>
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


