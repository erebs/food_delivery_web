@extends('layouts.Grocery')
@section('title')
 Shops
  @endsection
  @section('head1') Edit Profile @endsection
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
                                <h4 class="card-title">Edit Shop</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row">
                                            <div class="col-xl-6">

                                               <!--  <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Type
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        
                                                        <select class="form-control" id="type" readonly>
                                                            <option value="Restaurant" @if($shop->shop_type=='Restaurant') selected @endif>Restaurant</option>
                                                            <option value="Grocery Store"  @if($shop->shop_type=='Grocery Store') selected @endif>Grocery Store</option>
                                                            <option value="Both"  @if($shop->shop_type=='Both') selected @endif>Both</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div> -->

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Shop Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter Shop Name" id="shname" value="{{$shop->shop_name}}">
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Proprietor
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter proprietor name" id="name" value="{{$shop->proprietor}}">
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Mobile
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder="Enter mobile number" id="mobile" value="{{$shop->mobile}}" readonly>
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="email" class="form-control" placeholder="Enter Mail id" id="mail" value="{{$shop->mail_id}}">
                                                        
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Location
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter Location" id="location" value="{{$shop->location}}">
                                                        
                                                    </div>
                                                </div>
                                               
                                               

                                                

                                                
                                            </div>

                                            <div class="col-xl-6">

                                                 <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Address <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control"  rows="5" placeholder="Enter Address" id="det">{{$shop->address}}</textarea>
                                                        
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Pincode
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder="Enter Pincode" id="pincode" value="{{$shop->pincode}}">
                                                        
                                                    </div>
                                                </div>

                                              

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Logo <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                       <input type="file" id="pdf_file1" onchange="Chkformat1()" style="color: black;padding: 1em;background: #ececec;">
                                                        
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


    var shname=$('input#shname').val();
    if(shname=='')
    {
        $('#shname').focus();
        $('#shname').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#shname').css({'border':'1px solid #CCC'});


    var name=$('input#name').val();
    if(name=='')
    {
        $('#name').focus();
        $('#name').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#name').css({'border':'1px solid #CCC'});


    var mail=$('input#mail').val();
    if(mail=='')
    {
        $('#mail').focus();
        $('#mail').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#mail').css({'border':'1px solid #CCC'});

    var location=$('input#location').val();
    if(location=='')
    {
        $('#location').focus();
        $('#location').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#location').css({'border':'1px solid #CCC'});



    var det=$('#det').val();
    if(det=='')
    {
        $('#det').focus();
        $('#det').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#det').css({'border':'1px solid #CCC'});

    var pincode=$('input#pincode').val();
    if(pincode=='')
    {
        $('#pincode').focus();
        $('#pincode').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#pincode').css({'border':'1px solid #CCC'});



      $('#ab1').hide();
      $('#ab2').show();
    
          data = new FormData();

   data.append('shname', shname);       
   data.append('name', name);
   data.append('mobile', mobile);
   data.append('mail', mail);
   data.append('location', location);
   data.append('det', det);
   data.append('pincode', pincode);
   data.append('img1', $('#pdf_file1')[0].files[0]);
   data.append('shopid', '{{$shop->id}}'); 

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/merchant/profile-update",
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
              text: "Profile updated successfully",
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


  function Chkformat1()
{
                  var name = document.getElementById("pdf_file1").files[0].name;
  //alert(name)
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  //if(jQuery.inArray(ext, ['gif','png','jpg','jpeg','pdf']) == -1)
  if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1)

  {

               Toastify({
              text: "Invalid file format ! Upload JPEG/PNG file",
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

   $('input#pdf_file1').val("");
   return false;
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("pdf_file1").files[0]);
  var f = document.getElementById("pdf_file1").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 300000)
  {

                  Toastify({
              text: "Maximum file size is 300kb",
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
   $('input#pdf_file1').val("");
   return false;
  }

  
  }


  function PasswordChange()
{


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

      $('#ab3').hide();
      $('#ab4').show();
    
          data = new FormData();



   data.append('sid', '{{$shop->id}}');
   data.append('pass', pass);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/franchise/shop-psw-update",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
  if(data['success'])
  {
    $('#ab4').hide();
    $('#ab3').show();
            Toastify({
              text: "Password changed successfully",
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


}




})



}





</script>


@endsection