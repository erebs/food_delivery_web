@extends('layouts.Admin')
@section('title')
 change-password
  @endsection
  @section('head1') Change Password @endsection
@section('contents')

<style>
/* Style all input fields */



/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 0.8rem;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <!-- row -->
                <div class="row">
                    
					
					<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Old Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" placeholder="Old Password" id="oldpass">
                                                 <input type="checkbox" onclick="myFunction()">   <span style="font-size: 12px;">Show password</span>
                                            </div>
                                           
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">New Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" placeholder="New Password" id="newpass">
                                                <input type="checkbox" onclick="myFunction1()">   <span style="font-size: 12px;">Show password</span><br>
                                                          <div id="message">
										  <h3 style="font-size:1rem;">Password must contain the following: <span style="float: right;cursor: pointer;" onclick="Close()"> <i class="fa fa-times" aria-hidden="true"></i>  Close</span></h3>
										  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
										  <p id="capital" class="invalid">A <b>uppercase</b> letter</p>
										  <p id="number" class="invalid">A <b>number</b></p>
										  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
										</div>
                                            </div>
                                            


										        
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" placeholder="Confirm Password" id="confirmpass">
                                                <input type="checkbox" onclick="myFunction2()">   <span style="font-size: 12px;">Show password</span>
                                            </div>

                                        </div>
                                        <div class="form-group" id="error"></div>
                                        <div class="mb-12 row">
                                            <div class="col-sm-10">
                                                <button type="button" class="btn btn-primary" onclick="Save()" id="submitButton">Submit</button>
                  <button type="button" class="btn btn-primary" id="submitButton1"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
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
        <!--**********************************
            Content body end
        ***********************************-->
<script type="text/javascript">

        function myFunction()
   {
    document.getElementById("message").style.display = "none";
   }

  function myFunction() {
  var x = document.getElementById("oldpass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction1() {
  var x = document.getElementById("newpass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  document.getElementById("message").style.display = "none";

  }
}
function myFunction2() {
  var x = document.getElementById("confirmpass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

var myInput = document.getElementById("newpass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}
  // When the user starts to type something inside the password field
myInput.onkeyup = function() {

var errcnt=0;

  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
     $('#submitButton').prop('disabled', true);
     var errcnt=errcnt+1;
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
    $('#submitButton').prop('disabled', true);
     var errcnt=errcnt+1;
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
    $('#submitButton').prop('disabled', true);
     var errcnt=errcnt+1;
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
    $('#submitButton').prop('disabled', true);
     var errcnt=errcnt+1;
  }

      if(errcnt==0)
      {
         $('#submitButton').prop('disabled', false);
          document.getElementById("message").style.display = "none";
           $('#newpass').css('border','1px solid #CCC');
      }
      else
      {
         $('#submitButton').prop('disabled', true);
           document.getElementById("message").style.display = "block";
            $('#newpass').css('border','1px solid red');
      }


    }


    
      
    function Save()
    {
    
    $('#error').hide();
      var oldpass=$('input#oldpass').val();
    
      if(oldpass=='')
      {
        $('#oldpass').css('border','1px solid red');
        
        return false;
      }
      else
        $('#oldpass').css('border','1px solid #CCC');
    
      var newpass=$('input#newpass').val();
    
      if(newpass=='')
      {
        $('#newpass').css('border','1px solid red');
        
        return false;
      }
      else
        $('#newpass').css('border','1px solid #CCC');
    
      var confirmpass=$('input#confirmpass').val();
    
      if(confirmpass=='')
      {
        $('#confirmpass').css('border','1px solid red');
        
        return false;
      }
      else if(confirmpass!=newpass)
      {
        $('#confirmpass').css('border','1px solid red');

        Toastify({
						  text: "Passwords are not matching",
						  duration: 3000,
						  newWindow: true,
						  // close: true,
						  gravity: "bottom", // `top` or `bottom`
						  position: "center", // `left`, `center` or `right`
						  stopOnFocus: true, // Prevents dismissing of toast on hover
						  style: {
						    background: "linear-gradient(to right, red, red)",
						  },
						  callback: function () {
						  },
						}).showToast();
    
        // $('#error').show();
        // $('#error').text("Passwords are not matching !!!");
        // $('#error').css({'color':'red'});
        
        return false;
      }
      else
        $('#confirmpass').css('border','1px solid #CCC');
      $('#submitButton').hide();
      $('#submitButton1').show();
    
    
      $.ajax({
    
        type:"POST",
        url:"/administrator/password-update",
         data: {
            _token: @json(csrf_token()),
            oldpass: oldpass,
            newpass:newpass
            },
        dataType:"json",
       
        success:function(data)
        {
          if(data['success'])
          {
              $('#submitButton1').hide();
      		  $('#submitButton').show();
      		  Toastify({
						  text: "Password changed successfully",
						  duration: 2000,
						  newWindow: true,
						  // close: true,
						  gravity: "bottom", // `top` or `bottom`
						  position: "center", // `left`, `center` or `right`
						  stopOnFocus: true, // Prevents dismissing of toast on hover
						  style: {
						    background: "linear-gradient(to right, #12a00f, #12a00f)",
						  },
						  callback: function () {
						   // alert("sss");
						    window.location.href=window.location.href
						  },
						}).showToast();
             
          }
          else if(data['err'])
          {
            $('#submitButton1').hide();
            $('#submitButton').show();
            Toastify({
						  text: "Incorrect old password",
						  duration: 3000,
						  newWindow: true,
						  // close: true,
						  gravity: "bottom", // `top` or `bottom`
						  position: "center", // `left`, `center` or `right`
						  stopOnFocus: true, // Prevents dismissing of toast on hover
						  style: {
						    background: "linear-gradient(to right, red, red)",
						  },
						  callback: function () {
						  },
						}).showToast();
           
          }
    
        }
    
    
    
    
      })
    
    
    
    
    
    
    }
    
    
    
    
      
     </script>  

@endsection