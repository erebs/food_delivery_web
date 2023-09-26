@extends('layouts.Grocery')
@section('title')
 Item
  @endsection
  @section('head1') Item Details @endsection
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active" id="first">
                                                <img class="img-fluid" src="{{asset('/uploads/grocery_items/'.$item->image)}}" alt="" style="height: 300px;">
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <!--Tab slider End-->
                                    <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="new-arrival-content pr">
                                                <h4>{{$item->item}}

                                                    <div class="dropdown" style="float:right;">
                                                    <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="/grocery/edit-item/{{encrypt($item->id)}}" target="_blank">Edit Item</a>

                                                            @if($item->is_customize=='Yes')
                                                            <a class="dropdown-item" href="/grocery/add-variant/{{encrypt($item->id)}}">Add Variant</a>
                                                            @else
                                                            <a class="dropdown-item" href="/grocery/edit-price/{{encrypt($item->id)}}" target="_blank">Edit Price</a>
                                                            @endif
                                                            
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="Block('{{$item->id}}')">Block Item</a>
                                                    </div>
                                                </div>
                                                


													</h4>
                                                    <span class="badge badge-success light">{{$item->status}}</span>
													
                                                <div class="comment-review star-rating">
													<ul>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star-half-empty"></i></li>
														<li><i class="fa fa-star-half-empty"></i></li>
													</ul>
													<span class="review-text">(34 reviews) / </span><a class="product-review" href="" data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
												</div>
												<div class="d-table mb-3">
													@if($item->is_offer=='Yes')
													<p class="price float-start d-block">Rs. {{$item->offer_price}} ( {{$item->offer_percentage}} % off )   &nbsp&nbsp&nbsp<span style="text-decoration: line-through;font-size: 15px;float: right;">Rs.{{$item->normal_price}}</span></p>
                                                    
													@else
													<p class="price float-start d-block">       Rs.{{$item->normal_price}}</p>
													@endif
                                                </div>

                                                <p>Type : <span class="item"> {{$item->type}} </span>
                                                </p>
                                                <p>Is Offer : <span class="item">{{$item->is_offer}}</span></p>
                                                <p>Best Seller : <span class="item">{{$item->is_recommendable}}</span> </p>
                                                <p>Is Newarrival : <span class="item">{{$item->is_newarrival}}</span></p>
                                                <p>Is Customizable : <span class="item">{{$item->is_customize}}</span></p>
                                                <!-- <p>Related Items:&nbsp;&nbsp;
                                                    <span class="badge badge-success light">Ticka</span>
                                                    <span class="badge badge-success light">Paneer</span>
                                                    <span class="badge badge-success light">Veg</span>
                                                    <span class="badge badge-success light">Masala</span>
                                                </p> -->
                                                <p class="text-content">{!! $item->desc !!}</p>
												
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
                </div>




                <div class="col-xl-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    @if($item->is_customize=='Yes')
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home8">
                                            <span>
                                                Variants
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#profile8">
                                            <span>
                                                Related Items
                                            </span>
                                        </a>
                                    </li>
                                    @else

                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#profile8">
                                            <span>
                                                Related Items
                                            </span>
                                        </a>
                                    </li>


                                     @endif
                                    
                                    
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                     @if($item->is_customize=='Yes')
                                    <div class="tab-pane fade show active" id="home8" role="tabpanel">
                                        <div class="pt-4">
                                           
                                            <div class="table-responsive">

                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Variant</th>
                                                <th>price</th>
                                                 <th>Is Offer</th>
                                                <th>Offer Percetage</th>
                                                <th>Offer Price</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($variant as $f)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                
                                                <td>{{$f->variant}}</td>
                                                <td>{{$f->normal_price}}</td>
                                                <td>{{$f->is_offer}}</td>
                                                <td>{{$f->offer_percentage}}</td>
                                                <td>{{$f->offer_price}}</td>
                                                <td>{{$f->status}}</td>
                                                <td>

                                                    <div class="dropdown ms-auto text-end">
                                                        <div class="btn-link" data-bs-toggle="dropdown" style="float: left;">
                                                            <svg width="24px" height="24px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                           
                                                            <a class="dropdown-item" href="/grocery/edit-variant/{{encrypt($f->id)}}" target="_blank">Edit Variant</a>
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                           
                                            </tr>
                                           @endforeach 
                                          
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>Id</th>
                                                <th>Variant</th>
                                                <th>price</th>
                                                 <th>Is Offer</th>
                                                <th>Offer Percetage</th>
                                                <th>Offer Price</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="profile8" role="tabpanel">
                                        <div class="pt-2">
                                        <br>    
                                    <div class="row">

                                    <div class="col-xl-3 col-xxl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header  border-0 pb-0">
                                <h4 class="card-title">Related Items</h4>
                            </div>
                            <div class="card-body"> 
                                <div id="dlab_W_Todo1" class="widget-media dlab-scroll height370">
                                    <ul class="timeline" id="itid">

                                        @if(empty($rel) || count($rel) === 0)
                                        <li>No items found</li>
                                        @else

                                        @foreach($rel as $r)
                                        <li>
                                            <div class="timeline-panel">
                                                 <!-- <div class="media me-2"> -->
                                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                                <!-- </div> -->
                                                <div class="media-body">
                                                    <h5 class="mb-1">    &nbsp&nbsp {{$r->GetItem->item}}</h5>
                                                    <!-- <small class="d-block">29 July 2020 - 02:26 PM</small> -->
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" style="cursor:pointer;" onclick="DeleteRel('{{$r->id}}')">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>        

                    <div class="col-xl-4 col-xxl-4 col-lg-6">
                        <div class="card">
                            <div class="card-header  border-0 pb-0">
                                <h4 class="card-title">Add Related Items</h4>
                            </div>
                            <div class="card-body"> 
                                <div id="dlab_W_Todo1" class="widget-media dlab-scroll height370">
                                    <ul class="timeline">
                                       <br><br><br><div class="mb-3 row">
                                                
                            <div class="col-lg-12">
                                                        
                            <select class="form-control" id="cat" onchange="GetItems(this.value)">

                            <option value="">Choose category</optio>   
                            @foreach($cat as $c)                                                    
                            <option value="{{$c->id}}">{{$c->category}}</option>
                            @endforeach
                                                            
                            </select>
                                                        
                            </div>
                             </div>

                            <div class="mb-3 row">
                                                    
                            <div class="col-lg-12">
                                                        
                            <select class="form-control" id="item">

                            <option value="">Choose Item</optio>                                                       
                                                            
                                                            
                            </select>
                                                        
                            </div>
                            </div>

                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                            <button type="button" class="btn btn-primary" onclick="Save()" id="ab1">Submit</button>
                  <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
                                                    </div>
                                                </div>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
