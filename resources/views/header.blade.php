<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">CN_Web_G23</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          @if(Session::has('user'))
	          	<li class="nav-item cta mr-md-2"><a class="nav-link" href="{{route('infor'
	          		)}}">{{Session('user')}}</a></li>
	          	<li class="nav-item cta cta-colored"><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
	          @else 
	          	<li class="nav-item cta mr-md-2"><a class="nav-link" onclick='login()'>Log in</a></li>
	          	<li class="nav-item cta cta-colored"><a class="nav-link" onclick="register()">Register</a></li>
	          @endif
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <script type="text/javascript">
    	function login(){
    		window.open("http://localhost/CN_Web/public/view_login", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=200,left=400,width=400, height=300");
    	};
    	function register(){
    		window.open("http://localhost/CN_Web/public/register", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=200,left=400,width=400, height=400");
    	};
    </script>