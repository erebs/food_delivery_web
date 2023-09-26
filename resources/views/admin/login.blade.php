<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Dompet : Payment Admin Template">
	<meta property="og:title" content="Dompet : Payment Admin Template">
	<meta property="og:description" content="Dompet : Payment Admin Template">
	<meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Administrator | Login</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('/admin/images/favicon.png')}}">
    <link href="{{asset('/admin/css/style.css')}}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="/administrator"><img src="{{asset('/admin/images/logo1.png')}}" alt="" style="width: 40%;"></a>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form>
                                      
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                        
                                            <div class="input-group">
                                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                                <input type="text" class="form-control" placeholder="Enter username" name="username" id="username">
                                                <div class="invalid-feedback">
                                                    Please Enter a username.
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                           
                                            <div class="input-group transparent-append">
                                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                <input type="password" class="form-control" placeholder="Enter username" name="password" id="password">
                                                <span class="input-group-text show-pass" onclick="Visibility()"> 
                                                    <i class="fa fa-eye-slash"></i>
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                                <div class="invalid-feedback">
                                                    Please Enter a username.
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="remember">
													<label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            
                                        </div>
                                        <center>
                                        <div class="error" style="font-weight: bold;"></div>
                                        <div class="success" style="font-weight: bold;"></div>
                                        </center>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary btn-block" onclick="Login()" id="a1">Sign Me In</button>
                                            <button type="button" class="btn btn-primary btn-block" id="a2" disabled=""> <i class="fa fa-spinner fa-spin"></i>   Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Forgot Password ?</p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('/admin/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('/admin/js/custom.min.js')}}"></script>
    <script src="{{asset('/admin/js/dlabnav-init.js')}}"></script>
	<!-- <script src="{{asset('/admin/js/styleSwitcher.js')}}"></script> -->
</body>
</html>

<script type="text/javascript">
     $('#a2').hide();


     $(document).keypress(function(event){
    
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        Login();    
    }
    
});

function Visibility()
{
  if(document.getElementById("password").type == "text")
  {
    document.getElementById("password").type = "password";
$('#eye').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
  }
  else if(document.getElementById("password").type == "password")
  {
    document.getElementById("password").type = "text";
$('#eye').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
  }

}

     function Login()
{
  $('.error').hide();
  $('.success').hide();
  var username=$('input#username').val();
  if(username=='')
  {
    $('#username').focus();
    $('#username').css({'border':'2px solid red'});
    return false;
  }
  else
   $('#username').css({'border':'1px solid #CCC'});

   var password=$('input#password').val();
  if(password=='')
  {
    $('#password').focus();
    $('#password').css({'border':'2px solid red'});
    return false;
  }
  else
   $('#password').css({'border':'1px solid #CCC'});

   if($("#remember").prop('checked') == true)
   {
      var rememberStatus=1;
    }
    else if($("#remember").prop('checked') == false)
   {
      var rememberStatus=0;
    }
    
     $('#a1').hide();
       $('#a2').show();

   $.ajax({
     type: "POST",
     url: "/admin_login",
     data: {
        "_token": "{{ csrf_token() }}",
        "username": username,
        "password": password,
        "rememberStatus": rememberStatus
        },
     dataType: "json",
     success: function (data) {

      if(data['success'])
        {
          $('.success').show();
          $('.success').html(data['success']);
          $('.success').css({"color":"green"});
          setTimeout(function () {
                     window.location.href='/administrator/dashboard';
                 }, 1000);

            $('#a2').hide();
       $('#a1').show();
             
        }
      else if(data['err'])
        {
          $('.error').show();
          $('.error').html(data['err']);
          $('.error').css({"color":"red"});
           $('#a2').hide();
       $('#a1').show();
        }
       
     }
   });
   
}
</script>