@extends('layouts.Shop')
@section('title')
 Items
  @endsection
  @section('head1') Blocked Food Items @endsection
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
                                <h4 class="card-title">Blocked Food Items</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Item</th>
                                                <th>Type</th>
                                                 <th>Best Seller</th>
                                                <th>Is Newarrival</th>
                                                <th>Reason for Block</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($items as $f)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                
                                                <td>{{$f->item}}</td>
                                                <td>{{$f->type}}</td>
                                                <td>{{$f->is_recommendable}}</td>
                                                <td>{{$f->is_newarrival}}</td>
                                                <td>{{$f->block_reason}}</td>
                                                <td>

													<div class="dropdown ms-auto text-end">
														<div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
															<svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
														</div>
														<div class="dropdown-menu dropdown-menu-end">
															<a class="dropdown-item" href="/merchant/view-item/{{encrypt($f->id)}}">View Item</a>
															<a class="dropdown-item" href="/merchant/edit-item/{{encrypt($f->id)}}">Edit Item</a>
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
                                                <th>Item</th>
                                                <th>Type</th>
                                                 <th>Is Recommendable</th>
                                                <th>Is Newarrival</th>
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
  title: "Do you want to activate this item ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/merchant/activate-item',
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
                              title: "Item activated successfully.",
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