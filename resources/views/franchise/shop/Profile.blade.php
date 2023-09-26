@extends('layouts.Franchise')
@section('title')
 Shops
  @endsection
  @section('head1') Shop Profile @endsection
@section('contents')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <!-- row -->
                
                <div class="row">
                    <div class="col-xl-4">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-statistics">
											<div class="text-center">
												<div class="row">
													<div class="col">
														<h3 class="m-b-0">150</h3><span>Follower</span>
													</div>
													<div class="col">
														<h3 class="m-b-0">140</h3><span>Place Stay</span>
													</div>
													<div class="col">
														<h3 class="m-b-0">45</h3><span>Reviews</span>
													</div>
												</div>
												<div class="mt-4">
													<a href="javascript:void(0);" class="btn btn-primary mb-1 me-1">Follow</a> 
													<a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#sendMessageModal">Send Message</a>
												</div>
											</div>
											<!-- Modal -->
											<div class="modal fade" id="sendMessageModal">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Send Message</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
														</div>
														<div class="modal-body">
															<form class="comment-form">
																<div class="row"> 
																	<div class="col-lg-6">
																		<div class="mb-3">
																			<label class="text-black font-w600 form-label">Name <span class="required">*</span></label>
																			<input type="text" class="form-control" value="Author" name="Author" placeholder="Author">
																		</div>
																	</div>
																	<div class="col-lg-6">
																		<div class="mb-3">
																			<label class="text-black font-w600 form-label">Email <span class="required">*</span></label>
																			<input type="text" class="form-control" value="Email" placeholder="Email" name="Email">
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="mb-3">
																			<label class="text-black font-w600 form-label">Comment</label>
																			<textarea rows="8" class="form-control" name="comment" placeholder="Comment"></textarea>
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<div class="mb-3 mb-0">
																			<input type="submit" value="Post Comment" class="submit btn btn-primary" name="submit">
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
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-blog">
											<h5 class="text-primary d-inline">Today Highlights</h5>
											<img src="{{asset('/admin/images/profile/1.jpg')}}" alt="" class="img-fluid mt-4 mb-4 w-100">
											<h4><a href="post-details.html" class="text-black">Darwin Creative Agency Theme</a></h4>
											<p class="mb-0">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-interest">
											<h5 class="text-primary d-inline">Interest</h5>
											<div class="row mt-4 sp4" id="lightgallery">
												<a href="images/profile/2.jpg" data-exthumbimage="{{asset('/admin/images/profile/2.jpg')}}" data-src="{{asset('/admin/images/profile/2.jpg')}}" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{asset('/admin/images/profile/2.jpg')}}" alt="" class="img-fluid">
												</a>
												<a href="{{asset('/admin/images/profile/3.jpg')}}" data-exthumbimage="{{asset('/admin/images/profile/3.jpg')}}" data-src="{{asset('/admin/images/profile/3.jpg')}}" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{asset('/admin/images/profile/3.jpg')}}" alt="" class="img-fluid">
												</a>
												<a href="{{asset('/admin/images/profile/4.jpg')}}" data-exthumbimage="{{asset('/admin/images/profile/4.jpg')}}" data-src="{{asset('/admin/images/profile/4.jpg')}}" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{asset('/admin/images/profile/4.jpg')}}" alt="" class="img-fluid">
												</a>
												<a href="{{asset('/admin/images/profile/3.jpg')}}" data-exthumbimage="{{asset('/admin/images/profile/3.jpg')}}" data-src="{{asset('/admin/images/profile/3.jpg')}}" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{asset('/admin/images/profile/3.jpg')}}" alt="" class="img-fluid">
												</a>
												<a href="{{asset('/admin/images/profile/4.jpg')}}')}}" data-exthumbimage="{{asset('/admin/images/profile/4.jpg')}}" data-src="{{asset('/admin/images/profile/4.jpg')}}" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{asset('/admin/images/profile/4.jpg')}}" alt="" class="img-fluid">
												</a>
												<a href="{{asset('/admin/images/profile/2.jpg')}}" data-exthumbimage="{{asset('/admin/images/profile/2.jpg')}}" data-src="{{asset('/admin/images/profile/2.jpg')}}" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
													<img src="{{asset('/admin/images/profile/2.jpg')}}" alt="" class="img-fluid">
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-news">
											<h5 class="text-primary d-inline">Our Latest News</h5>
											<div class="media pt-3 pb-3">
												<img src="{{asset('/admin/images/profile/5.jpg')}}" alt="image" class="me-3 rounded" width="75">
												<div class="media-body">
													<h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile samples</a></h5>
													<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
												</div>
											</div>
											<div class="media pt-3 pb-3">
												<img src="{{asset('/admin/images/profile/6.jpg')}}" alt="image" class="me-3 rounded" width="75">
												<div class="media-body">
													<h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile samples</a></h5>
													<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
												</div>
											</div>
											<div class="media pt-3 pb-3">
												<img src="{{asset('/admin/images/profile/7.jpg')}}" alt="image" class="me-3 rounded" width="75">
												<div class="media-body">
													<h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of textile samples</a></h5>
													<p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-xl-8" style="overflow: auto;max-height: 800px;">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <!-- <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Details</a>
                                            </li> -->
                                            <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link active show">Details</a>
                                            </li>
                                            <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Report</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            
                                            <div id="about-me" class="tab-pane fade active show">
                                               
                                                
                                                <div class="profile-personal-info"><br>
                                                    <h4 class="text-primary mb-4">Shop Details</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Shop Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$shop->shop_name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Shop Type <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$shop->shop_type}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Propriter <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$shop->proprietor}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Mobile <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$shop->mobile}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Mail id <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$shop->mail_id}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$shop->location}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Address <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$shop->address}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Pincode <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$shop->pincode}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Expiry Date <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$shop->expiry_date}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>






                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Account Setting</h4>
                                                        <form>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" placeholder="Email" class="form-control">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Password</label>
                                                                    <input type="password" placeholder="Password" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Address</label>
                                                                <input type="text" placeholder="1234 Main St" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Address 2</label>
                                                                <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">City</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label class="form-label">State</label>
                                                                    <select class="form-control default-select wide" id="inputState">
                                                                        <option selected="">Choose...</option>
                                                                        <option>Option 1</option>
                                                                        <option>Option 2</option>
                                                                        <option>Option 3</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-2">
                                                                    <label class="form-label">Zip</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="form-check custom-checkbox">
																	<input type="checkbox" class="form-check-input" id="gridCheck">
																	<label class="form-check-label form-label" for="gridCheck"> Check me out</label>
																</div>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Sign
                                                                in</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!-- Modal -->
									<div class="modal fade" id="replyModal">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Post Reply</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
												</div>
												<div class="modal-body">
													<form>
														<textarea class="form-control" rows="4">Message</textarea>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
													<button type="button" class="btn btn-primary">Reply</button>
												</div>
											</div>
										</div>
									</div>
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

@endsection