</div> 

                    





















                                        </div>
                                    </div>

                                    @else
                                    <div class="tab-pane fade show active" id="profile8" role="tabpanel">
                                               <div class="pt-2">
                                        <br>    
                                    <div class="row">

                                    <div class="col-xl-3 col-xxl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header  border-0 pb-0">
                                <h4 class="card-title">Related Items</h4>
                            </div>
                            <div class="card-body"> 
                                <div id="dlab_W_Todo1" class="widget-media dlab-scroll height370">
                                    <ul class="timeline" id="itid">

                                        @if(empty($rel) || count($rel) === 0)
                                        <li>No items found</li>
                                        @else

                                        @foreach($rel as $r)
                                        <li>
                                            <div class="timeline-panel">
                                                <!-- <div class="media me-2">
                                                    <img alt="image" width="50" src="images/avatar/1.jpg" lazy>
                                                </div> -->
                                                <div class="media-body">
                                                    <h5 class="mb-1">{{$r->GetItem->item}}</h5>
                                                    <!-- <small class="d-block">29 July 2020 - 02:26 PM</small> -->
                                                </div>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                        <svg width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" style="cursor:pointer;" onclick="DeleteRel('{{$r->id}}')">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>        

                    <div class="col-xl-4 col-xxl-4 col-lg-6">
                        <div class="card">
                            <div class="card-header  border-0 pb-0">
                                <h4 class="card-title">Add Related Items</h4>
                            </div>
                            <div class="card-body"> 
                                <div id="dlab_W_Todo1" class="widget-media dlab-scroll height370">
                                    <ul class="timeline">
                                       <br><br><br><div class="mb-3 row">
                                                
                            <div class="col-lg-12">
                                                        
                            <select class="form-control" id="cat" onchange="GetItems(this.value)">

                            <option value="">Choose category</optio>   
                            @foreach($cat as $c)                                                    
                            <option value="{{$c->id}}">{{$c->category}}</option>
                            @endforeach
                                                            
                            </select>
                                                        
                            </div>
                             </div>

                            <div class="mb-3 row">
                                                    
                            <div class="col-lg-12">
                                                        
                            <select class="form-control" id="item">

                            <option value="">Choose Item</optio>                                                       
                                                            
                                                            
                            </select>
                                                        
                            </div>
                            </div>

                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                            <button type="button" class="btn btn-primary" onclick="Save()" id="ab1">Submit</button>
                  <button type="button" class="btn btn-primary" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
                                                    </div>
                                                </div>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
</div> 
                                        </div>
                                    </div>

                                    @endif
                                    
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



    function GetItems(val) {

        $.post("/grocery/get-items", {cat: val,itm: '{{$item->id}}', _token: "{{ csrf_token() }}"}, function(result) {

        $('#item').html(result);
      
    });
  } 

       function DeleteRel(val) {

        $.post("/grocery/delete-itemslist", {itm: val, _token: "{{ csrf_token() }}"}, function(result) {

          GetItemslist();
      
    });
  }

      function GetItemslist() {

        $.post("/grocery/get-itemslist", {itm: '{{$item->id}}', _token: "{{ csrf_token() }}"}, function(result) {

        $('#itid').html(result);
      
    });
  }


  function Save()
    {
      var cat=$('#cat option:selected').val();
    
      if(cat=='')
      {
        $('#cat').css('border','1px solid red');
        
        return false;
      }
      else
      $('#cat').css('border','1px solid #CCC');

  var item=$('#item option:selected').val();
    
      if(item=='')
      {
        $('#item').css('border','1px solid red');
        
        return false;
      }
      else
      $('#item').css('border','1px solid #CCC');



      $('#ab1').hide();
      $('#ab2').show();

      data = new FormData();
      data.append('cat', cat);
      data.append('item', item);
       data.append('itemid', '{{$item->id}}');
      data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/grocery/add-relateditem",
         data: data,
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
              text: "Related item added successfully",
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
                GetItemslist()
              },
            }).showToast();
          }

          else
          {
              $('#ab2').hide();
              $('#ab1').show();
             
            Toastify({
              text: "Already added",
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
               
              },
            }).showToast();
          }


        }
    
    
    
    
      })

    }       
        	

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
        url:"/grocery/block-item",
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
              text: "Item blocked successfully",
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
                window.location.href='/grocery/active-items'
              },
            }).showToast();
          }


        }
    
    
    
    
      })

    }

        </script>


@endsection