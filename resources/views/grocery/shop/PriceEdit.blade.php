@extends('layouts.Grocery')
@section('title')
 Item
  @endsection
  @section('head1') Edit Price Details @endsection
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
                                <h4 class="card-title">{{$item->item}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row">

                                            <div class="col-xl-6">

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Price
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder="Enter Price" id="price" value="{{$item->normal_price}}" onkeyup="Price()">
                                                        
                                                    </div>
                                                </div>
                                               
                                                 <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Is Offer
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        
                                                        <select class="form-control" id="isoffer">

                                                          <option value="Yes" @if($item->is_offer=='Yes') selected @endif>Yes</optio>                                                       
                                                            <option value="No" @if($item->is_offer=='No') selected @endif>No</option>
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                               

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Offer Percentage (%)
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="percent" value="{{$item->offer_percentage}}" onkeyup="Price()">
                                                        
                                                    </div>

                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label">Offer Price
                                                        <span class="text-danger"></span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" id="oprice" value="{{$item->offer_price}}">
                                                        
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

 function Price()
{
    var percent=$('input#percent').val();
    var price=$('input#price').val();

    var oprice=(percent / 100) * price;

    var pr=price-oprice;

    $('#oprice').val(pr);

}
 
 function Save()
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

    var isoffer=$('#isoffer option:selected').val();
    if(isoffer=='Yes')
    {
            var percent=$('input#percent').val();        
            if(percent=='')
            {
                $('#percent').focus();
                $('#percent').css({'border':'1px solid red'});
                return false;
            }
            else
          
            $('#percent').css({'border':'1px solid #CCC'});
            
            var oprice=$('input#oprice').val();
            if(oprice=='')
            {
                $('#oprice').focus();
                $('#oprice').css({'border':'1px solid red'});
                return false;
            }
            else
          
            $('#oprice').css({'border':'1px solid #CCC'}); 
    }
    else
    {
       var percent='';
       var oprice=''; 
    }
  

      $('#ab1').hide();
      $('#ab2').show();
    
          data = new FormData();

      
   data.append('price', price);
   data.append('isoffer', isoffer);
   data.append('percent', percent);
   data.append('oprice', oprice);
   data.append('pid', '{{$item->id}}');

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/merchant/price-edit",
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
              text: "Price details updated successfully",
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