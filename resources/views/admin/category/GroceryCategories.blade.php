@extends('layouts.Admin')
@section('title')
 Categories
  @endsection
  @section('head1') Grocery Categories @endsection
@section('contents')

<!-- *************************************** -->
<div class="modal" id="block" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#d11409;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;">Reason for Block</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('block').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">

<label>Reason</label>
          <textarea class="form-control" id="reason" rows="5" cols="5"></textarea>
          <input type="hidden" id="buid">

      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn" id="ab5" onclick="RejectUser()" style="background-color: #d11409;color: white;">Submit</button>
         <button type="button"  class="btn" id="ab6" disabled="" style="background-color: #d11409;color: white;"> <i class="fa fa-spinner fa-spin"></i>  Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- *************************************** -->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <div class="row">

                    
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Grocery Categories</h4>
                                <a href="/administrator/add-gcategory" class="btn btn-primary d-sm-inline-block d-none">Add New</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Categories</th>
                                                <th>Photo</th>
                                                 <th>Description</th>
                                                <th>Highlight Order</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($cat as $f)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$f->category}}</td>
                                                <td><a href="{{asset('/uploads/grocery_category/'.$f->image)}}" target="_blank"><i class="fa fa-image" style="font-size: 20px;"></i></a></td>
                                                
                                                <td>{{$f->desc}}</td>
                                                <td>{{$f->disp_order}}</td>
                                                 <td>{{$f->status}}<br>@if($f->status=='Blocked') Reason : {{$f->block_reason}} @endif</td>
                                                <td>

													<div class="dropdown ms-auto text-end">
														<div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
															<svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
															<!-- <a class="dropdown-item" href="/merchant/view-staff/{{encrypt($f->id)}}">View Profile</a> -->
															<a class="dropdown-item" href="/administrator/edit-gcategory/{{encrypt($f->id)}}">Edit Category</a>
                                                            @if($f->status=='Active')
															<a class="dropdown-item" style="cursor: pointer;" onclick="Block('{{$f->id}}')">Block</a>
                                                            @else
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="Activate('{{$f->id}}')">Activate</a>
                                                            @endif
														</div>
													</div>
												</td>
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                  <th>Categories</th>
                                                <th>Photo</th>
                                                 <th>Description</th>
                                                <th>Highlight Order</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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

        function Block(val)
    {
    
  var modal1 = document.getElementById("block");
modal1.style.display = "block";
$('#buid').val(val);
} 

function RejectUser()
    {
      var reason=$('#reason').val();
    
      if(reason=='')
      {
        $('#reason').css('border','1px solid red');
        
        return false;
      }
      else
      $('#reason').css('border','1px solid #CCC');

      var buid=$('input#buid').val();

      $('#ab5').hide();
      $('#ab6').show();

      data = new FormData();
      data.append('reason', reason);
       data.append('buid', buid);
      data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/administrator/block-gcategory",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
              $('#ab6').hide();
              $('#ab5').show();
             
            Toastify({
              text: "Category blocked successfully",
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



    function Activate(val)
    {
    
  
 swal({
  title: "Do you want to activate this category ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/administrator/activate-gcategory',
              data: {
        _token: @json(csrf_token()),
        body: body
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "Category activated successfully.",
                             // text: "This member moved and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                             window.location.href=window.location.href;
                                  } 

                            });

                     
                    }
                  
                
            }
       })

 } 
  
});

}

   </script>


@endsection