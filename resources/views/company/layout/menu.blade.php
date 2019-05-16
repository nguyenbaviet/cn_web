  
 
   <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Tuyển dụng
                                    </span></a>
                                <ul class="collapse">\
                                    @if(Session::has('user'))
                                    <li><a href="company/jobPost/postJob/{{Session('user')}}">Đăng tin tuyển dụng mới</a></li>
                                    <li><a href="company/jobPost/allJob/{{Session('user')}}">Tất cả tin tuyển dụng</a></li>
                                    @endif
                                </ul>
                            </li>
                                   
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Thông tin công ty</span></a>
                                <ul class="collapse">
                                    
                                    <li><a href="{{ route('infor') }}">Cập nhật thông tin và mật khẩu</a></li>
                                    
                                </ul>
                            </li>
                         


                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Ứng viên </span></a>
                                <ul class="collapse">
                                    @if(Session::has('user'))
    
                                    <li><a href="company/applyJob/allApplyJob/{{Session('user')}}">Ứng viên ứng tuyển</a></li>
                                    @endif
                                </ul>
                            </li>

                                <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Hộp thư</span></a>
                                <ul class="collapse">
                                    @if(Session::has('user'))
                                    <li><a href="company/ibox/hopThuDen/{{Session('user')}}">Hộp thư đến</a></li>
                                    <li><a href="company/ibox/hopThuDi/{{Session('user')}}">Hộp thư đi</a></li>
                                    @endif
                                </ul>
                            </li>
                            
                         
                        
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

