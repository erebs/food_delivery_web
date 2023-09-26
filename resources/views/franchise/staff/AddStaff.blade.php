@extends('layouts.Franchise')
@section('title')
 Staff
  @endsection
  @section('head1') Add Delivery Staff @endsection
@section('contents')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Delivery Staff</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
														<input type="text" class="form-control" placeholder="Enter name" id="name">
														
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Mobile
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
														<input type="number" class="form-control" placeholder="Enter mobile number" id="mobile">
														
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="email" class="form-control" placeholder="Enter Mail id" id="mail">
														
                                                    </div>
                                                </div>
                                               
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Address <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control"  rows="5" placeholder="Enter Details" id="det"></textarea>
														
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Driving License <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                       <input type="file" id="pdf_file" onchange="Chkformat()" style="color: black;padding: 1em;background: #ececec;">
                                                        
                                                    </div>
                                                </div>

                                                
                                            </div>

                                            <div class="col-xl-6">

                                               
                                                
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" placeholder="Enter Password" id="pass">
														
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom07">Confirm Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" placeholder="Confirm Password" id="cpass">
														
                                                    </div>
                                                </div>
                                                
                                               
                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                            <button type="button" class="btn btn-primary" onclick="Save()" id="ab1">Submit</button>
                  <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
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
        <!--**********************************
            Content body end
        ***********************************-->

        <script type="text/javascript">

 
 function Save()
{
    var name=$('input#name').val();
    if(name=='')
    {
        $('#name').focus();
        $('#name').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#name').css({'border':'1px solid #CCC'});

    var mobile=$('input#mobile').val();
    if(mobile=='')
    {
        $('#mobile').focus();
        $('#mobile').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#mobile').css({'border':'1px solid #CCC'});

    var mail=$('input#mail').val();
    if(mail=='')
    {
        $('#mail').focus();
        $('#mail').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#mail').css({'border':'1px solid #CCC'});

    var det=$('#det').val();
    if(det=='')
    {
        $('#det').focus();
        $('#det').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#det').css({'border':'1px solid #CCC'});

    var ls=$('input#pdf_file').val();
    if(ls=='')
    {
            Toastify({
              text: "Please upload driving license",
              duration: 2000,
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
        return false;
    }
  


    var pass=$('input#pass').val();
    if(pass=='')
    {
        $('#pass').focus();
        $('#pass').css({'border':'1px solid red'});
        return false;
    }
  
    $('#pass').css({'border':'1px solid #CCC'});

    var cpass=$('input#cpass').val();
    if(cpass=='')
    {
        $('#cpass').focus();
        $('#cpass').css({'border':'1px solid red'});
        return false;
    }
    else if(cpass!=pass)
      {
        $('#cpass').css('border','1px solid red');

        Toastify({
						  text: "Passwords are not matching",
						  duration: 2000,
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

        return false;
      }
    else
  
    $('#cpass').css({'border':'1px solid #CCC'});


 

      $('#ab1').hide();
      $('#ab2').show();
    
          data = new FormData();


   data.append('name', name);
   data.append('mobile', mobile);
   data.append('mail', mail);
   data.append('det', det);
   data.append('img', $('#pdf_file')[0].files[0]);
   data.append('pass', pass);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/franchise/staff-add",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
  if(data['success'])
  {
    $('#ab2').hide();
    $('#ab1').show();
            Toastify({
              text: "Delivery staff added successfully",
              duration: 1000,
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
  else
  {
        $('#ab2').hide();
        $('#ab1').show();
                   Toastify({
              text: "Mobile number already exists",
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



function Chkformat()
{
                  var name = document.getElementById("pdf_file").files[0].name;
  //alert(name)
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  //if(jQuery.inArray(ext, ['gif','png','jpg','jpeg','pdf']) == -1)
  if(jQuery.inArray(ext, ['pdf','png','jpg','jpeg']) == -1)

  {

               Toastify({
              text: "Invalid file format ! Upload PDF/JPEG/PNG file",
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

   $('input#pdf_file').val("");
   return false;
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("pdf_file").files[0]);
  var f = document.getElementById("pdf_file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 600000)
  {

                  Toastify({
              text: "Maximum file size is 600kb",
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
   $('input#pdf_file').val("");
   return false;
  }

  
  }




</script>


@endsection