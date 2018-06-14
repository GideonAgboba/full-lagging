<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>{{Auth::user()->role->title}}</div>
						<!-- <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div> -->
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<!--
									<li>
										<a href="#">English<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">Italian</a></li>
											<li><a href="#">Spanish</a></li>
											<li><a href="#">Japanese</a></li>
										</ul>
									</li>
								-->
								</ul>
							</div>
							<!-- <div class="top_bar_user">
								<div class="user_icon"><img src="images/user.svg" alt=""></div>
								<div><a href="{{url('/register')}}">Register</a></div>
								<div><a href="{{url('/login')}}">Sign in</a></div>
							</div> -->
                            <div class="top_bar_user">
								<div class="user_icon"><a href="{{url('/profile')}}"><img src="uploads/{{Auth::user()->path}}" alt=""> </a></div>
								<div><a href="{{url('/profile')}}">{{Auth::user()->name}}</a></div>
								<div><a href="{{url('/logout')}}">Logout</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{url('/')}}"><img src="logo.png" class="img-fluid" alt="logo"></a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="#" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													<li><a class="clc" href="#">All Categories</a></li>
													<li><a class="clc" href="#">Computers</a></li>
													<li><a class="clc" href="#">Laptops</a></li>
													<li><a class="clc" href="#">Cameras</a></li>
													<li><a class="clc" href="#">Hardware</a></li>
													<li><a class="clc" href="#">Smartphones</a></li>
												</ul>
											</div>
										</div>
										<button style="background-color: red;"  type="submit" class="header_search_button trans_300"  value="Submit"><img src="images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><img src="images/heart.png" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="#">Wishlist</a></div>
									<div class="wishlist_count" id="wishlistcounter">{{App\Wishlist::where('user_id', Auth::user()->id)->count()}}</div>
								</div>
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="images/cart.png" alt="">
										<div class="cart_count"><span id="cartcounter">{{App\Cart::where('user_id', Auth::user()->id)->count()}}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="#">Product Order</a></div>
										<div class="cart_price">$0</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="{{url('/')}}">Home</a></li>
									<li class="hassubs">
										<a href="#">Access Control<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">Create & Edit posts</a></li>
											<li><a href="#">Make Brands</a></li>
											<li><a href="#">View Posts</a></li>
											<li><a href="#">Track History</a></li>
										</ul>
									</li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->

		

	</header>