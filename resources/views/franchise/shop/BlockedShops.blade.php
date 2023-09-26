@extends('layouts.Franchise')
@section('title')
 Shops
  @endsection
  @section('head1') Blocked Shops @endsection
@section('contents')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <div class="row">

                    
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Blocked Shops</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Shop Name</th>
                                                <th>Shop Type</th>
                                                <th>Proprietor</th>
                                                <th>Mobile</th>
                                                <th>Reason for Block</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($shop as $f)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$f->shop_name}}</td>
                                                <td>{{$f->shop_type}}</td>
                                                <td>{{$f->proprietor}}</td>
                                                <td>{{$f->mobile}}</td>
                                                <td>{{$f->block_reason}}</td>
                                                <td>

													<div class="dropdown ms-auto text-end">
														<div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
															<svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
															<a class="dropdown-item" href="/franchise/view-staff/{{encrypt($f->id)}}">View Profile</a>
															<a class="dropdown-item" href="/franchise/edit-shop/{{encrypt($f->id)}}">Edit Profile</a>
															<a class="dropdown-item" style="cursor: pointer;" onclick="Activate('{{$f->id}}')">Activate</a>
														</div>
													</div>
												</td>
                                           
                                            </tr>
                                           @endforeach 
                                           
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Shop Name</th>
                                                <th>Shop Type</th>
                                                <th>Proprietor</th>
                                                <th>Mobile</th>
                                                <th>Reason for Block</th>
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


    function Activate(val)
    {
    
  
 swal({
  title: "Do you want to activate this shop ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/franchise/activate-shop',
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
                              title: "Shop activated successfully.",
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