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
                                    <option value="novalue">Loại công việc</option>
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
                                  <option value="novalue">Địa điểm</option>
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
          </div>
        </div>
      </div>
    </div>

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

        </div>
     </div>
    </section>

		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Thông tin tuyển dụng</span>
            <h2 class="mb-4"><span>Các công việc</span> gần đây</h2>
          </div>
        </div>
				<div class="row">
					@foreach($alljobs as $job)
          <div class="col-md-12 ftco-animate">

            <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

              <div class="mb-4 mb-md-0 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
                  <h2 class="mr-3 text-black h3">{{$job->title}}</h2>
                  <div class="badge-wrap">
                   <span class="bg-primary text-white badge py-2 px-3">${{$job->salary}}</span>
                  </div>
                </div>
                <div class="job-post-item-body d-block d-md-flex">
                  <div class="mr-3"><span class="icon-layers"></span>Deadline: {{$job->deadline}}</div>
                   <?php $type= DB::table('category')->where('Id',$job->idCategory)->get(); ?>
                  @foreach($type as $type)
                  <div class="mr-3"><span class="icon-my_location"></span> <span>Type: {{$type->Name}}</span></div>
                  <div class="mr-3"><span class="icon-layers">Location:{{$job->location}}</span></div>

                  @endforeach                 
                </div>


            </div>

              <div class="ml-auto d-flex">
                
                <a href="{{route('chitietviec',$job->Id)}}" class="btn btn-primary py-2 mr-1">Chi tiết</a>

                
<!--                 <a href="#" class="btn btn-secondary rounded-circle btn-favorite d-flex align-items-center icon">
                	<span class="icon-heart"></span>
                </a> -->
              </div>
            </div>
          </div><!-- end -->
          @endforeach
				</div>
				<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              {{$alljobs->links()}}
            </div>
          </div>
        </div>
			</div>
		</section>




@if(Session::has('user'))
@php
          $user= Session('user');
          $type= DB::table('user')->where('username',$user)->first();
          $mailden= DB::table('mail')->where('To_user',$user)->get();
          $maildi= DB::table('mail')->where('From_user',$user)->get();
          if(($type->type)==2){
        @endphp
       <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-4">Hộp thư đến({{$mailden->count()}})</h2>
      </div>
    </div>
    <table>
                                              <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col"><b><font color="red">From</font></b></th>
                                                    <th scope="col"><b><font color="red">Chủ đề</font></b></th>
                                                   
                                                    <th scope="col"><b><font color="red">Nội dung</font></b></th>
                                                    
                                                    <th scope="col"><b><font color="red">Hành động</font></b></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($mailden as $mail1)
                                           <tr>
                                              <td>{{$mail1->From_user}}</td>
                                               <td>{{$mail1->subject}}</td>
                                               <td><b><article>{!!$mail1->mail!!}</article></b></td>
                                               <td><a href="sendmail"><button>Trả lời</button></a></td>
                                            </tr>
                                               @endforeach
                                            
                                            </tbody>
              </table>

          <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-4">Hộp thư đi ({{$maildi->count()}})</h2>
      </div>
    </div>
    <table>
                                              <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col"><b><font color="red">To</font></b></th>
                                                    <th scope="col"><b><font color="red">Chủ đề</font></b></th>
                                                   
                                                    <th scope="col"><b><font color="red">Nội dung</font></b></th>
                                                    
                                            

                                                </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($maildi as $mail1)
                                           <tr>
                                              <td>{{$mail1->To_user}}</td>
                                               <td>{{$mail1->subject}}</td>
                                               <td><b><article>{!!$mail1->mail!!}</article></b></td>
                                               
                                            </tr>
                                               @endforeach
                                            
                                            </tbody>
              </table>
    <?php 
      $apply = DB::table('apply')->where('username',session('user'))->get();

    ?>


    <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-4">Các công việc đã đăng kí </h2>
      </div>
    </div>
    <table>
                                              <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col"><b><font color="red">Công việc</font></b></th>
                                                    <th scope="col"><b><font color="red">Người đăng</font></b></th>
                                                   <th scope="col"><b><font color="red">Username</font></b></th>
                                                    <th scope="col"><b><font color="red">Công ti</font></b></th>
                                                    
                                                    <th scope="col"><b><font color="red">Trạng thái</font></b></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($apply as $row)
                                                <?php $job1=DB::table('job')->where('Id',$row->idJob)->first();
                                                     $user=DB::table('user')->where('username',$job1->idUser)->first(); 
                                                ?>
                                                
                                                 
                                            <tr>
                                              
                                              <td><a href="{{route('chitietviec',$job1->Id)}}"><?php echo($job1->title);?></a></td>
                                               <td>{{$user->name}}</td>
                                               <td>{{$user->username}}</td>

                                               <td>{{$user->company}}</td>
                                               <td><?php if($row->stateapply == NULL) echo('Chưa xử lí'); else echo($row->stateapply); ?></td>
                                            </tr>
                                               @endforeach
                                            
                                            </tbody>
              </table>
      </div>
      </section> 
        @php
          }
        @endphp
      @endif

		
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