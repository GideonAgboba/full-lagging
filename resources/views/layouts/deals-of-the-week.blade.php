<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					@include('layouts.daily-deals')

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">All Products</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@if(App\Products::all()->count() > 0)
										@if($items = App\Products::all())
										@foreach($items as $item)
											<div class="featured_slider_item">
												<div class="border_active"></div>
												<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
													<a href="<?php echo URL('/itemview') .'/' .$item->id; ?>">
														<div class="product_image products-images d-flex flex-column align-items-center justify-content-center"><img src="uploads/{{$item->path1}}" alt=""></div>
													</a>
													<div class="product_content">
														<div class="product_price discount">${{$item->min_price}}<span>${{$item->max_price}}</span></div>
														<div class="product_name"><div><a href="product.html">{{$item->title}}</a></div></div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>

															@if(Auth::user())
																@if(App\Cart::where('user_id', Auth::user()->id)->where('product_id', $item->id)->count() > 0)
																	<button disabled class="product_cart_button btn-success">Added to Cart</button>
																@else
																	<form class="addtocart">
																		{{csrf_field()}}
																		<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
																		<input type="hidden" name="category_id" value="{{$item->category_id}}">
																		<input type="hidden" name="vendor_id" value="{{$item->vendor_id}}">
																		<input type="hidden" name="product_id" value="{{$item->id}}">
																		<input type="hidden" name="title" value="{{$item->title}}">
																		<input type="hidden" name="percentage_off" value="{{$item->percentage_off}}">
																		<input type="hidden" name="min_price" value="{{$item->min_price}}">
																		<input type="hidden" name="max_price" value="{{$item->max_price}}">
																		<input type="hidden" name="path" value="{{$item->path1}}">
																		<button type="submit" class="product_cart_button">Add to Cart</button>
																		<button id="loading" disabled class="product_cart_button btn-warning">Adding to Cart <i class="loader fa-fw"></i></button>
																		<button id="done" disabled class="product_cart_button btn-success">Added to Cart</button>
																	</form>
																@endif
															@endif
														</div>
													</div>
													@if(Auth::user())
														@if($test = App\Wishlist::where('user_id',  Auth::user()->id)->where('product_id', $item->id)->count() > 0 )
															<button disabled class="product_fav wishlist_btn">
																<i class="fas fa-fw fa-heart" style="color: red;"></i>
															</button>
														@else
														<form class="wishlist">
															{{csrf_field()}}
															<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
															<input type="hidden" name="category_id" value="{{$item->category_id}}">
															<input type="hidden" name="vendor_id" value="{{$item->vendor_id}}">
															<input type="hidden" name="product_id" value="{{$item->id}}">
															<input type="hidden" name="title" value="{{$item->title}}">
															<input type="hidden" name="percentage_off" value="{{$item->percentage_off}}">
															<input type="hidden" name="min_price" value="{{$item->min_price}}">
															<input type="hidden" name="max_price" value="{{$item->max_price}}">
															<input type="hidden" name="path" value="{{$item->path1}}">
															<button type="submit" class="product_fav wishlist_btn">
																<i class="fas fa-fw fa-heart"></i>
															</button>
															<button id="loading" disabled class="product_fav wishlist_btn">
																<i class="fas fa-fw fa-heart pulse" style="color: yellow;"></i>
															</button>
															<button id="done" disabled class="product_fav wishlist_btn">
																<i class="fas fa-fw fa-heart" style="color: red;"></i>
															</button>
														</form>
														@endif
													@endif
													<ul class="product_marks">
														@if($item->percentage_off !== '')
															<li class="product_mark product_discount">-{{$item->percentage_off}}%</li>
														@endif
														<li class="product_mark product_new">new</li>
													</ul>
												</div>
											</div>
										@endforeach
										@endif
									@else
										<p class="text-center text-danger">
											No Available Product
										</p>
									@endif

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>