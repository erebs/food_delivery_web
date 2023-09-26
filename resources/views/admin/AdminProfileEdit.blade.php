@extends('layouts.Admin')
@section('title')
 profile
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
                    
					
					<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Enter name" id="cname" value="{{$adm->name}}">
                                            </div>
                                           
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Mobile</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Enter mobile number" id="cmobile" value="{{$adm->mobile}}">
                                                
                                            </div>
                                       
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Mail Id</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Enter mail id" id="cmail" value="{{$adm->mail_id}}">
                                            </div>

                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Photo</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="pdf_file" onchange="Chkformat()" style=" background: #ececec;color: black;padding: 1em;">
                                            </div>

                                        </div>
                                       
                                        <div class="mb-12 row">
                                            <div class="col-sm-10">
                                                <button type="button" class="btn btn-primary" onclick="Save()" id="ab1">Submit</button>
                  <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
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
      var error_num=0;
    var cname=$('input#cname').val();
    if(cname=='')
    {
        $('#cname').focus();
        $('#cname').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#cname').css({'border':'1px solid #CCC'});
 

    if(error_num!=0)
    {
        return false;
    }    
    else
    {

      $('#ab1').hide();
      $('#ab2').show();
    
          data = new FormData();


   data.append('cname', cname);
   data.append('cmobile', $('input#cmobile').val());
   data.append('cmail', $('input#cmail').val());
  data.append('img', $('#pdf_file')[0].files[0]);



    //data.append('img', $('#pdf_file')[0].files[0]);
    //data.append('certi', $('#pdf_file1')[0].files[0]);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/administrator/profile-update",
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
                window.location.href='/administrator/dashboard'
              },
            }).showToast();
                            
  }


}




})



}


}




function Chkformat()
{
                  var name = document.getElementById("pdf_file").files[0].name;
  //alert(name)
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  //if(jQuery.inArray(ext, ['gif','png','jpg','jpeg','pdf']) == -1)
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)

  {

               Toastify({
              text: "Invalid file format ! Upload JPG/JPEG/PNG file",
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
   $('input#pdf_file').val("");
   return false;
  }

  
  }




    
      
     </script>  

@endsection