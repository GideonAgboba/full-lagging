					<div class="deals">
						<div class="deals_title">DAILY DEALS</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								
								<!-- Deals Item -->
								@if(App\DailyDeals::all()->count() > 0)
									@if($deals = App\DailyDeals::all())
										@foreach($deals as $deal)
											<div class="owl-item deals_item">
												<div class="deals_image"><img src="uploads/{{$deal->path}}" style="height: 350px;"></div>
												<div class="deals_content">
													<div class="deals_info_line d-flex flex-row justify-content-start">
														<div class="deals_item_category"><a href="#">{{$deal->category}}</a></div>
														<div class="deals_item_price_a ml-auto">${{$deal->min_price}}</div>
													</div>
													<div class="deals_info_line d-flex flex-row justify-content-start">
														<div class="deals_item_name">{{$deal->title}}</div>
														<div class="deals_item_price ml-auto">${{$deal->max_price}}</div>
													</div>
													<div class="available">
														<div class="available_line d-flex flex-row justify-content-start">
															<div class="available_title">Available: <span>{{$deal->available}}</span></div>
															<div class="sold_title ml-auto">Already sold: <span>{{$deal->soldout}}</span></div>
														</div>
														<div class="available_bar"><span style="width:{{$deal->available}}%"></span></div>
													</div>
													<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
														<div class="deals_timer_title_container">
															<div class="deals_timer_title">Hurry Up</div>
															<div class="deals_timer_subtitle">Offer ends in:</div>
														</div>
														<div class="deals_timer_content ml-auto">
															<div class="deals_timer_box clearfix" data-target-time="">
																<div class="deals_timer_unit">
																	<div id="deals_timer1_hr" class="deals_timer_hr"></div>
																	<span>hours</span>
																</div>
																<div class="deals_timer_unit">
																	<div id="deals_timer1_min" class="deals_timer_min"></div>
																	<span>mins</span>
																</div>
																<div class="deals_timer_unit">
																	<div id="deals_timer1_sec" class="deals_timer_sec"></div>
																	<span>secs</span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									@endif
								@else
									<p class="text-center text-danger">
										No Available Deal Today
									</p>
								@endif


							</div>

						</div>