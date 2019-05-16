<style type="text/css">
  .input{
    width:250px;
  }
  table{
    margin-left: 300px;
  }
  tr{
    margin-top: 20px;
  }
  input[type="submit"]{
    margin-left: 300px;
    margin-top: 20px;
    width: 50px
  }
  .alert.alert-success{
    margin-left: 300px;
    margin-bottom: 20px;
    font-size: 20px;
  }
  input[type="button"]{
    margin-left: 250px;
  }
</style>
<div>
<div style="float: left, margin-right: 100px"><a href="{{route('trangchu')}}">Trang chủ</a></div>
<div style="text-align:center"><h1>Your Information</h1></div>
</div>
<div>
    <p style="margin-left: 250px">
      <label>
        <input type="radio" name="rdoInfor" value="infor" id="rdoInfor_0" checked="checked" />
        Information</label>
      <label>
        <input type="radio" name="rdoInfor" value="account" id="rdoInfor_1" />
        Account</label>
      <br />
    </p>
    <hr>
</div>
<form id="form1" name="form1" method="post" action="{{route('updateInfor')}}">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  @if(Session::has('mail_danger'))
          <script type="text/javascript">
            alert("{{Session::get('mail_danger')}}");
          </script>
        @endif 
  @if(Session::has('update_success'))
          <script type="text/javascript">
            alert("{{Session::get('update_success')}}");
          </script>
        @endif         
  <div id='div_1'>
    <table width="auto">
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" id="name" class="input" value="{{$result->name}}" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><p>
        <label>
          <input type="radio" name="rdoGender" value="male" id="rdoGender_0" @<?php if ($result->gender=="male"): ?>
            checked="checked"
          <?php endif ?> />
          Male</label>
        <br />
        <label>
          <input type="radio" name="rdoGender" value="female" id="rdoGender_1"@<?php if ($result->gender=="female"): ?>
            checked="checked"
          <?php endif ?> />
          Female</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td>DOB</td>
      <td><input type="date" name="DOB" id="DOB" value="{{$result->DOB}}" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="address" id="address" class="input" value="{{$result->address}}" /></td>
    </tr>
    <tr>
      <td>Phone number</td>
      <td><input type="number" name="phoneNumber" id="phoneNumber"class="input" value="{{$result->phone}}" /></td>
    </tr>
    <tr>
      <td>Mail</td>
      <td><input type="email" name="mail" id="mail" class="input" value="{{$result->mail}}" /></td>
    </tr>
    @if(Session('type')==1)
      <tr>
      <td>Website</td>
      <td><input type="text" name="website" id="website" class="input" value="{{$result->website}}" /></td>
      </tr>
      <tr>
        <td>Company</td>
        <td><input type="text" name="company" id="company" class="input" value="{{$result->company}}" /></td>
      </tr>
    @elseif(Session('type')==2)
      <tr>
      <td>Experience</td>
      <td><textarea name="experience" id="Experience" class="input"/>{{$result->experience}}</textarea></td>
      </tr>
      <tr>
        <td>Skill</td>
        <td><textarea name="skill" id="skill" class="input" value="{{$result->skill}}" />{{$result->skill}}</textarea> </td>
      </tr>
    @endif
    <tr>
      <td>Money</td>
      <td><input type="text" name="money" id="money" readonly="readonly"class="input" value="{{$result->money}}" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Save" id="save" value="Save" /></td>
    </tr>
  </table>
  </div>
</form>
<form id="form2" name="form2" method="post" action="{{route('updatePass')}}">
   <input type="hidden" name="_token" value="{{csrf_token()}}">
   @if($errors->any())
            @foreach($errors->all() as $err)
              <script type="text/javascript">
              alert("{{$err}}")
            </script>
            @endforeach
        @endif
    @if(Session::has('update_success1'))
          <script type="text/javascript">
            alert("{{Session::get('update_success1')}}");
          </script>
        @endif   
    <!-- @if(Session::has('passWrong'))
          <script type="text/javascript">
            alert("{{Session::get('passWrong')}}");
          </script>
        @endif    -->    
  <div id ="div_2">
    <table width="auto" >
    <tr>
      <td>Username</td>
      <td><input type="text" name="username" id="username" readonly="readonly" value="{{$result->username}}" /></td>
    </tr>
    <tr>
      <td><div id='div_pass'>Password</div></td>
      <td><input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td><div id='div_rePass'>Re-password</div></td>
      <td><input type="password" name="rePass" id="rePass"/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="button" name="update" id="update" value="Update" />
      <input type="submit" name="save" id='save2' value="Save" style="margin-left: 10px" /></td>
    </tr>
  </table>
  </div>
</form>
<script type="text/javascript">
  var x = document.getElementsByName('rdoInfor');
  if(x[0].checked==true){
        document.getElementById('div_2').style.display='none';
        document.getElementById('div_1').style.display='block';
        } else {
          document.getElementById('div_1').style.display='none';
          document.getElementById('div_2').style.display='block';
        }
    for(var i=0;i<2;i++){
      x[i].onchange=function(e){
        if(x[0].checked==true){
        document.getElementById('div_2').style.display='none';
        document.getElementById('div_1').style.display='block';
        } else {
          document.getElementById('div_1').style.display='none';
          document.getElementById('div_2').style.display='block';
        }
      };
    }
    document.getElementById('rePass').style.display = 'none';
    document.getElementById('password').style.display='none';
    document.getElementById('save2').disabled = true;
    document.getElementById('div_rePass').style.display = 'none';
    document.getElementById('div_pass').style.display = 'none';

</script>
<script type="text/javascript">
  document.getElementById('update').onclick=function(e){
      if(prompt("Enter your password", "")=='{{$result->password}}'){
      document.getElementById('rePass').style.display = 'block';
      document.getElementById('password').style.display='block';
      document.getElementById('save2').disabled = false;
      document.getElementById('div_rePass').style.display = 'block';
      document.getElementById('div_pass').style.display = 'block';
      document.getElementById('update').disabled=true;
    } else alert("Wrong password !");
      }
</script>;

