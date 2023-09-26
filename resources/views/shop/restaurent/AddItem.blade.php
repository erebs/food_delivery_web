@extends('layouts.Shop')
@section('title')
 Item
  @endsection
  @section('head1') Add Food Item @endsection
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
                           <!--  <div class="card-header">
                                <h4 class="card-title">Add Food Item</h4>
                            </div> -->
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row">
                                            <div class="col-xl-6">

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Category
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        
                                                        <select class="form-control" id="cat">

                                                            <option value="">Choose</option>
                                                            @foreach($cat as $c)
                                                            <option value="{{$c->id}}">{{$c->category}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Item
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter Item" id="item">
                                                        
                                                    </div>
                                                </div>

                                                 <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Type
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        
                                                        <select class="form-control" id="type">

                                                            <option value="">Choose</option>
                                                          <option value="Veg">Veg</optio>                                                       
                                                            <option value="Non-Veg">Non-Veg</option>
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Best Seller
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        
                                                        <select class="form-control" id="rec">

                                                            <option value="">Choose</option>
                                                          <option value="Yes">Yes</optio>                                                       
                                                            <option value="No">No</option>
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Is New Arrival
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        
                                                        <select class="form-control" id="newar">

                                                            <option value="">Choose</option>
                                                          <option value="Yes">Yes</optio>                                                       
                                                            <option value="No">No</option>
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                                

                                                   
                                                
                                            </div>

                                            <div class="col-xl-6">

                                                 <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Photo <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                       <input type="file" id="pdf_file" onchange="Chkformat()" style="color: black;padding: 1em;background: #ececec;">
                                                        
                                                    </div>
                                                </div>

                                                  <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Is Customize
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        
                                                        <select class="form-control" id="cust" onchange="Variants(this.value)">

                                                            <!-- <option value="">Choose</option> -->
                                                          <option value="Yes">Yes</optio>                                                       
                                                            <option value="No" selected>No</option>
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="mb-3 row" id="sec2">
                                                    <label class="col-lg-4 col-form-label">Price
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder="Enter Price" id="price">
                                                        
                                                    </div>
                                                </div>

                                                <div id="sec1">

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Default Variant
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter Default Variant" id="v1">
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Price
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder="Enter Price" id="p1">
                                                        
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Variant 2
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter Variant 2" id="v2">
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Price
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder="Enter Price" id="p2">
                                                        
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Variant 3
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Enter Variant 3" id="v3">
                                                        
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Price
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder="Enter Price" id="p3">
                                                        
                                                    </div>
                                                </div>

                                                </div>
                                                

                                               
                                               
                                                
                                            </div>




                                            <div class="mb-12 row">
                                                    <label class="col-lg-2 col-form-label" for="validationCustom04">Description <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <textarea class="form-control ckeditor"  rows="5" placeholder="Enter Details" id="det"></textarea>
                                                        
                                                    </div>
                                                </div>
<center>
<div class="col-xl-6" style="float:right;">
                                                <br><br><div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                            <button type="button" class="btn btn-primary" onclick="Save()" id="ab1">Submit</button>
                  <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
                                                    </div>
                                                </div>

</div>
</center>

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

  function Variants(val)
{
    if(val=='Yes')
    {
        $('#sec1').show();
        $('#sec2').hide();
    }
    else
    {
        $('#sec1').hide();
        $('#sec2').show();
        // $('#oprice').val("0");
    }
}


 function Save()
{
   

    var cat=$('#cat option:selected').val();
    if(cat=='')
    {
        $('#cat').focus();
        $('#cat').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#cat').css({'border':'1px solid #CCC'});


    var item=$('input#item').val();
    if(item=='')
    {
        $('#item').focus();
        $('#item').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#item').css({'border':'1px solid #CCC'});

    var type=$('#type option:selected').val();
    if(type=='')
    {
        $('#type').focus();
        $('#type').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#type').css({'border':'1px solid #CCC'});

    var rec=$('#rec option:selected').val();
    if(rec=='')
    {
        $('#rec').focus();
        $('#rec').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#rec').css({'border':'1px solid #CCC'});

    var newar=$('#newar option:selected').val();
    if(newar=='')
    {
        $('#newar').focus();
        $('#newar').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#newar').css({'border':'1px solid #CCC'});

    var cust=$('#cust option:selected').val();

    if(cust=='Yes')
    {
            var v1=$('input#v1').val();
            if(v1=='')
            {
                $('#v1').focus();
                $('#v1').css({'border':'1px solid red'});
                return false;
            }
            else
          
            $('#v1').css({'border':'1px solid #CCC'});

            var p1=$('input#p1').val();
            if(p1=='')
            {
                $('#p1').focus();
                $('#p1').css({'border':'1px solid red'});
                return false;
            }
            else
          
            $('#p1').css({'border':'1px solid #CCC'});

         var price='';
        
    }

        if(cust=='No')
    {
            var price=$('input#price').val();
            if(price=='')
            {
                $('#price').focus();
                $('#price').css({'border':'1px solid red'});
                return false;
            }
            else
          
            $('#price').css({'border':'1px solid #CCC'});
        var v1='';
        var p1='';

        
    }

 var det=CKEDITOR.instances.det.getData();
 var v2=$('input#v2').val();
 var v3=$('input#v3').val();
 var p2=$('input#p2').val();
 var p3=$('input#p3').val();
    

      $('#ab1').hide();
      $('#ab2').show();
    
          data = new FormData();


   data.append('cat', cat);
   data.append('item', item);
   data.append('type', type);
   data.append('rec', rec);
   data.append('newar', newar);
   data.append('cust', cust);
   data.append('price', price);
   data.append('v1', v1);
   data.append('v2', v2);
   data.append('v3', v3);
   data.append('p1', p1);
   data.append('p2', p2);
   data.append('p3', p3);

   data.append('det', det);
   data.append('img', $('#pdf_file')[0].files[0]);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/merchant/item-add",
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
              text: "Item added successfully",
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
              text: "Item already exists",
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