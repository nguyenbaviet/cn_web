@extends('master')
@section('content')
<style>
#more {display: none;}
</style>
<div class="hero-wrap js-fullheight" style="background-image: url('source/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
            <p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Có <span class="number" data-number="{{count($sumofjobs)}}">0</span> công việc hấp dẫn đang chờ bạn!</p>
            <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Dream <br><span>Job is Waiting</span></h1>

            <div class="ftco-search">
              <div class="row">
                <div class="col-md-12 nav-link-wrap">
                  <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="" role="tab" aria-controls="v-pills-1" aria-selected="false">Tìm kiếm công việc</a>

                  </div>
                </div>
                <div class="col-md-12 tab-wrap">
                  
                  <div class="tab-content p-4" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                      <form method="get" action="{{route('searchjob')}}" class="search-job">
                        <div class="row">
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="icon"><span class="icon-briefcase"></span></div>
                                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>                    
                                <input type="text" class="typeahead form-control" id="jobname" name="jobname" placeholder="eg. Thiết kế đồ họa" autocomplete="off">
                         
                                <div id="countryList"><br>
                              </div>
                              </div>
                      {{ csrf_field() }}

                        <script>
  $(document).ready(function(){

   $('#jobname').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
    var query = $(this).val(); //lấy gía trị ng dùng gõ
    if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
    {
     var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
     $.ajax({
      url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"POST", // phương thức gửi dữ liệu.
      data:{query:query, _token:_token},
      success:function(data){ //dữ liệu nhận về
       $('#countryList').fadeIn();  
       $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
     }
   });
   }
 });

   $(document).on('click', 'li', function(){  
    $('#jobname').val($(this).text());  
    $('#countryList').fadeOut();  
  });  

 });
