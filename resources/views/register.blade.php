<form action="{{route('post')}}" method="post">
	     <input type="hidden" name="_token" value="{{csrf_token()}}">  
	    <div>
	      <h1 style="text-align:center">Register</h1>
	    </div>

	    <div class="container">
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
	    		<div class = "alert alert-success">
	    			{{Session::get('thongbao')}}
	    		</div>
	    	@endif
	    	  <table width="auto" style="margin-left: 20px">
			    <tr>
			      <td width="40%">Name*</td>
			      <td width="60%"><label for="name"></label>
			      <input type="text" name="name" id="name"></td>
			    </tr>
			    <tr>
			      <td>Gender</td>
			      <td><p>
			        <label>
			          <input type="radio" name="rdoGender" value="male" id="rdoGender_0" checked="checked">
			          Male</label>
			        <br>
			        <label>
			          <input type="radio" name="rdoGender" value="female" id="rdoGender_1">
			          Female</label>
			        <br>
			      </p></td>
			    </tr>
			    <tr>
			      <td>DOB</td>
			      <td><label for="DOB"></label>
			      <input type="date" name="DOB" id="DOB"></td>
			    </tr>
			    <tr>
			      <td>Address</td>
			      <td><input type="text" name="address" id="address"></td>
			    </tr>
			    <tr>
			      <td>Mail*</td>
			      <td><input type="email" name="mail" id="mail"></td>
			    </tr>
			    <tr>
			      <td>Phone number</td>
			      <td><input type="text" name="phoneNumber" id="phoneNumber"></td>
			    </tr>
			    <tr>
			      <td><div class="company">Website</div></td>
			      <td><input type="text" name="website" id="website" class="company"></td>
			    </tr>
			    <tr>
			      <td><div class="company">Company</div></td>
			      <td><input type="text" name="company" id="company"  class="company"></td>
			    </tr>
			    <tr>
			      <td>Username*</td>
			      <td><input type="text" name="username" id="username"></td>
			    </tr>
			    <tr>
			      <td>Password*</td>
			      <td><input type="password" name="password" id="password"></td>
			    </tr>
			    <tr>
			      <td>Re-password*</td>
			      <td><input type="password" name="rePass" id="rePassword"></td>
			    </tr>
			    <tr>
			      <td colspan="2"><p>
			        <label>
			          <input type="radio" name="rdoType" value="2" checked="checked">
			          Employee</label>
			        <label>
			          <input type="radio" name="rdoType" value="1">
			          Company</label>
			        <br>
			      </p></td>
			    </tr>
			  </table>
	      <button type="submit" style="margin-left: 200px;margin-top: 20px">Register</button>
	    </div>	    
	  </form>
<script type="text/javascript">
	var x=document.getElementsByName('rdoType');
	var y=document.getElementsByClassName('company');
	if(x[0].checked==true){
		for(var i=0;i<4;i++){
			y[i].style.display='none';
		}
	} else {
		for(var i=0;i<4;i++){
			y[i].style.display='block';
		}
	}
	for(var i=0;i<2;i++){
      x[i].onchange=function(e){
        if(x[0].checked==true){
        for(var i=0;i<4;i++){
			y[i].style.display='none';
		}
        } else {
          for(var i=0;i<4;i++){
			y[i].style.display='block';
		}
        }
      };
    }
</script>