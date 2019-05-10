	  <form class="modal-content animate" action="{{route('login')}}" method="post">
	     <input type="hidden" name="_token" value="{{csrf_token()}}">
	     @if($errors->any())
	    		<div class = "alert alert-danger">
	    			<ul>
	    			@foreach($errors->all() as $err)
	    				<li style="color: red">{{$err}}</li>
	    			@endforeach
	    			</ul>
	    		</div>
	    	@endif
	     @if(Session::has('thongbao'))
	    		<div class = "alert alert-success" style="color: red">
	    			{{Session::get('thongbao')}}
	    		</div>
	    	@endif     
	    <div class="imgcontainer">
	      <h1 style="text-align:center" >Log in</h1>
	    </div>

	    <div class="container">
	    	<table width="auto" style="margin-left:40px">
			  <tr>
			    <td width="17%">Username</td>
			    <td width="83%">
			    	<input type="text" placeholder="Enter Username" name="username" id = "username" class="input">
			    </td>
			  </tr>
			  <tr>
			    <td>Password</td>
			    <td>
			    	<input type="password" placeholder="Enter Password" name="password" id="password" class="input">
			    </td>
			  </tr>
			</table>
	      <button type="submit" style="margin-left:200px;margin-top:20px">Login</button>
	    </div>
	    
	  </form>