</script>
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="select-wrap">
                                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                  <select name="catname" id="" class="form-control">
                                    @foreach($category as $cate)
                                    <option value="{{$cate->Id}}">{{$cate->Name}}</option>
                                  @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <div class="icon"><span class="icon-map-marker"></span></div>
                                <select name="searchlocation" id="" class="form-control">
                                    @foreach($location as $loca)
                                    <option value="{{$loca->name}}">{{$loca->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="form-group">
                              <div class="form-field">
                                <input type="submit" value="Tìm kiếm" class="form-control btn btn-primary">
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            @if (Session::has('thongbao1'))
    <div class="alert alert-success" style="text-align: center">
        {!! Session::get('thongbao1') !!}
    </div>
    @endif
          </div>
        </div>
      </div>
    </div>
       
        <section class="ftco-section bg-light">
                  <div class="card card-default">  
                <div class="card-header">
                  <h4 class="h4 text-muted"><center>Chi tiết công việc</center></h4>
                </div>
                <div class="card-body pt-0 table-responsive py-3">
                  <div class="row">
                     <div class="col-sm-8">
                      <h5 class="h5 text-info">{{ $job->title }}</h5>
                      <h6><b>Mô tả công việc</b></h6>
                      <article>{!! $job->description !!}</article>
                      <br/>
                      <br/>
                      <h6><b>Yêu cầu công việc</b></h6>
                      <article>{!! $job->requirement !!}</article>
                      <br/>
                      <br/>
                      <h6><b>Thông tin người liên hệ</b></h6>
                      @php
                        $user = DB::table('user')->where('username',$job->idUser)->get();
                      @endphp
                      @foreach($user as $us)
                      -Tên người đại diện: {{$us->name}}</br>
                      -Tên tài khoản: {{$us->username}}</br>
                      _Tên công ti: {{$us->company}}</br>
                      -Phone: {{$us->phone}}</br>
                      -Website: {{$us->website}}
                      @endforeach

                     </div>
                     <div class="col-sm-4 job-pecification">
                        <ul class="list-unstyled">
                          <li class="mb-2">
                      <span class="text-success">
                        <i class="fas fa-dollar-sign"></i> Salary : 
                      </span>
                       &#36; {{number_format($job->salary)}}
                    </li>
                    <li class="mb-2">
                      <span class="text-success">
                        <i class="fas fa-clock"></i> Deadline: 
                      </span>
                      {{$job->deadline}}
                    </li>
          @if(Session::has('user'))
          @php
          $user= Session('user');
          $type= DB::table('user')->where('username',$user)->first();
          if(($type->type)==2){
        @endphp
                    <div class="ml-auto d-flex">                      
                    @if ($result == 'exist')
                       <button class="btn btn-success btn-block"><i class="fas fa-check"></i>Đã nộp đơn</button></br>
                    @elseif($job->state == 1)
                       <button class="btn btn-primary btn-block">Công việc đã đóng</button></br> 
                    @else
                    <a href="{{route('applytothisjob',$job->Id)}}"><button class="btn btn-primary btn-block">     Nộp đơn xin việc   </button></a></br>
                    @endif
                   
              
                    </div>

                     @php
                      }
                    @endphp
                  </br>
                    <a href="sendmail"><button class="nav-item cta cta-mr-md-3">Gửi Email</button></a>
                   @endif 
                  </ul>
                     </div>
                   </div>
                </div>
            </div>
    </section>

    <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-resume"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Tìm kiếm hàng ngàn công việc</h3>
                <p>Tìm kiếm việc làm dễ dàng, phù hợp khả năng bản thân.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-collaboration"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Dễ dàng quản lý đơn xin việc</h3>
                <p>Quản lý hồ sơ thuận tiện, liên tục cập nhật công việc mới.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-promotions"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Các công việc hot</h3>
                <p>Các công việc với mức lương mơ ước, môi trường năng động.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-employee"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Tìm kiếm ứng viên tài năng</h3>
                <p>Hàng ngàn hồ sơ xin việc cho nhà tuyển dụng.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-counter">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Tìm kiếm công việc theo ngành</span>
            <h2 class="mb-4"><span>Tìm việc </span>theo nhóm ngành</h2>
          </div>
        </div>
        <div class="row">
          @for($j=0;$j<=2;$j++)
          <div class="col-md-3 ftco-animate">
            <ul class="category">
              @for($i=0;$i<$var;$i++)
              <li><a href="{{route('loaiviec',$types[$var*$j+$i]->Id)}}">{{$types[$var*$j+$i]->Name}}</a></li>
              @endfor
            </ul>
        </div>
        @endfor
        <div class="col-md-3 ftco-animate">
            <ul class="category">
              @for($i=3*$var;$i<=count($types)-1;$i++)
              <li><a href="{{route('loaiviec',$types[$i]->Id)}}">{{$types[$i]->Name}}</a></li>
            @endfor
            </ul>
        </div>

      </div>
    </section>

     <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(source/images/bg_1.jpg);" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="{{count($sumofjobs)}}">0</strong>
                    <span>Công việc</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="{{count($alluser)}}">0</strong>
                    <span>Người dùng</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="64">0</strong>
                    <span>Thành phố</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="{{count($allapply)}}">0</strong>
                    <span>Apply</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Dịch vụ hướng tới</span>
            <h2 class="mb-4"><span>Khách hàng</span> Hạnh phúc</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(source/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4">Với công nghệ tiên tiến và mạng lưới toàn cầu, ... giúp kết nối nhiều nhà tuyển dụng với các ứng viên tiềm năng và chất lượng, hỗ trợ nhiều doanh nghiệp tìm được nguồn nhân lực ưu tú và người tìm việc tìm thấy công việc phù hợp.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Giám đốc Marketing</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(source/images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4">Số lượng công việc và số lượng hồ sơ rất lớn. Thêm vào đó thì chất lượng công việc cũng như chất lượng hồ sơ ứng viên rất ổn. Nếu bạn là người đã có kinh nghiệm thì không nên bỏ qua trang web này.</p>
                    <p class="name">Tuấn Nguyễn</p>
                    <span class="position">Trưởng phòng Nhân sự</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(source/images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4">Trang web này cũng thường đăng tin của các công ty, doanh nghiệp vừa và nhỏ, tin tuyển dụng phong phú ở các ngành nghề, các lĩnh vực và nhiều vị trí. Hi vọng trang web tiếp tục hoàn thiện hơn.</p>
                    <p class="name">Nguyễn Hùng</p>
                    <span class="position">Người tìm việc</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(source/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4">...là một trang web nổi tiếng về tuyển dụng và tìm việc làm. Trang web này có nhiều ngành nghề và nhiều vị trí phù hợp cho cả sinh viên, lao động phổ thông hay lao động có chuyên môn. Dịch vụ tốt, hỗ trợ khách hàng nhiệt tình.</p>
                    <p class="name">Long Phạm</p>
                    <span class="position">Nhà phát triển Web</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(source/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4"> Bạn có thể tham gia tình nguyện, ứng tuyển vào một vị trí thực tập, tìm một công việc bán hoặc toàn thời gian. Đây là một trang web rất phù hợp cho các bạn sinh viên và các các bạn mới ra trường.. Giao diện thân thiện, dễ dùng.</p>
                    <p class="name">Linh Phạm</p>
                    <span class="position">Sinh viên</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Theo dõi để nhận các tin mới nhất</h2>
              <p>Số lượng nhà tuyển dụng cũng như ứng viên tham gia trang này rất lớn.Lượng truy cập hàng ngày lên tới con số hàng trăm nghìn, thậm chí hàng triệu.</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="{{route('trangchu')}}" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Nhập địa chỉ Email">
                      <input type="submit" value="Theo dõi" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
@endsection