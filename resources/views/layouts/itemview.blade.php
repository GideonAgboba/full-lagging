@extends('back-layouts.app')
@section('contents')
<style>
.select-dropdown{
	width: 100%;
	height: 100%;
	border-style: none;
	background: transparent;
	color: #888;
}

.select-dropdown option{
	border-style: none;
	background: green;
	padding: 50px !important;
	color: #888;
}
.wishlist_btn i{
	font-size: 1.1em;
	margin-top: 0.5px;
}
</style>
@if(Auth::user())
	@include('back-layouts.home-navbar')
@else
	@include('back-layouts.navbar')
@endif

	<!-- Single Product -->
	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="../uploads/{{$item->path1}}"><img src="../uploads/{{$item->path1}}" alt=""></li>
						@if(!empty($item->path2))
                            <li data-image="../uploads/{{$item->path2}}"><img src="../uploads/{{$item->path2}}" alt=""></li>
                        @endif
						@if(!empty($item->path3))
                            <li data-image="../uploads/{{$item->path3}}"><img src="../uploads/{{$item->path3}}" alt=""></li>
                        @endif
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="../uploads/{{$item->path1}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">Laptops</div>
						<div class="product_name">{{strtoupper($item->title)}}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>{{$item->description}}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									<!-- Product Color -->
									<ul class="product_color">
										<li>
											<span>Color: </span>
											<div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
											<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

											<ul class="color_list">
												<li><div class="color_mark" style="background: red;"></div></li>
												<li><div class="color_mark" style="background: blue;"></div></li>
												<li><div class="color_mark" style="background: orange;"></div></li>
											</ul>
										</li>
									</ul>

								</div>

								<div class="product_price">${{$item->min_price}}</div>
								<div class="button_container">
									<!-- <button type="button" class="button cart_button">Add to Cart</button> -->
									@if(Auth::user())
										@if(App\Cart::where('user_id', Auth::user()->id)->where('product_id', $item->id)->count() > 0)
											<button disabled class="button cart_button btn-success">Added to Cart</button>
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
												<button type="submit" class="button cart_button">Add to Cart</button>
												<button id="loading" disabled class="button cart_button btn-warning">Adding to Cart <i class="loader fa-fw"></i></button>
												<button id="done" disabled class="button cart_button btn-success">Added to Cart</button>
											</form>
										@endif
									@endif
									@if(Auth::user())
										@if($test = App\Wishlist::where('user_id',  Auth::user()->id)->where('product_id', $item->id)->count() > 0 )
											<button disabled class="product_fav wishlist_btn">
												<i class="fas fa-fw fa-heart" style="color: #3cb63c;"></i>
											</button>
										@else
										<form class="wishlist" style="display: inline-block">
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
												<i class="fas fa-fw fa-heart" style="color: red;"></i>
											</button>
											<button id="loading" disabled class="product_fav wishlist_btn">
												<i class="fas fa-fw fa-heart pulse" style="color: yellow;"></i>
											</button>
											<button id="done" disabled class="product_fav wishlist_btn">
												<i class="fas fa-fw fa-heart" style="color: green;"></i>
											</button>
										</form>
										@endif
									@endif
								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
<script>


// Wishlist
$(document).ready(function(){	
	$(".wishlist").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/wishlist",
				type: "POST",
				data: form_data
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
                $('#wishlistcounter').load('/wishlistreload').fadeIn('slow');
            })
                    e.preventDefault();
		});

});




// addtocart
$(document).ready(function(){	
	$(".addtocart").submit(function(e){
        var sLoader = $(this).find('#loading');
        var done = $(this).find('#done');
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
		button_content.fadeOut('slow');
		done.fadeOut('slow');
        sLoader.delay(1000).fadeIn("slow");

			$.ajax({
				url: "/addtocart",
				type: "POST",
				data: form_data
			}).done(function(data){ //on Ajax success
                sLoader.delay(2000).fadeOut("slow");
                done.delay(4000).fadeIn('slow');
                $('#cartcounter').load('/cartreload').fadeIn('slow');
            })
                    e.preventDefault();
		});

});
</script>
@endsection