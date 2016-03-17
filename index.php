<?php
	
//session_start();
error_reporting(E_ALL);
include('mls/controller/retsController.php');

$action=basename(__FILE__, '.php');               // load action from filename for consistancy (index for this case)
//$controller = new retsController($action);            // register controller with page action and parameter
//$controller->invoke();                            // invokde controller to get view

$page_title = "Las Vegas Luxe Realty - Luxury Las Vegas, Nevada Real Estate";
$page_desc = "Real estate agents specializing in Las Vegas and Henderson Nevada Homes and Condos For Sale";
$page_keys = "real estate, for sale, for rent";

$homepage = true;
  
include('includes/header.php');
   

?>

	<body>

		<div id="container" class="main">
			<div id="out">
				<div id="home_marker"></div>
				<div id="header">
					<div class="inner">

						<!-- turn top notification bar on here by removing this comment

						<div class="notify-bar">
						<div class="container">
						<div class="row">
						<div class="col-md-11">
						<p>Optional notification bar for displaying important messages to your site vistors. It only shows when you want it to.</p>
						</div>
						<div class="col-md-1"><a href="#" class="notify-close"><i class="icon-remove-sign"></i></a></div>
						</div>
						</div>
						</div>

						-->

						<div class="top">
							<a href="#" class="scrollup"></a>
						</div>
						<div class="bottom">
							<div class="container">
								<div class="row">
									<div class="col-md-3 col-sm-3 clearfix">
										<!-- insert header logo here -->
										<a href="#" class="logo"><img class="img-responsive center-block nav-logo" src="img/logo_color.png" alt="" /></a>
									</div>
									<div class="col-md-9 col-sm-9">
										<div class="contacts_block">
											<!-- edit header address and phone number here -->
											<div class="phone styler_color">

												<div>
													<p>8704 W. CHARLESTON BLVD. | SUITE 105 | Las Vegas, NV 89117</p> 
												</div>

												<span>415-815-9079</span>

											</div>
											<div class="clear"></div>
										</div>
										<!-- top navigation starts here -->
										<div id="top_menu">
											<div class="navbar">
												<a class="btn navbar-btn navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
													<span class="menu-btn-name">Menu</span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
												</a>
												<div class="navbar-collapse collapse">
													<ul class="nav nav-pills">
														<!-- edit navigation menu -->
														<li class="styler_parent_active active"><a href="#home_anchor" class="styler_hover_bg_color styler_active_bg_color">HOME</a></li>
														<li class="styler_parent_active"><a href="#about-realtor_anchor" class="styler_hover_bg_color styler_active_bg_color">ABOUT</a></li>
														<li class="styler_parent_active"><a href="#featured-listings_anchor" class="styler_hover_bg_color styler_active_bg_color">FEATURED LISTINGS</a></li>
														<li class="styler_parent_active"><a href="#resources_anchor" class="styler_hover_bg_color styler_active_bg_color">RESOURCES</a></li>
														<li class="styler_parent_active"><a href="#contact_anchor" class="styler_hover_bg_color styler_active_bg_color">CONTACT US</a></li>
														<!--pop up nav start-->     
														<!-- /pop up nav -->
														<!-- /end navigation menu -->
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="wrapper">

					<!-- begin slider -->
					<div class="fullwidthbanner-container" id="main_slider">
						<div class="fullwidthbanner">
							<ul>
								<?php

				            $controller = new retsController('carousel'); // register controller with page action and parameter
				            $controller->invoke();                            // invokde controller to get view
				            
								?> 
							</ul>
						</div>
					</div>
					<!-- /end slider -->

					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-ms-12">
								<!-- begin real estate agent's promo block -->
								<div class="row">
									<div class="col-sm-12 col-ms-12">                                         
										<div class="promo-block">
											<!-- edit real estate agent's promo block heading here -->
											<h2 class="block-title styler_color">
												Discover The Difference 
											</h2>
											<!-- promo real estate agent's block line divider here -->
											<div class="block-separator clearfix"></div>                                            <div class="col-sm-4 col-ms-4">
												<!-- edit real estate agent's promo block image here -->
												<img class="img-responsive block-img" src="img/mel_crop.jpg" alt="" />
											</div>
											<div class="col-sm-8 col-ms-8">
												<!-- real estate agent's promo block text starts here -->
												<div class="promo-text">
													<!-- edit real estate agent's promo block sub-heading here -->
													<h3>An Experienced Real Estate Pro You Can Trust </h3>
													<br/>
													<!-- edit real estate agent's promo block paragraph text here -->
													<p>I am dedicated to matching prospective buyers with a house that meets their needs and that they will truly love! I believe in listening to my clients and providing them with listings that are within their price range and matching them with homes that exceed their expectations.</p>
													<p>I have a diverse skill set with a solid natural sciences and business educational background. I hold a BA in Biology from Sacramento State University and an MBA Marketing from Golden Gate University, San Francisco. <ipsum class=""></ipsum></p>
													<img style="float: left;" src="img/realtor-signature.jpg" alt="" />
												</div>
											</div>

										</div>
									</div>
								</div>
								<!-- /end promo text block -->

								<!-- begin featured listings summary block -->                                
								<div class="wide-block">
									<div class="featured-listings">
										<div id="featured-listings_marker"></div>
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<!-- edit featured listings headline here -->
												<h2 class="block-title styler_color">
													Featured Listings
												</h2>
											</div>
										</div>
										<!-- row #1 featured listings summary block --> 
										<div class="row">
											<div class="col-md-4 col-sm-4">
												<!-- featured item  house #1 summary info -->
												<div class="featured-item">
													<!-- house #1 image -->
													<img class="img-responsive" src="img/house1.jpg" alt="">
													<!-- house #1 headline -->
													<div class="heading styler_bg_color">POOL & SPA!</div>
													<!-- house #1 summary content -->
													<div class="content">
														<!-- house #1 summary content: address -->
														<address>
															8950 Highland Crest<br />
															Dallas, TX 75208
														</address>
														<!-- house #1 summary content: characteristics -->
														<div class="characteristics">
															<ul>
																<li>3,100 s/f</li>
																<li>4 Bedrooms</li>
																<li>2.5 Baths</li>
															</ul>
														</div>
														<div class="item-info">
															<div class="row">
																<div class="col-md-6 col-sm-6">
																	<!-- house #1 summary content: price -->
																	<div class="price styler_color">
																		$689,000
																	</div>
																</div>
																<div class="col-md-6 col-sm-6">
																	<!-- link to house #1 featured item detail -->
																	<div class="more">
																		<a id="item1" href="javascript:void(0)" class="styler_color property-link">View Details</a>
																	</div>
																</div>
															</div>                                                            
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-sm-4">
												<!-- featured item  house #2 summary info -->
												<div class="featured-item">
													<!-- house #2 image -->
													<img class="img-responsive" src="img/house2.jpg" alt="">
													<!-- house #2 headline -->
													<div class="heading styler_bg_color">NEW CONSTRUCTION</div>
													<!-- house #2 summary content -->
													<div class="content">
														<!-- house #2 summary content: address -->
														<address>
															6231 Topsfield Lane<br />
															Dallas, TX 75233
														</address>
														<!-- house #2 summary content: characteristics -->
														<div class="characteristics">
															<ul>
																<li>2,750 s/f</li>
																<li>4 Bedrooms</li>
																<li>2.5 Baths</li>
															</ul>
														</div>
														<div class="item-info">
															<div class="row">
																<div class="col-md-6 col-sm-6">
																	<!-- house #2 summary content: price -->
																	<div class="price styler_color">
																		$535,000
																	</div>
																</div>
																<div class="col-md-6 col-sm-6">
																	<!-- link to house #2 featured item detail -->
																	<div class="more">
																		<a id="item2" href="javascript:void(0)" class="styler_color property-link">View Details</a>
																	</div>
																</div>
															</div>                                                            
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-sm-4">
												<!-- featured item  house #3 summary info -->
												<div class="featured-item">
													<!-- house #3 image -->
													<img class="img-responsive" src="img/house10.jpg" alt="">
													<!-- house #3 headline -->
													<div class="heading styler_bg_color">CONTRACT PENDING</div>
													<!-- house #3 summary content -->
													<div class="content">
														<!-- house #3 summary content: address -->
														<address>
															2311 Mira Vista<br />
															Dallas, TX 75251
														</address>
														<!-- house #3 summary content: characteristics -->
														<div class="characteristics">
															<ul>
																<li>3,800 s/f</li>
																<li>5 Bedrooms</li>
																<li>3 Baths</li>
															</ul>
														</div>
														<div class="item-info">
															<div class="row">
																<div class="col-md-6 col-sm-6">
																	<!-- house #3 summary content: price -->
																	<div class="price styler_color">
																		$819,000
																	</div>
																</div>
																<div class="col-md-6 col-sm-6">
																	<!-- link to house #3 featured item detail -->
																	<div class="more">
																		<a id="item3" href="javascript:void(0)" class="styler_color property-link">View Details</a>
																	</div>
																</div>
															</div>                                                            
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- row #2 featured listings summary block --> 
										<div class="row">
											<div class="col-md-4 col-sm-4">
												<!-- featured item  house #4 summary info -->
												<div class="featured-item">
													<!-- house #4 image -->
													<img class="img-responsive" src="img/house4.jpg" alt="">
													<!-- house #4 headline -->
													<div class="heading styler_bg_color">BEAUTIFUL COTTAGE</div>
													<!-- house #4 summary content -->
													<div class="content">
														<!-- house #4 summary content: address -->
														<address>
															6800 Sherburne Drive<br />
															Dallas, TX 75243
														</address>
														<!-- house #4 summary content: characteristics -->
														<div class="characteristics">
															<ul>
																<li>2,750 s/f</li>
																<li>4 Bedrooms</li>
																<li>2.5 Baths</li>
															</ul>
														</div>
														<div class="item-info">
															<div class="row">
																<div class="col-md-6 col-sm-6">
																	<!-- house #4 summary content: price -->
																	<div class="price styler_color">
																		$379,500
																	</div>
																</div>
																<div class="col-md-6 col-sm-6">
																	<!-- link to house #4 featured item detail -->
																	<div class="more">
																		<a id="item4" href="javascript:void(0)" class="styler_color property-link">View Details</a>
																	</div>
																</div>
															</div>                                                            
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-sm-4">
												<!-- featured item  house #5 summary info -->
												<div class="featured-item">
													<!-- house #5 image -->
													<img class="img-responsive" src="img/house7.jpg" alt="">
													<!-- house #5 headline -->
													<div class="heading styler_bg_color">JUST REDUCED!</div>
													<!-- house #5 summary content -->
													<div class="content">
														<!-- house #5 summary content: address -->
														<address>
															6830 Hilltop Lane<br />
															Dallas, TX 75280
														</address>
														<!-- house #5 summary content: characteristics -->
														<div class="characteristics">
															<ul>
																<li>2,900 s/f</li>
																<li>4 Bedrooms</li>
																<li>2 Baths</li>
															</ul>
														</div>
														<div class="item-info">
															<div class="row">
																<div class="col-md-6 col-sm-6">
																	<!-- house #5 summary content: price -->
																	<div class="price styler_color">
																		$450,000
																	</div>
																</div>
																<div class="col-md-6 col-sm-6">
																	<!-- link to house #5 featured item detail -->
																	<div class="more">
																		<a id="item5" href="javascript:void(0)" class="styler_color property-link">View Details</a>
																	</div>
																</div>
															</div>                                                            
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-sm-4">
												<!-- featured item  house #6 summary info -->
												<div class="featured-item">
													<!-- house #6 image -->
													<img class="img-responsive" src="img/house9.jpg" alt="">
													<!-- house #6 headline -->
													<div class="heading styler_bg_color">NEW LISTING</div>
													<!-- house #6 summary content -->
													<div class="content">
														<!-- house #6 summary content: address -->
														<address>
															4433 Colfax Circle<br />
															Dallas, TX 75231
														</address>
														<!-- house #6 summary content: characteristics -->
														<div class="characteristics">
															<ul>
																<li>2,400 s/f</li>
																<li>3 Bedrooms</li>
																<li>2.5 Baths</li>
															</ul>
														</div>
														<div class="item-info">
															<div class="row">
																<div class="col-md-6 col-sm-6">
																	<!-- house #6 summary content: price -->
																	<div class="price styler_color">
																		$519,500
																	</div>
																</div>
																<div class="col-md-6 col-sm-6">
																	<!-- link to house #6 featured item detail -->
																	<div class="more">
																		<a id="item6" href="javascript:void(0)" class="styler_color property-link">View Details</a>
																	</div>
																</div>
															</div>                                                            
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /end featured listings summary block -->

									<!-- featured property #1 details start here -->
									<div id="property-item1" class="property-item">
										<div class="wide-divider">
											<a class="close-details" href="javascript:void(0)"></a>
										</div>
										<div class="inner-block">

											<div class="row">
												<div class="col-md-8 col-sm-8">
													<!-- edit featured property #1 address -->
													<div class="address">
														<div class="address-top">
															8590 Highland Crest
														</div>    
														<div class="address-bottom">
															Dallas, TX 75208
														</div>    
													</div>                                                
												</div>
												<div class="col-md-4 col-sm-4">
													<!-- edit featured property #1 price -->
													<div class="price styler_color">
														$689,000
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8 col-sm-8">
													<div class="">
														<!-- featured property #1 photo gallery starts here -->
														<div class="slider-block">
															<div id="rs_gallery1" class="royalSlider rsDefault">
																<!-- edit featured property #1 photo #1 here -->
																<a class="rsImg bugaga" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house1.jpg" href="img/gal1-house1.jpg">Gallery 1: House Image #1<img width="96" height="72" class="rsTmb" src="img/gal1-house1_t.jpg" alt="" /></a>
																<!-- edit featured property #1 photo #2 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house2.jpg" href="img/gal1-house2.jpg">Gallery 1: House Image #2<img width="96" height="72" class="rsTmb" src="img/gal1-house2_t.jpg" alt="" /></a>
																<!-- edit featured property #1 photo #3 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house3.jpg" href="img/gal1-house3.jpg">Gallery 1: House Image #3<img width="96" height="72" class="rsTmb" src="img/gal1-house3_t.jpg" alt="" /></a>
																<!-- edit featured property #1 photo #4 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house4.jpg" href="img/gal1-house4.jpg">Gallery 1: House Image #4<img width="96" height="72" class="rsTmb" src="img/gal1-house4_t.jpg" alt="" /></a>
																<!-- edit featured property #1 photo #5 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house5.jpg" href="img/gal1-house5.jpg">Gallery 1: House Image #5<img width="96" height="72" class="rsTmb" src="img/gal1-house5_t.jpg" alt="" /></a>
																<!-- edit featured property #1 photo #6 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house6.jpg" href="img/gal1-house6.jpg">Gallery 1: House Image #6<img width="96" height="72" class="rsTmb" src="img/gal1-house6_t.jpg" alt="" /></a>
																<!-- edit featured property #1 photo #7 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house7.jpg" href="img/gal1-house7.jpg">Gallery 1: House Image #7<img width="96" height="72" class="rsTmb" src="img/gal1-house7_t.jpg" alt="" /></a>
																<!-- edit featured property #1 photo #8 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house8.jpg" href="img/gal1-house8.jpg">Gallery 1: House Image #8<img width="96" height="72" class="rsTmb" src="img/gal1-house8_t.jpg" alt="" /></a>
																<!-- edit featured property #1 photo #9 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house9.jpg" href="img/gal1-house9.jpg">Gallery 1: House Image #9<img width="96" height="72" class="rsTmb" src="img/gal1-house9_t.jpg" alt="" /></a>
																<!-- edit featured property #1 photo #10 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house10.jpg" href="img/gal1-house10.jpg">Gallery 1: House Image #10<img width="96" height="72" class="rsTmb" src="img/gal1-house10_t.jpg" alt="" /></a>
																<!-- edit featured property #1 photo #11 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house11.jpg" href="img/gal1-house11.jpg">Gallery 1: House Image #11<img width="96" height="72" class="rsTmb" src="img/gal1-house11_t.jpg" alt="" /></a>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-4 col-sm-4">
													<!-- featured property #1 details summary info starts here -->
													<div class="details-info">
														<div class="row">
															<div class="col-md-12 col-sm-12">
																<!-- edit featured property #1 details summary info (mls #) here -->
																<div class="item-id">
																	MLS #: 120876543
																</div>
																<!-- edit featured property #1 details summary info (characteristics) here -->
																<div class="characteristics">
																	<ul>
																		<li>3,100 s/f</li>
																		<li>4 Bedrooms</li>
																		<li>2.5 Baths</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="row">

															<div class="col-md-6 col-sm-6">
																<!-- edit featured property #1 details summary info (listing agent image) -->
																<div class="realtor-mini">
																	<img class="img-responsive" src="img/realtor_profile.jpg" alt="">
																</div>
															</div>
															<!-- edit featured property #1 details summary info (listing agent name, address and phone number) -->
															<div class="col-md-6 col-sm-6">
																<div class="details-name">Mary Anderson</div>
																<div class="details-place">Anderson Realty</div>
																<div class="details-phone">214.435.0987</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<!-- featured listings house #1 property tabs -->
												<div class="details-tabs">
													<div class="col-md-12 col-sm-12">
														<ul class="tabs">
															<!-- edit featured listings house #1 property tab label #1 (property details) here -->
															<li class="active"><a class="styler_bg_color" href="#details1" data-toggle="tab">PROPERTY DETAILS</a></li>
															<!-- edit featured listings house #1 property tab label #2 (map) here -->
															<li><a class="styler_bg_color" href="#tab-map" data-toggle="tab">MAP</a></li>
														</ul>
														<div class="tab-content tabs_blocks">
															<div class="active" id="details1">
																<!-- featured listings house #1 property details tab info slides start here -->
																<ul class="info_slides">
																	<li class="active">
																		<!-- edit featured listings house #1 property tab info slide #1 (details) label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Details</a>
																		<!-- edit featured listings house #1 property tab info slide #1 (details) summary text here -->
																		<div class="text" style="display: block;">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #1 left-side details content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Property Type:</strong></td>
																								<td>Single Family</td>
																							</tr>
																							<tr>
																								<td><strong>Year Built:</strong></td>
																								<td>2002</td>
																							</tr>
																							<tr>
																								<td><strong>Property Class:</strong></td>
																								<td>Residential</td>
																							</tr>
																							<tr>
																								<td><strong>County:</strong></td>
																								<td>Dallas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #1 right-side details content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedrooms:</strong></td>
																								<td>4</td>
																							</tr>
																							<tr>
																								<td><strong>Baths:</strong></td>
																								<td>2.5</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Size:</strong></td>
																								<td>9,757 Sq Ft Lot</td>
																							</tr>
																							<tr>
																								<td><strong>Stories:</strong></td>
																								<td>2</td>
																							</tr>
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #1 interior slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Interior</a>
																		<!-- edit featured listings house #1 interior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #1 interior slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Living Area 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Living Area 2:</strong></td>
																								<td>14 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Dining Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Kitchen:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Master Bedroom:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #1 interior slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedroom 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 2:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 3:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Study:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Utility Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #1 exterior slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Exterior</a>
																		<!-- edit featured listings house #1 exterior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #1 exterior slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Fence:</strong></td>
																								<td>Wood</td>
																							</tr>
																							<tr>
																								<td><strong>Sprinkler System:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Dimensions:</strong></td>
																								<td>80x135</td>
																							</tr>
																							<tr>
																								<td><strong>Pool:</strong></td>
																								<td>Yes - Gunite</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #1 exterior slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Patio:</strong></td>
																								<td>Yes - Covered</td>
																							</tr>
																							<tr>
																								<td><strong>Balcony:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Gutters:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Exterior Lighting:</strong></td>
																								<td>Yes</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #1 additional details slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Additional Details</a>
																		<!-- edit featured listings house #1 exterior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #1 additional details slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																							<tr>
																								<td><strong>Cooling:</strong></td>
																								<td>Central - Electric</td>
																							</tr>
																							<tr>
																								<td><strong>Heating:</strong></td>
																								<td>Central - Gas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #1 additional details slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>School District:</strong></td>
																								<td>Richardson ISD</td>
																							</tr>
																							<tr>
																								<td><strong>Elementary School:</strong></td>
																								<td>Merriman Park</td>
																							</tr>
																							<tr>
																								<td><strong>Middle School:</strong></td>
																								<td>Lake Highlands</td>
																							</tr>
																							<tr>
																								<td><strong>High School:</strong></td>
																								<td>Lake Highlands High School</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																</ul>
															</div>
															<!-- edit featured listings house #1 map tab info here -->
															<div class="tab-map">
																<!-- begin map -->
																<div class="map" data-coordinates="32.83823,-96.775347" data-title="5321 E Mockingbird Ln, Dallas, TX 75206"></div>
																<!-- /end map -->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- featured property #2 details start here -->
									<div id="property-item2" class="property-item">
										<div class="wide-divider">
											<a class="close-details" href="javascript:void(0)"></a>
										</div>
										<div class="inner-block">

											<div class="row">
												<div class="col-md-8 col-sm-8">
													<!-- edit featured property #2 address -->
													<div class="address">
														<div class="address-top">
															6231 Topsfield Lane
														</div>    
														<div class="address-bottom">
															Dallas, TX 75233
														</div>    
													</div>                                                
												</div>
												<div class="col-md-4 col-sm-4">
													<!-- edit featured property #2 price -->
													<div class="price styler_color">
														$535,000
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8 col-sm-8">
													<div class="">
														<!-- featured property #2 photo gallery starts here -->
														<div class="slider-block">
															<div id="rs_gallery2" class="royalSlider rsDefault">
																<!-- edit featured property #2 photo #1 here -->
																<a class="rsImg bugaga" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal2-house2.jpg" href="img/gal2-house2.jpg">Gallery 1: House Image #1<img width="96" height="72" class="rsTmb" src="img/gal2-house2_t.jpg" alt="" /></a>
																<!-- edit featured property #2 photo #2 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house2.jpg" href="img/gal1-house2.jpg">Gallery 1: House Image #2<img width="96" height="72" class="rsTmb" src="img/gal1-house2_t.jpg" alt="" /></a>
																<!-- edit featured property #2 photo #3 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house3.jpg" href="img/gal1-house3.jpg">Gallery 1: House Image #3<img width="96" height="72" class="rsTmb" src="img/gal1-house3_t.jpg" alt="" /></a>
																<!-- edit featured property #2 photo #4 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house4.jpg" href="img/gal1-house4.jpg">Gallery 1: House Image #4<img width="96" height="72" class="rsTmb" src="img/gal1-house4_t.jpg" alt="" /></a>
																<!-- edit featured property #2 photo #5 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house5.jpg" href="img/gal1-house5.jpg">Gallery 1: House Image #5<img width="96" height="72" class="rsTmb" src="img/gal1-house5_t.jpg" alt="" /></a>
																<!-- edit featured property #2 photo #6 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house6.jpg" href="img/gal1-house6.jpg">Gallery 1: House Image #6<img width="96" height="72" class="rsTmb" src="img/gal1-house6_t.jpg" alt="" /></a>
																<!-- edit featured property #2 photo #7 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house7.jpg" href="img/gal1-house7.jpg">Gallery 1: House Image #7<img width="96" height="72" class="rsTmb" src="img/gal1-house7_t.jpg" alt="" /></a>
																<!-- edit featured property #2 photo #8 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house8.jpg" href="img/gal1-house8.jpg">Gallery 1: House Image #8<img width="96" height="72" class="rsTmb" src="img/gal1-house8_t.jpg" alt="" /></a>
																<!-- edit featured property #2 photo #9 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house9.jpg" href="img/gal1-house9.jpg">Gallery 1: House Image #9<img width="96" height="72" class="rsTmb" src="img/gal1-house9_t.jpg" alt="" /></a>
																<!-- edit featured property #2 photo #10 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house10.jpg" href="img/gal1-house10.jpg">Gallery 1: House Image #10<img width="96" height="72" class="rsTmb" src="img/gal1-house10_t.jpg" alt="" /></a>
																<!-- edit featured property #2 photo #11 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house11.jpg" href="img/gal1-house11.jpg">Gallery 1: House Image #11<img width="96" height="72" class="rsTmb" src="img/gal1-house11_t.jpg" alt="" /></a>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-4 col-sm-4">
													<!-- featured property #2 details summary info starts here -->
													<div class="details-info">
														<div class="row">
															<div class="col-md-12 col-sm-12">
																<!-- edit featured property #2 details summary info (mls #) here -->
																<div class="item-id">
																	MLS #: 120876543
																</div>
																<!-- edit featured property #2 details summary info (characteristics) here -->
																<div class="characteristics">
																	<ul>
																		<li>2,750 s/f</li>
																		<li>4 Bedrooms</li>
																		<li>2.5 Baths</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6 col-sm-6">
																<!-- edit featured property #2 details summary info (listing agent image) -->
																<div class="realtor-mini">
																	<img class="img-responsive" src="img/realtor_profile.jpg" alt="">
																</div>
															</div>
															<!-- edit featured property #2 details summary info (listing agent name, address and phone number) -->
															<div class="col-md-6 col-sm-6">
																<div class="details-name">Mary Anderson</div>
																<div class="details-place">Anderson Realty</div>
																<div class="details-phone">214.435.0987</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">

												<div class="details-tabs">
													<div class="col-md-12 col-sm-12">
														<!-- featured listings house #2 property tabs -->
														<ul class="tabs">
															<!-- edit featured listings house #2 property tab label #1 (property details) here -->
															<li class="active"><a class="styler_bg_color" href="#details2" data-toggle="tab">PROPERTY DETAILS</a></li>
															<!-- edit featured listings house #2 property tab label #2 (map) here -->
															<li><a class="styler_bg_color" href="#tab-map" data-toggle="tab">MAP</a></li>
														</ul>
														<div class="tab-content tabs_blocks">
															<div class="active" id="details2">
																<!-- featured listings house #2 property details tab info slides start here -->
																<ul class="info_slides">
																	<!-- edit featured listings house #2 property tab info slide #1 (details) label here -->
																	<li class="active">
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Details</a>
																		<!-- edit featured listings house #2 property tab info slide #1 (details) summary text here -->
																		<div class="text" style="display: block;">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #2 left-side details content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Property Type:</strong></td>
																								<td>Single Family</td>
																							</tr>
																							<tr>
																								<td><strong>Year Built:</strong></td>
																								<td>2002</td>
																							</tr>
																							<tr>
																								<td><strong>Property Class:</strong></td>
																								<td>Residential</td>
																							</tr>
																							<tr>
																								<td><strong>County:</strong></td>
																								<td>Dallas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #2 right-side details content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedrooms:</strong></td>
																								<td>4</td>
																							</tr>
																							<tr>
																								<td><strong>Baths:</strong></td>
																								<td>2.5</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Size:</strong></td>
																								<td>9,757 Sq Ft Lot</td>
																							</tr>
																							<tr>
																								<td><strong>Stories:</strong></td>
																								<td>2</td>
																							</tr>
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #2 interior slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Interior</a>
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #2 left-side interior content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Living Area 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Living Area 2:</strong></td>
																								<td>14 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Dining Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Kitchen:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Master Bedroom:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #2 right-side interior content here -->

																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedroom 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 2:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 3:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Study:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Utility Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #2 exterior slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Exterior</a>
																		<!-- edit featured listings house #2 exterior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #2 exterior slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Fence:</strong></td>
																								<td>Wood</td>
																							</tr>
																							<tr>
																								<td><strong>Sprinkler System:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Dimensions:</strong></td>
																								<td>80x135</td>
																							</tr>
																							<tr>
																								<td><strong>Pool:</strong></td>
																								<td>Yes - Gunite</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #2 exterior slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Patio:</strong></td>
																								<td>Yes - Covered</td>
																							</tr>
																							<tr>
																								<td><strong>Balcony:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Gutters:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Exterior Lighting:</strong></td>
																								<td>Yes</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #2 additional details slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Additional Details</a>
																		<!-- edit featured listings house #2 exterior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #2 additional details slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																							<tr>
																								<td><strong>Cooling:</strong></td>
																								<td>Central - Electric</td>
																							</tr>
																							<tr>
																								<td><strong>Heating:</strong></td>
																								<td>Central - Gas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #2 additional details slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>School District:</strong></td>
																								<td>Richardson ISD</td>
																							</tr>
																							<tr>
																								<td><strong>Elementary School:</strong></td>
																								<td>Merriman Park</td>
																							</tr>
																							<tr>
																								<td><strong>Middle School:</strong></td>
																								<td>Lake Highlands</td>
																							</tr>
																							<tr>
																								<td><strong>High School:</strong></td>
																								<td>Lake Highlands High School</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																</ul>
															</div>
															<!-- edit featured listings house #2 map tab info here -->
															<div class="tab-map">
																<!-- begin map -->
																<div class="map" data-coordinates="32.83823,-96.775347" data-title="5321 E Mockingbird Ln, Dallas, TX 75206"></div>
																<!-- /end map -->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Featured Property #3 Details -->
									<div id="property-item3" class="property-item">
										<div class="wide-divider">
											<a class="close-details" href="javascript:void(0)"></a>
										</div>
										<div class="inner-block">
											<div class="row">
												<div class="col-md-8 col-sm-8">
													<div class="address">
														<!-- edit featured property #3 address -->
														<div class="address-top">
															2311 Mira Vista
														</div>    
														<div class="address-bottom">
															Dallas, TX 75251
														</div>    
													</div>                                                
												</div>
												<div class="col-md-4 col-sm-4">
													<!-- edit featured property #3 price -->
													<div class="price styler_color">
														$819,000
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8 col-sm-8">
													<div class="">
														<!-- featured property #3 photo gallery starts here -->
														<div class="slider-block">
															<div id="rs_gallery3" class="royalSlider rsDefault">
																<!-- edit featured property #3 photo #1here -->
																<a class="rsImg bugaga" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal10-house10.jpg" href="img/gal10-house10.jpg">Gallery 1: House Image #1<img width="96" height="72" class="rsTmb" src="img/gal10-house10_t.jpg" alt="" /></a>
																<!-- edit featured property #3 photo #2 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house2.jpg" href="img/gal1-house2.jpg">Gallery 1: House Image #2<img width="96" height="72" class="rsTmb" src="img/gal1-house2_t.jpg" alt="" /></a>
																<!-- edit featured property #3 photo #3 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house3.jpg" href="img/gal1-house3.jpg">Gallery 1: House Image #3<img width="96" height="72" class="rsTmb" src="img/gal1-house3_t.jpg" alt="" /></a>
																<!-- edit featured property #3 photo #4 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house4.jpg" href="img/gal1-house4.jpg">Gallery 1: House Image #4<img width="96" height="72" class="rsTmb" src="img/gal1-house4_t.jpg" alt="" /></a>
																<!-- edit featured property #3 photo #5 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house5.jpg" href="img/gal1-house5.jpg">Gallery 1: House Image #5<img width="96" height="72" class="rsTmb" src="img/gal1-house5_t.jpg" alt="" /></a>
																<!-- edit featured property #3 photo #6 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house6.jpg" href="img/gal1-house6.jpg">Gallery 1: House Image #6<img width="96" height="72" class="rsTmb" src="img/gal1-house6_t.jpg" alt="" /></a>
																<!-- edit featured property #3 photo #7 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house7.jpg" href="img/gal1-house7.jpg">Gallery 1: House Image #7<img width="96" height="72" class="rsTmb" src="img/gal1-house7_t.jpg" alt="" /></a>
																<!-- edit featured property #3 photo #8 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house8.jpg" href="img/gal1-house8.jpg">Gallery 1: House Image #8<img width="96" height="72" class="rsTmb" src="img/gal1-house8_t.jpg" alt="" /></a>
																<!-- edit featured property #3 photo #9 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house9.jpg" href="img/gal1-house9.jpg">Gallery 1: House Image #9<img width="96" height="72" class="rsTmb" src="img/gal1-house9_t.jpg" alt="" /></a>
																<!-- edit featured property #3 photo #10 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house10.jpg" href="img/gal1-house10.jpg">Gallery 1: House Image #10<img width="96" height="72" class="rsTmb" src="img/gal1-house10_t.jpg" alt="" /></a>
																<!-- edit featured property #3 photo #11 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house11.jpg" href="img/gal1-house11.jpg">Gallery 1: House Image #11<img width="96" height="72" class="rsTmb" src="img/gal1-house11_t.jpg" alt="" /></a>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-4 col-sm-4">
													<!-- featured property #3 details summary info starts here -->
													<div class="details-info">
														<div class="row">
															<div class="col-md-12 col-sm-12">
																<!-- edit featured property #3 details summary info (mls #) here -->
																<div class="item-id">
																	MLS #: 120876549
																</div>
																<!-- edit featured property #3 details summary info (characteristics) here -->
																<div class="characteristics">
																	<ul>
																		<li>3,800 s/f</li>
																		<li>5 Bedrooms</li>
																		<li>3 Baths</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6 col-sm-6">
																<!-- edit featured property #3 details summary info (listing agent image) -->
																<div class="realtor-mini">
																	<img class="img-responsive" src="img/realtor_profile.jpg" alt="">
																</div>
															</div>
															<!-- edit featured property #3 details summary info (listing agent name, address and phone number) -->
															<div class="col-md-6 col-sm-6">
																<div class="details-name">Mary Anderson</div>
																<div class="details-place">Anderson Realty</div>
																<div class="details-phone">214.435.0987</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="details-tabs">
													<div class="col-md-12 col-sm-12">
														<!-- featured listings house #3 property tabs -->
														<ul class="tabs">
															<!-- edit featured listings house #3 property tab label #1 (property details) here -->
															<li class="active"><a class="styler_bg_color" href="#details3" data-toggle="tab">PROPERTY DETAILS</a></li>
															<!-- edit featured listings house #3 property tab label #2 (map) here -->
															<li><a class="styler_bg_color" href="#tab-map" data-toggle="tab">MAP</a></li>
														</ul>
														<div class="tab-content tabs_blocks">
															<div class="active" id="details3">
																<!-- featured listings house #3 property details tab info slides start here -->
																<ul class="info_slides">
																	<li class="active">
																		<!-- edit featur    ed listings house #3 property tab info slide #1 (details) label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Details</a>
																		<!-- edit featured listings house #3 property tab info slide #1 (details) summary text here -->
																		<div class="text" style="display: block;">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #3 left-side details content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Property Type:</strong></td>
																								<td>Single Family</td>
																							</tr>
																							<tr>
																								<td><strong>Year Built:</strong></td>
																								<td>2002</td>
																							</tr>
																							<tr>
																								<td><strong>Property Class:</strong></td>
																								<td>Residential</td>
																							</tr>
																							<tr>
																								<td><strong>County:</strong></td>
																								<td>Dallas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #3 right-side details content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedrooms:</strong></td>
																								<td>5</td>
																							</tr>
																							<tr>
																								<td><strong>Baths:</strong></td>
																								<td>3</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Size:</strong></td>
																								<td>9,757 Sq Ft Lot</td>
																							</tr>
																							<tr>
																								<td><strong>Stories:</strong></td>
																								<td>2</td>
																							</tr>
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #3 interior slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Interior</a>
																		<!-- edit featured listings house #3 interior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #3 interior slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Living Area 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Living Area 2:</strong></td>
																								<td>14 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Dining Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Kitchen:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Master Bedroom:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #3 interior slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedroom 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 2:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 3:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Study:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Utility Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #3 exterior slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Exterior</a>
																		<!-- edit featured listings house #3 exterior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #3 exterior slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Fence:</strong></td>
																								<td>Wood</td>
																							</tr>
																							<tr>
																								<td><strong>Sprinkler System:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Dimensions:</strong></td>
																								<td>80x135</td>
																							</tr>
																							<tr>
																								<td><strong>Pool:</strong></td>
																								<td>Yes - Gunite</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #3 exterior slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Patio:</strong></td>
																								<td>Yes - Covered</td>
																							</tr>
																							<tr>
																								<td><strong>Balcony:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Gutters:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Exterior Lighting:</strong></td>
																								<td>Yes</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #3 additional details slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Additional Details</a>
																		<!-- edit featured listings house #3 exterior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #3 additional details slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																							<tr>
																								<td><strong>Cooling:</strong></td>
																								<td>Central - Electric</td>
																							</tr>
																							<tr>
																								<td><strong>Heating:</strong></td>
																								<td>Central - Gas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #3 additional details slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>School District:</strong></td>
																								<td>Richardson ISD</td>
																							</tr>
																							<tr>
																								<td><strong>Elementary School:</strong></td>
																								<td>Merriman Park</td>
																							</tr>
																							<tr>
																								<td><strong>Middle School:</strong></td>
																								<td>Lake Highlands</td>
																							</tr>
																							<tr>
																								<td><strong>High School:</strong></td>
																								<td>Lake Highlands High School</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																</ul>
															</div>

															<!-- edit featured listings house #3 map tab info here -->
															<div class="tab-map">
																<!-- begin map -->
																<div class="map" data-coordinates="32.83823,-96.775347" data-title="5321 E Mockingbird Ln, Dallas, TX 75206"></div>
																<!-- /end map -->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- featured property #4 details start here -->
									<div id="property-item4" class="property-item">
										<div class="wide-divider">
											<a class="close-details" href="javascript:void(0)"></a>
										</div>
										<div class="inner-block">

											<div class="row">
												<div class="col-md-8 col-sm-8">
													<!-- edit featured property #4 address -->
													<div class="address">
														<div class="address-top">
															6800 Sherburne Drive
														</div>    
														<div class="address-bottom">
															Dallas, TX 75243
														</div>    
													</div>                                                
												</div>
												<div class="col-md-4 col-sm-4">
													<!-- edit featured property #4 price -->
													<div class="price styler_color">
														$879,500
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8 col-sm-8">
													<div class="">
														<!-- featured property #4 photo gallery starts here -->
														<div class="slider-block">
															<div id="rs_gallery4" class="royalSlider rsDefault">
																<!-- edit featured property #4 photo #1 here -->
																<a class="rsImg bugaga" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal4-house4.jpg" href="img/gal4-house4.jpg">Gallery 4: House Image #4<img width="96" height="72" class="rsTmb" src="img/gal4-house4_t.jpg" alt="" /></a>
																<!-- edit featured property #4 photo #2 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house2.jpg" href="img/gal1-house2.jpg">Gallery 1: House Image #2<img width="96" height="72" class="rsTmb" src="img/gal1-house2_t.jpg" alt="" /></a>
																<!-- edit featured property #4 photo #3 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house3.jpg" href="img/gal1-house3.jpg">Gallery 1: House Image #3<img width="96" height="72" class="rsTmb" src="img/gal1-house3_t.jpg" alt="" /></a>
																<!-- edit featured property #4 photo #4 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house4.jpg" href="img/gal1-house4.jpg">Gallery 1: House Image #4<img width="96" height="72" class="rsTmb" src="img/gal1-house4_t.jpg" alt="" /></a>
																<!-- edit featured property #4 photo #5 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house5.jpg" href="img/gal1-house5.jpg">Gallery 1: House Image #5<img width="96" height="72" class="rsTmb" src="img/gal1-house5_t.jpg" alt="" /></a>
																<!-- edit featured property #4 photo #6 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house6.jpg" href="img/gal1-house6.jpg">Gallery 1: House Image #6<img width="96" height="72" class="rsTmb" src="img/gal1-house6_t.jpg" alt="" /></a>
																<!-- edit featured property #4 photo #7 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house7.jpg" href="img/gal1-house7.jpg">Gallery 1: House Image #7<img width="96" height="72" class="rsTmb" src="img/gal1-house7_t.jpg" alt="" /></a>
																<!-- edit featured property #4 photo #8 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house8.jpg" href="img/gal1-house8.jpg">Gallery 1: House Image #8<img width="96" height="72" class="rsTmb" src="img/gal1-house8_t.jpg" alt="" /></a>
																<!-- edit featured property #4 photo #9 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house9.jpg" href="img/gal1-house9.jpg">Gallery 1: House Image #9<img width="96" height="72" class="rsTmb" src="img/gal1-house9_t.jpg" alt="" /></a>
																<!-- edit featured property #4 photo #10 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house10.jpg" href="img/gal1-house10.jpg">Gallery 1: House Image #10<img width="96" height="72" class="rsTmb" src="img/gal1-house10_t.jpg" alt="" /></a>
																<!-- edit featured property #4 photo #11 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house11.jpg" href="img/gal1-house11.jpg">Gallery 1: House Image #11<img width="96" height="72" class="rsTmb" src="img/gal1-house11_t.jpg" alt="" /></a>
															</div>
														</div>
													</div>
												</div>
												<!-- featured property #4 details summary info starts here -->
												<div class="col-md-4 col-sm-4">
													<div class="details-info">
														<div class="row">
															<div class="col-md-12 col-sm-12">
																<!-- edit featured property #4 details summary info (mls #) here -->
																<div class="item-id">
																	MLS #: 120876543
																</div>
																<!-- edit featured property #4 details summary info (characteristics) here -->
																<div class="characteristics">
																	<ul>
																		<li>2,750 s/f</li>
																		<li>4 Bedrooms</li>
																		<li>2.5 Baths</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6 col-sm-6">
																<!-- edit featured property #4 details summary info (listing agent image) -->
																<div class="realtor-mini">
																	<img class="img-responsive" src="img/realtor_profile.jpg" alt="">
																</div>
															</div>
															<!-- edit featured property #4 details summary info (listing agent name, address and phone number) -->
															<div class="col-md-6 col-sm-6">
																<div class="details-name">Mary Anderson</div>
																<div class="details-place">Anderson Realty</div>
																<div class="details-phone">214.435.0987</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<!-- featured listings house #4 property tabs -->
												<div class="details-tabs">
													<div class="col-md-12 col-sm-12">
														<ul class="tabs">
															<!-- edit featured listings house #4 property tab label #1 (property details) here -->
															<li class="active"><a class="styler_bg_color" href="#details4" data-toggle="tab">PROPERTY DETAILS</a></li>
															<!-- edit featured listings house #4 property tab label #2 (map) here -->
															<li><a class="styler_bg_color" href="#tab-map" data-toggle="tab">MAP</a></li>
														</ul>
														<div class="tab-content tabs_blocks">
															<div class="active" id="details4">
																<!-- featured listings house #4 property details tab info slides start here -->
																<ul class="info_slides">
																	<li class="active">
																		<!-- edit featured listings house #4 property tab info slide #1 (details) label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Details</a>
																		<!-- edit featured listings house #4 property tab info slide #1 (details) summary text here -->
																		<div class="text" style="display: block;">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #4 left-side details content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Property Type:</strong></td>
																								<td>Single Family</td>
																							</tr>
																							<tr>
																								<td><strong>Year Built:</strong></td>
																								<td>2002</td>
																							</tr>
																							<tr>
																								<td><strong>Property Class:</strong></td>
																								<td>Residential</td>
																							</tr>
																							<tr>
																								<td><strong>County:</strong></td>
																								<td>Dallas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #4 right-side details content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedrooms:</strong></td>
																								<td>4</td>
																							</tr>
																							<tr>
																								<td><strong>Baths:</strong></td>
																								<td>2.5</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Size:</strong></td>
																								<td>9,757 Sq Ft Lot</td>
																							</tr>
																							<tr>
																								<td><strong>Stories:</strong></td>
																								<td>2</td>
																							</tr>
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #4 interior slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Interior</a>
																		<!-- edit featured listings house #4 interior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #4 interior slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Living Area 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Living Area 2:</strong></td>
																								<td>14 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Dining Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Kitchen:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Master Bedroom:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #4 interior slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedroom 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 2:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 3:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Study:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Utility Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #4 exterior slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Exterior</a>
																		<!-- edit featured listings house #4 exterior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #4 exterior slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Fence:</strong></td>
																								<td>Wood</td>
																							</tr>
																							<tr>
																								<td><strong>Sprinkler System:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Dimensions:</strong></td>
																								<td>80x135</td>
																							</tr>
																							<tr>
																								<td><strong>Pool:</strong></td>
																								<td>Yes - Gunite</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #4 exterior slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Patio:</strong></td>
																								<td>Yes - Covered</td>
																							</tr>
																							<tr>
																								<td><strong>Balcony:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Gutters:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Exterior Lighting:</strong></td>
																								<td>Yes</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #4 additional details slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Additional Details</a>
																		<!-- edit featured listings house #4 exterior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #4 additional details slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																							<tr>
																								<td><strong>Cooling:</strong></td>
																								<td>Central - Electric</td>
																							</tr>
																							<tr>
																								<td><strong>Heating:</strong></td>
																								<td>Central - Gas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #4 additional details slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>School District:</strong></td>
																								<td>Richardson ISD</td>
																							</tr>
																							<tr>
																								<td><strong>Elementary School:</strong></td>
																								<td>Merriman Park</td>
																							</tr>
																							<tr>
																								<td><strong>Middle School:</strong></td>
																								<td>Lake Highlands</td>
																							</tr>
																							<tr>
																								<td><strong>High School:</strong></td>
																								<td>Lake Highlands High School</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																</ul>
															</div>
															<!-- edit featured listings house #4 map tab info here -->
															<div class="tab-map">
																<!-- begin map -->
																<div class="map" data-coordinates="32.83823,-96.775347" data-title="5321 E Mockingbird Ln, Dallas, TX 75206"></div>
																<!-- /end map -->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- featured property #5 details start here -->
									<div id="property-item5" class="property-item">
										<div class="wide-divider">
											<a class="close-details" href="javascript:void(0)"></a>
										</div>
										<div class="inner-block">

											<div class="row">
												<div class="col-md-8 col-sm-8">
													<div class="address">
														<!-- edit featured property #5 address -->
														<div class="address-top">
															6830 Hilltop Lane
														</div>    
														<div class="address-bottom">
															Dallas, TX 75280
														</div>    
													</div>                                                
												</div>
												<div class="col-md-4 col-sm-4">
													<!-- edit featured property #5 price -->
													<div class="price styler_color">
														$450,000
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8 col-sm-8">
													<div class="">
														<div class="slider-block">
															<!-- featured property #5 photo gallery starts here -->
															<div id="rs_gallery5" class="royalSlider rsDefault">
																<!-- edit featured property #5 photo #1 here -->
																<a class="rsImg bugaga" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal5-house5.jpg" href="img/gal5-house5.jpg">Gallery 5: House Image #1<img width="96" height="72" class="rsTmb" src="img/gal5-house5_t.jpg" alt="" /></a>
																<!-- edit featured property #5 photo #2 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house2.jpg" href="img/gal1-house2.jpg">Gallery 1: House Image #2<img width="96" height="72" class="rsTmb" src="img/gal1-house2_t.jpg" alt="" /></a>
																<!-- edit featured property #5 photo #3 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house3.jpg" href="img/gal1-house3.jpg">Gallery 1: House Image #3<img width="96" height="72" class="rsTmb" src="img/gal1-house3_t.jpg" alt="" /></a>
																<!-- edit featured property #5 photo #4 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house4.jpg" href="img/gal1-house4.jpg">Gallery 1: House Image #4<img width="96" height="72" class="rsTmb" src="img/gal1-house4_t.jpg" alt="" /></a>
																<!-- edit featured property #5 photo #5 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house5.jpg" href="img/gal1-house5.jpg">Gallery 1: House Image #5<img width="96" height="72" class="rsTmb" src="img/gal1-house5_t.jpg" alt="" /></a>
																<!-- edit featured property #5 photo #6 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house6.jpg" href="img/gal1-house6.jpg">Gallery 1: House Image #6<img width="96" height="72" class="rsTmb" src="img/gal1-house6_t.jpg" alt="" /></a>
																<!-- edit featured property #5 photo #7 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house7.jpg" href="img/gal1-house7.jpg">Gallery 1: House Image #7<img width="96" height="72" class="rsTmb" src="img/gal1-house7_t.jpg" alt="" /></a>
																<!-- edit featured property #5 photo #8 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house8.jpg" href="img/gal1-house8.jpg">Gallery 1: House Image #8<img width="96" height="72" class="rsTmb" src="img/gal1-house8_t.jpg" alt="" /></a>
																<!-- edit featured property #5 photo #9 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house9.jpg" href="img/gal1-house9.jpg">Gallery 1: House Image #9<img width="96" height="72" class="rsTmb" src="img/gal1-house9_t.jpg" alt="" /></a>
																<!-- edit featured property #5 photo #10 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house10.jpg" href="img/gal1-house10.jpg">Gallery 1: House Image #10<img width="96" height="72" class="rsTmb" src="img/gal1-house10_t.jpg" alt="" /></a>
																<!-- edit featured property #5 photo #11 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house11.jpg" href="img/gal1-house11.jpg">Gallery 1: House Image #11<img width="96" height="72" class="rsTmb" src="img/gal1-house11_t.jpg" alt="" /></a>
															</div>
														</div>
													</div>
												</div>
												<!-- featured property #5 details summary info starts here -->
												<div class="col-md-4 col-sm-4">
													<div class="details-info">
														<div class="row">
															<div class="col-md-12 col-sm-12">
																<!-- edit featured property #5 details summary info (mls #) here -->
																<div class="item-id">
																	MLS #: 120876765
																</div>
																<!-- edit featured property #5 details summary info (characteristics) here -->
																<div class="characteristics">
																	<ul>
																		<li>2,900 s/f</li>
																		<li>4 Bedrooms</li>
																		<li>2 Baths</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6 col-sm-6">
																<!-- edit featured property #5 details summary info (listing agent image) -->
																<div class="realtor-mini">
																	<img class="img-responsive" src="img/realtor_profile.jpg" alt="">
																</div>
															</div>
															<!-- edit featured property #5 details summary info (listing agent name, address and phone number) -->
															<div class="col-md-6 col-sm-6">
																<div class="details-name">Mary Anderson</div>
																<div class="details-place">Anderson Realty</div>
																<div class="details-phone">214.435.0987</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<!-- featured listings house #5 property tabs -->
												<div class="details-tabs">
													<div class="col-md-12 col-sm-12">
														<ul class="tabs">
															<!-- edit featured listings house #5 property tab label #1 (property details) here -->
															<li class="active"><a class="styler_bg_color" href="#details5" data-toggle="tab">PROPERTY DETAILS</a></li>
															<!-- edit featured listings house #5 property tab label #2 (map) here -->
															<li><a class="styler_bg_color" href="#tab-map" data-toggle="tab">MAP</a></li>
														</ul>
														<div class="tab-content tabs_blocks">
															<div class="active" id="details5">
																<!-- featured listings house #5 property details tab info slides start here -->
																<ul class="info_slides">
																	<!-- edit featured listings house #5 property tab info slide #1 (details) label here -->
																	<li class="active">
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Details</a>
																		<!-- edit featured listings house #5 property tab info slide #1 (details) summary text here -->
																		<div class="text" style="display: block;">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #5 left-side details content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Property Type:</strong></td>
																								<td>Single Family</td>
																							</tr>
																							<tr>
																								<td><strong>Year Built:</strong></td>
																								<td>2002</td>
																							</tr>
																							<tr>
																								<td><strong>Property Class:</strong></td>
																								<td>Residential</td>
																							</tr>
																							<tr>
																								<td><strong>County:</strong></td>
																								<td>Dallas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #5 right-side details content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedrooms:</strong></td>
																								<td>4</td>
																							</tr>
																							<tr>
																								<td><strong>Baths:</strong></td>
																								<td>2</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Size:</strong></td>
																								<td>9,757 Sq Ft Lot</td>
																							</tr>
																							<tr>
																								<td><strong>Stories:</strong></td>
																								<td>2</td>
																							</tr>
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #5 interior slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Interior</a>
																		<!-- edit featured listings house #5 interior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #5 interior slide ledft-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Living Area 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Living Area 2:</strong></td>
																								<td>14 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Dining Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Kitchen:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Master Bedroom:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #5 interior slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedroom 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 2:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 3:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Study:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Utility Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #5 exterior slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Exterior</a>
																		<!-- edit featured listings house #5 exterior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #5 exterior slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Fence:</strong></td>
																								<td>Wood</td>
																							</tr>
																							<tr>
																								<td><strong>Sprinkler System:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Dimensions:</strong></td>
																								<td>80x135</td>
																							</tr>
																							<tr>
																								<td><strong>Pool:</strong></td>
																								<td>Yes - Gunite</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #5 exterior slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Patio:</strong></td>
																								<td>Yes - Covered</td>
																							</tr>
																							<tr>
																								<td><strong>Balcony:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Gutters:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Exterior Lighting:</strong></td>
																								<td>Yes</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #5 additional details slide label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Additional Details</a>
																		<!-- edit featured listings house #5 exterior slide text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #5 additional details slide left-side content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																							<tr>
																								<td><strong>Cooling:</strong></td>
																								<td>Central - Electric</td>
																							</tr>
																							<tr>
																								<td><strong>Heating:</strong></td>
																								<td>Central - Gas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #5 additional details slide right-side content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>School District:</strong></td>
																								<td>Richardson ISD</td>
																							</tr>
																							<tr>
																								<td><strong>Elementary School:</strong></td>
																								<td>Merriman Park</td>
																							</tr>
																							<tr>
																								<td><strong>Middle School:</strong></td>
																								<td>Lake Highlands</td>
																							</tr>
																							<tr>
																								<td><strong>High School:</strong></td>
																								<td>Lake Highlands High School</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																</ul>
															</div>
															<!-- edit featured listings house #5 map tab info here -->
															<div class="tab-map">
																<!-- begin map -->
																<div class="map" data-coordinates="32.83823,-96.775347" data-title="5321 E Mockingbird Ln, Dallas, TX 75206"></div>
																<!-- /end map -->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- featured property #6 details start here -->
									<div id="property-item6" class="property-item">
										<div class="wide-divider">
											<a class="close-details" href="javascript:void(0)"></a>
										</div>
										<div class="inner-block">

											<div class="row">
												<div class="col-md-8 col-sm-8">
													<div class="address">
														<!-- edit featured property #6 address -->
														<div class="address-top">
															4433 Colfax Circle
														</div>    
														<div class="address-bottom">
															Dallas, TX 75231
														</div>    
													</div>                                                
												</div>
												<div class="col-md-4 col-sm-4">
													<!-- edit featured property #6 price -->
													<div class="price styler_color">
														$519,500
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8 col-sm-8">
													<div class="">
														<div class="slider-block">
															<!-- featured property #6 photo gallery starts here -->
															<div id="rs_gallery6" class="royalSlider rsDefault">
																<!-- edit featured property #6 photo #1 here -->
																<a class="rsImg bugaga" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal6-house6.jpg" href="img/gal6-house6.jpg">Gallery 6: House Image #6<img width="96" height="72" class="rsTmb" src="img/gal6-house6_t.jpg" alt="" /></a>
																<!-- edit featured property #2 photo #1 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house2.jpg" href="img/gal1-house2.jpg">Gallery 1: House Image #2<img width="96" height="72" class="rsTmb" src="img/gal1-house2_t.jpg" alt="" /></a>
																<!-- edit featured property #6 photo #3 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house3.jpg" href="img/gal1-house3.jpg">Gallery 1: House Image #3<img width="96" height="72" class="rsTmb" src="img/gal1-house3_t.jpg" alt="" /></a>
																<!-- edit featured property #6 photo #4 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house4.jpg" href="img/gal1-house4.jpg">Gallery 1: House Image #4<img width="96" height="72" class="rsTmb" src="img/gal1-house4_t.jpg" alt="" /></a>
																<!-- edit featured property #6 photo #5 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house5.jpg" href="img/gal1-house5.jpg">Gallery 1: House Image #5<img width="96" height="72" class="rsTmb" src="img/gal1-house5_t.jpg" alt="" /></a>
																<!-- edit featured property #6 photo #6 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house6.jpg" href="img/gal1-house6.jpg">Gallery 1: House Image #6<img width="96" height="72" class="rsTmb" src="img/gal1-house6_t.jpg" alt="" /></a>
																<!-- edit featured property #6 photo #7 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house7.jpg" href="img/gal1-house7.jpg">Gallery 1: House Image #7<img width="96" height="72" class="rsTmb" src="img/gal1-house7_t.jpg" alt="" /></a>
																<!-- edit featured property #6 photo #8 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house8.jpg" href="img/gal1-house8.jpg">Gallery 1: House Image #8<img width="96" height="72" class="rsTmb" src="img/gal1-house8_t.jpg" alt="" /></a>
																<!-- edit featured property #6 photo #9 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house9.jpg" href="img/gal1-house9.jpg">Gallery 1: House Image #9<img width="96" height="72" class="rsTmb" src="img/gal1-house9_t.jpg" alt="" /></a>
																<!-- edit featured property #6 photo #11 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house10.jpg" href="img/gal1-house10.jpg">Gallery 1: House Image #10<img width="96" height="72" class="rsTmb" src="img/gal1-house10_t.jpg" alt="" /></a>
																<!-- edit featured property #6 photo #12 here -->
																<a class="rsImg" data-rsw="540" data-rsh="374" data-rsBigImg="img/gal1-house11.jpg" href="img/gal1-house11.jpg">Gallery 1: House Image #11<img width="96" height="72" class="rsTmb" src="img/gal1-house11_t.jpg" alt="" /></a>
															</div>
														</div>
													</div>
												</div>
												<!-- featured property #6 detailas summary info starts here -->
												<div class="col-md-4 col-sm-4">
													<div class="details-info">
														<div class="row">
															<div class="col-md-12 col-sm-12">
																<!-- edit featured property #6 detailas summary info (mls #) here -->
																<div class="item-id">
																	MLS #: 12087762
																</div>
																<!-- edit featured property #6 detailas summary info (characteristics) here -->
																<div class="characteristics">
																	<ul>
																		<li>2,400 s/f</li>
																		<li>3 Bedrooms</li>
																		<li>2.5 Baths</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6 col-sm-6">
																<!-- edit featured property #6 detailas summary info (listing agent image) -->
																<div class="realtor-mini">
																	<img class="img-responsive" src="img/realtor_profile.jpg" alt="">
																</div>
															</div>
															<!-- edit featured property #6 detailas summary info (listing agent name, address and phone number) -->
															<div class="col-md-6 col-sm-6">
																<div class="details-name">Mary Anderson</div>
																<div class="details-place">Anderson Realty</div>
																<div class="details-phone">214.435.0987</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<!-- featured listings house #6 property tabs here -->
												<div class="details-tabs">
													<div class="col-md-12 col-sm-12">
														<ul class="tabs">
															<!-- edit featured listings house #6 property tab label #1 (property details) here -->
															<li class="active"><a class="styler_bg_color" href="#details6" data-toggle="tab">PROPERTY DETAILS</a></li>
															<!-- edit featured listings house #6 property tab label #2 (map) here -->
															<li><a class="styler_bg_color" href="#tab-map" data-toggle="tab">MAP</a></li>
														</ul>
														<div class="tab-content tabs_blocks">
															<div class="active" id="details6">
																<!-- featured listings house #6 property details tab info slides start here -->
																<ul class="info_slides">
																	<li class="active">
																		<!-- edit featured listings house #6 property details tab info slide #1 (details) label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Details</a>
																		<!-- edit featured listings house #6 property details tab info slide #1 (details) summary text here -->
																		<div class="text" style="display: block;">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #6 left-side details content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Property Type:</strong></td>
																								<td>Single Family</td>
																							</tr>
																							<tr>
																								<td><strong>Year Built:</strong></td>
																								<td>2002</td>
																							</tr>
																							<tr>
																								<td><strong>Property Class:</strong></td>
																								<td>Residential</td>
																							</tr>
																							<tr>
																								<td><strong>County:</strong></td>
																								<td>Dallas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #6 right-side details content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedrooms:</strong></td>
																								<td>3</td>
																							</tr>
																							<tr>
																								<td><strong>Baths:</strong></td>
																								<td>2.5</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Size:</strong></td>
																								<td>9,757 Sq Ft Lot</td>
																							</tr>
																							<tr>
																								<td><strong>Stories:</strong></td>
																								<td>2</td>
																							</tr>
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #6 interior tab label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Interior</a>
																		<!-- edit featured listings house #6 interior tab text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #6 left-side interior content here -->
																					<div class="left-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Living Area 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Living Area 2:</strong></td>
																								<td>14 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Dining Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Kitchen:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Master Bedroom:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<!-- edit featured listings house #6 right-side interior content here -->
																					<div class="right-tab-wrapper">
																						<table class="details-values">
																							<tr>
																								<td><strong>Bedroom 1:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 2:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Bedroom 3:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Study:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																							<tr>
																								<td><strong>Utility Room:</strong></td>
																								<td>22 x 24</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #6 exterior tab label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Exterior</a>
																		<!-- edit featured listings house #6 exterior tab text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<div class="left-tab-wrapper">
																						<!-- edit featured listings house #6 left-side exterior content here -->
																						<table class="details-values">
																							<tr>
																								<td><strong>Fence:</strong></td>
																								<td>Wood</td>
																							</tr>
																							<tr>
																								<td><strong>Sprinkler System:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Lot Dimensions:</strong></td>
																								<td>80x135</td>
																							</tr>
																							<tr>
																								<td><strong>Pool:</strong></td>
																								<td>Yes - Gunite</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<div class="right-tab-wrapper">
																						<!-- edit featured listings house #6 right-side exterior content here -->
																						<table class="details-values">
																							<tr>
																								<td><strong>Patio:</strong></td>
																								<td>Yes - Covered</td>
																							</tr>
																							<tr>
																								<td><strong>Balcony:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Gutters:</strong></td>
																								<td>Yes</td>
																							</tr>
																							<tr>
																								<td><strong>Exterior Lighting:</strong></td>
																								<td>Yes</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																	<li>
																		<!-- edit featured listings house #6 additional details tab label here -->
																		<a href="#" class="styler_color"><i class="arr styler_color"></i>Additional Details</a>
																		<!-- edit featured listings house #6 additional details tab text summary here -->
																		<div class="text">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce bibendum neque quis congue bibendum. Suspendisse vitae velit diam. Nulla vestibulum interdum lectus in vulputate. Cras et enim at lacus hendrerit condimentum. Vivamus sed nisi luctus metus bibendum semper. Etiam at facilisis ipsum. Etiam rutrum mi eget sem suscipit pellentesque. Aenean lobortis commodo eros ut sollicitudin.</p>
																			<div class="row">
																				<div class="col-md-6 col-sm-6">
																					<div class="left-tab-wrapper">
																						<!-- edit featured listings house #6 right-side additional details content here -->
																						<table class="details-values">
																							<tr>
																								<td><strong>Garage:</strong></td>
																								<td>2 Car</td>
																							</tr>
																							<tr>
																								<td><strong>Cooling:</strong></td>
																								<td>Central - Electric</td>
																							</tr>
																							<tr>
																								<td><strong>Heating:</strong></td>
																								<td>Central - Gas</td>
																							</tr>
																							<tr>
																								<td><strong>Subdivision:</strong></td>
																								<td>Woodlawn</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																				<div class="col-md-6 col-sm-6">
																					<div class="right-tab-wrapper">
																						<!-- edit featured listings house #6 right-side additional details content here -->
																						<table class="details-values">
																							<tr>
																								<td><strong>School District:</strong></td>
																								<td>Richardson ISD</td>
																							</tr>
																							<tr>
																								<td><strong>Elementary School:</strong></td>
																								<td>Merriman Park</td>
																							</tr>
																							<tr>
																								<td><strong>Middle School:</strong></td>
																								<td>Lake Highlands</td>
																							</tr>
																							<tr>
																								<td><strong>High School:</strong></td>
																								<td>Lake Highlands High School</td>
																							</tr>
																						</table>
																					</div>
																				</div>
																			</div>
																		</div>
																	</li>                                                                
																</ul>
															</div>
															<!-- edit featured listings house #6 map tab info here -->
															<div class="tab-map">
																<!-- begin map -->
																<div class="map" data-coordinates="32.83823,-96.775347" data-title="5321 E Mockingbird Ln, Dallas, TX 75206"></div>
																<!-- /end map -->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /end featured listings block -->





								<!-- MLS Search form starts here=================================================================
								================================================================================================
								====================================================================================================
								====================================================================================================
								==================================================================================================-->
								<div class="container">
									<div class="promo-block">
										<h2 class="block-title styler_color">Advanced Las Vegas MLS Search</h2>
									</div>	
									<div class="block-separator clearfix"></div>
									<div class="row">
										<div class="col-xs-12">    
											<div class="row">

												<div name="searchform" class="col-xs-12 col-md-12 col-lg-8">
													<div class="content-box">
														<h2 class="blue-plate">Las Vegas Real Estate Search - Nevada</h2>
														<div class="wrap">
															<form id="searchform" class="form-horizontal" name="form" method="post" action="/search_result.php">
																<input type="hidden" value="1" name="dosearch">
																<input type="hidden" value="default" name="searchtype">

																<div class="form-group">                
																	<label class="control-label col-xs-12 col-sm-5 col-md-4">Location <span class="required">(Required)</span>:</label>
																	<div class="col-xs-12 col-sm-7 col-md-8">
																		<select name="city" class="form-control">
																			<option value="">Pick a City</option>
																			<option value="LASVEGAS">Las Vegas</option>
																			<option value="NORTHLASVEGAS">North Las Vegas</option>
																			<option value="PAHRUMP">Pahrump</option>
																			<option value="BOULDERCITY">Boulder City</option>
																			<option value="ELY">Ely</option>
																			<option value="OVERTON">Overton</option>
																			<option value="LOGANDALE">Logandale</option>
																			<option value="LAUGHLIN">Laughlin</option>
																			<option value="MESQUITE">Mesquite</option>
																			<option value="MCGILL">McGill</option>
																			<option value="INDIANSPRINGS">Indian Springs</option>
																			<option value="CALIENTE">Caliente</option>
																			<option value="PIOCHE">Pioche</option>
																			<option value="SANDYVALLEY">Sandy Valley</option>
																			<option value="OTHER">Other</option>
																		</select>
																	</div>
																</div>

																<div class="form-group">                
																	<label class="control-label col-xs-12 col-sm-5 col-md-4">Property Type:</label>
																	<div class="col-xs-12 col-sm-7 col-md-8">
																		<select name="type" class="form-control">
																			<option value="">Any</option>
																			<option value="home">Home</option>
																			<option value="townhomes">Townhouse</option>
																			<option value="condo">Condominium</option>
																			<option value="rental">Hi-Rise</option>
																			<option value="vacantland">Vacant Land</option>
																		</select>
																	</div>
																</div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-5 col-md-4">Price Range:</label>
																	<div class="col-xs-12 col-sm-7 col-md-8 from-to">
																		<select name="price_from" class="form-control">
																			<option value="">0</option>
																			<option value="1000">$1,000</option>
																			<option value="2000">$2,000</option>
																			<option value="3000">$3,000</option>
																			<option value="50000">$50,000</option>
																			<option value="100000">$100,000</option>
																			<option value="150000">$150,000</option>
																			<option value="200000">$200,000</option>
																			<option value="250000">$250,000</option>
																			<option value="300000">$300,000</option>
																			<option value="350000">$350,000</option>
																			<option value="400000">$400,000</option>
																			<option value="450000">$450,000</option>
																			<option value="500000">$500,000</option>
																			<option value="550000">$550,000</option>
																			<option value="600000">$600,000</option>
																			<option value="650000">$650,000</option>
																			<option value="700000">$700,000</option>
																			<option value="750000">$750,000</option>
																			<option value="800000">$800,000</option>
																			<option value="850000">$850,000</option>
																			<option value="900000">$900,000</option>
																			<option value="950000">$950,000</option>
																			<option value="1000000">$1,000,000</option>
																			<option value="1050000">$1,050,000</option>
																			<option value="1100000">$1,100,000</option>
																			<option value="1150000">$1,150,000</option>
																			<option value="1200000">$1,200,000</option>
																			<option value="1250000">$1,250,000</option>
																			<option value="1300000">$1,300,000</option>
																			<option value="1350000">$1,350,000</option>
																			<option value="1400000">$1,400,000</option>
																			<option value="1450000">$1,450,000</option>
																			<option value="1500000">$1,500,000</option>
																			<option value="1550000">$1,550,000</option>
																			<option value="1600000">$1,600,000</option>
																			<option value="1650000">$1,650,000</option>
																			<option value="1700000">$1,700,000</option>
																			<option value="1750000">$1,750,000</option>
																			<option value="1800000">$1,800,000</option>
																			<option value="1850000">$1,850,000</option>
																			<option value="1900000">$1,900,000</option>
																			<option value="1950000">$1,950,000</option>
																			<option value="2000000">$2,000,000</option>
																			<option value="2050000">$2,050,000</option>
																			<option value="2100000">$2,100,000</option>
																			<option value="2150000">$2,150,000</option>
																			<option value="2200000">$2,200,000</option>
																			<option value="2250000">$2,250,000</option>
																			<option value="2300000">$2,300,000</option>
																			<option value="2350000">$2,350,000</option>
																			<option value="2400000">$2,400,000</option>
																			<option value="2450000">$2,450,000</option>
																			<option value="2500000">$2,500,000</option>
																			<option value="2550000">$2,550,000</option>
																			<option value="2600000">$2,600,000</option>
																			<option value="2650000">$2,650,000</option>
																			<option value="2700000">$2,700,000</option>
																			<option value="2750000">$2,750,000</option>
																			<option value="2800000">$2,800,000</option>
																			<option value="2850000">$2,850,000</option>
																			<option value="2900000">$2,900,000</option>
																			<option value="2950000">$2,950,000</option>
																			<option value="3000000">$3,000,000</option>
																			<option value="3050000">$3,050,000</option>
																			<option value="3100000">$3,100,000</option>
																			<option value="3150000">$3,150,000</option>
																			<option value="3200000">$3,200,000</option>
																			<option value="3250000">$3,250,000</option>
																			<option value="3300000">$3,300,000</option>
																			<option value="3350000">$3,350,000</option>
																			<option value="3400000">$3,400,000</option>
																			<option value="3450000">$3,450,000</option>
																			<option value="3500000">$3,500,000</option>
																			<option value="3550000">$3,550,000</option>
																			<option value="3600000">$3,600,000</option>
																			<option value="3650000">$3,650,000</option>
																			<option value="3700000">$3,700,000</option>
																			<option value="3750000">$3,750,000</option>
																			<option value="3800000">$3,800,000</option>
																			<option value="3850000">$3,850,000</option>
																			<option value="3900000">$3,900,000</option>
																			<option value="3950000">$3,950,000</option>
																			<option value="4000000">$4,000,000</option>
																			<option value="4050000">$4,050,000</option>
																			<option value="4100000">$4,100,000</option>
																			<option value="4150000">$4,150,000</option>
																			<option value="4200000">$4,200,000</option>
																			<option value="4250000">$4,250,000</option>
																			<option value="4300000">$4,300,000</option>
																			<option value="4350000">$4,350,000</option>
																			<option value="4400000">$4,400,000</option>
																			<option value="4450000">$4,450,000</option>
																			<option value="4500000">$4,500,000</option>
																			<option value="4550000">$4,550,000</option>
																			<option value="4600000">$4,600,000</option>
																			<option value="4650000">$4,650,000</option>
																			<option value="4700000">$4,700,000</option>
																			<option value="4750000">$4,750,000</option>
																			<option value="4800000">$4,800,000</option>
																			<option value="4850000">$4,850,000</option>
																			<option value="4900000">$4,900,000</option>
																			<option value="4950000">$4,950,000</option>
																			<option value="5000000">$5,000,000</option>
																			<option value="5050000">$5,050,000</option>
																			<option value="5100000">$5,100,000</option>
																			<option value="5150000">$5,150,000</option>
																			<option value="5200000">$5,200,000</option>
																			<option value="5250000">$5,250,000</option>
																			<option value="5300000">$5,300,000</option>
																			<option value="5350000">$5,350,000</option>
																			<option value="5400000">$5,400,000</option>
																			<option value="5450000">$5,450,000</option>
																			<option value="5500000">$5,500,000</option>
																			<option value="5550000">$5,550,000</option>
																			<option value="5600000">$5,600,000</option>
																			<option value="5650000">$5,650,000</option>
																			<option value="5700000">$5,700,000</option>
																			<option value="5750000">$5,750,000</option>
																			<option value="5800000">$5,800,000</option>
																			<option value="5850000">$5,850,000</option>
																			<option value="5900000">$5,900,000</option>
																			<option value="5950000">$5,950,000</option>
																			<option value="6000000">$6,000,000</option>
																			<option value="6050000">$6,050,000</option>
																			<option value="6100000">$6,100,000</option>
																			<option value="6150000">$6,150,000</option>
																			<option value="6200000">$6,200,000</option>
																			<option value="6250000">$6,250,000</option>
																			<option value="6300000">$6,300,000</option>
																			<option value="6350000">$6,350,000</option>
																			<option value="6400000">$6,400,000</option>
																			<option value="6450000">$6,450,000</option>
																			<option value="6500000">$6,500,000</option>
																			<option value="6550000">$6,550,000</option>
																			<option value="6600000">$6,600,000</option>
																			<option value="6650000">$6,650,000</option>
																			<option value="6700000">$6,700,000</option>
																			<option value="6750000">$6,750,000</option>
																			<option value="6800000">$6,800,000</option>
																			<option value="6850000">$6,850,000</option>
																			<option value="6900000">$6,900,000</option>
																			<option value="6950000">$6,950,000</option>
																			<option value="7000000">$7,000,000</option>
																			<option value="7050000">$7,050,000</option>
																			<option value="7100000">$7,100,000</option>
																			<option value="7150000">$7,150,000</option>
																			<option value="7200000">$7,200,000</option>
																			<option value="7250000">$7,250,000</option>
																			<option value="7300000">$7,300,000</option>
																			<option value="7350000">$7,350,000</option>
																			<option value="7400000">$7,400,000</option>
																			<option value="7450000">$7,450,000</option>
																			<option value="7500000">$7,500,000</option>
																			<option value="7550000">$7,550,000</option>
																			<option value="7600000">$7,600,000</option>
																			<option value="7650000">$7,650,000</option>
																			<option value="7700000">$7,700,000</option>
																			<option value="7750000">$7,750,000</option>
																			<option value="7800000">$7,800,000</option>
																			<option value="7850000">$7,850,000</option>
																			<option value="7900000">$7,900,000</option>
																			<option value="7950000">$7,950,000</option>
																			<option value="8000000">$8,000,000</option>
																			<option value="8050000">$8,050,000</option>
																			<option value="8100000">$8,100,000</option>
																			<option value="8150000">$8,150,000</option>
																			<option value="8200000">$8,200,000</option>
																			<option value="8250000">$8,250,000</option>
																			<option value="8300000">$8,300,000</option>
																			<option value="8350000">$8,350,000</option>
																			<option value="8400000">$8,400,000</option>
																			<option value="8450000">$8,450,000</option>
																			<option value="8500000">$8,500,000</option>
																			<option value="8550000">$8,550,000</option>
																			<option value="8600000">$8,600,000</option>
																			<option value="8650000">$8,650,000</option>
																			<option value="8700000">$8,700,000</option>
																			<option value="8750000">$8,750,000</option>
																			<option value="8800000">$8,800,000</option>
																			<option value="8850000">$8,850,000</option>
																			<option value="8900000">$8,900,000</option>
																			<option value="8950000">$8,950,000</option>
																			<option value="9000000">$9,000,000</option>
																			<option value="9050000">$9,050,000</option>
																			<option value="9100000">$9,100,000</option>
																			<option value="9150000">$9,150,000</option>
																			<option value="9200000">$9,200,000</option>
																			<option value="9250000">$9,250,000</option>
																			<option value="9300000">$9,300,000</option>
																			<option value="9350000">$9,350,000</option>
																			<option value="9400000">$9,400,000</option>
																			<option value="9450000">$9,450,000</option>
																			<option value="9500000">$9,500,000</option>
																			<option value="9550000">$9,550,000</option>
																			<option value="9600000">$9,600,000</option>
																			<option value="9650000">$9,650,000</option>
																			<option value="9700000">$9,700,000</option>
																			<option value="9750000">$9,750,000</option>
																			<option value="9800000">$9,800,000</option>
																			<option value="9850000">$9,850,000</option>
																			<option value="9900000">$9,900,000</option>
																			<option value="9950000">$9,950,000</option>
																			<option value="10000000">$10,000,000</option>
																		</select>           
																		<span>to</span>
																		<select name="price_to" class="form-control">
																			<option value="">Any</option>
																			<option value="1000">$1,000</option>
																			<option value="2000">$2,000</option>
																			<option value="3000">$3,000</option>
																			<option value="50000">$50,000</option>
																			<option value="100000">$100,000</option>
																			<option value="150000">$150,000</option>
																			<option value="200000">$200,000</option>
																			<option value="250000">$250,000</option>
																			<option value="300000">$300,000</option>
																			<option value="350000">$350,000</option>
																			<option value="400000">$400,000</option>
																			<option value="450000">$450,000</option>
																			<option value="500000">$500,000</option>
																			<option value="550000">$550,000</option>
																			<option value="600000">$600,000</option>
																			<option value="650000">$650,000</option>
																			<option value="700000">$700,000</option>
																			<option value="750000">$750,000</option>
																			<option value="800000">$800,000</option>
																			<option value="850000">$850,000</option>
																			<option value="900000">$900,000</option>
																			<option value="950000">$950,000</option>
																			<option value="1000000">$1,000,000</option>
																			<option value="1050000">$1,050,000</option>
																			<option value="1100000">$1,100,000</option>
																			<option value="1150000">$1,150,000</option>
																			<option value="1200000">$1,200,000</option>
																			<option value="1250000">$1,250,000</option>
																			<option value="1300000">$1,300,000</option>
																			<option value="1350000">$1,350,000</option>
																			<option value="1400000">$1,400,000</option>
																			<option value="1450000">$1,450,000</option>
																			<option value="1500000">$1,500,000</option>
																			<option value="1550000">$1,550,000</option>
																			<option value="1600000">$1,600,000</option>
																			<option value="1650000">$1,650,000</option>
																			<option value="1700000">$1,700,000</option>
																			<option value="1750000">$1,750,000</option>
																			<option value="1800000">$1,800,000</option>
																			<option value="1850000">$1,850,000</option>
																			<option value="1900000">$1,900,000</option>
																			<option value="1950000">$1,950,000</option>
																			<option value="2000000">$2,000,000</option>
																			<option value="2050000">$2,050,000</option>
																			<option value="2100000">$2,100,000</option>
																			<option value="2150000">$2,150,000</option>
																			<option value="2200000">$2,200,000</option>
																			<option value="2250000">$2,250,000</option>
																			<option value="2300000">$2,300,000</option>
																			<option value="2350000">$2,350,000</option>
																			<option value="2400000">$2,400,000</option>
																			<option value="2450000">$2,450,000</option>
																			<option value="2500000">$2,500,000</option>
																			<option value="2550000">$2,550,000</option>
																			<option value="2600000">$2,600,000</option>
																			<option value="2650000">$2,650,000</option>
																			<option value="2700000">$2,700,000</option>
																			<option value="2750000">$2,750,000</option>
																			<option value="2800000">$2,800,000</option>
																			<option value="2850000">$2,850,000</option>
																			<option value="2900000">$2,900,000</option>
																			<option value="2950000">$2,950,000</option>
																			<option value="3000000">$3,000,000</option>
																			<option value="3050000">$3,050,000</option>
																			<option value="3100000">$3,100,000</option>
																			<option value="3150000">$3,150,000</option>
																			<option value="3200000">$3,200,000</option>
																			<option value="3250000">$3,250,000</option>
																			<option value="3300000">$3,300,000</option>
																			<option value="3350000">$3,350,000</option>
																			<option value="3400000">$3,400,000</option>
																			<option value="3450000">$3,450,000</option>
																			<option value="3500000">$3,500,000</option>
																			<option value="3550000">$3,550,000</option>
																			<option value="3600000">$3,600,000</option>
																			<option value="3650000">$3,650,000</option>
																			<option value="3700000">$3,700,000</option>
																			<option value="3750000">$3,750,000</option>
																			<option value="3800000">$3,800,000</option>
																			<option value="3850000">$3,850,000</option>
																			<option value="3900000">$3,900,000</option>
																			<option value="3950000">$3,950,000</option>
																			<option value="4000000">$4,000,000</option>
																			<option value="4050000">$4,050,000</option>
																			<option value="4100000">$4,100,000</option>
																			<option value="4150000">$4,150,000</option>
																			<option value="4200000">$4,200,000</option>
																			<option value="4250000">$4,250,000</option>
																			<option value="4300000">$4,300,000</option>
																			<option value="4350000">$4,350,000</option>
																			<option value="4400000">$4,400,000</option>
																			<option value="4450000">$4,450,000</option>
																			<option value="4500000">$4,500,000</option>
																			<option value="4550000">$4,550,000</option>
																			<option value="4600000">$4,600,000</option>
																			<option value="4650000">$4,650,000</option>
																			<option value="4700000">$4,700,000</option>
																			<option value="4750000">$4,750,000</option>
																			<option value="4800000">$4,800,000</option>
																			<option value="4850000">$4,850,000</option>
																			<option value="4900000">$4,900,000</option>
																			<option value="4950000">$4,950,000</option>
																			<option value="5000000">$5,000,000</option>
																			<option value="5050000">$5,050,000</option>
																			<option value="5100000">$5,100,000</option>
																			<option value="5150000">$5,150,000</option>
																			<option value="5200000">$5,200,000</option>
																			<option value="5250000">$5,250,000</option>
																			<option value="5300000">$5,300,000</option>
																			<option value="5350000">$5,350,000</option>
																			<option value="5400000">$5,400,000</option>
																			<option value="5450000">$5,450,000</option>
																			<option value="5500000">$5,500,000</option>
																			<option value="5550000">$5,550,000</option>
																			<option value="5600000">$5,600,000</option>
																			<option value="5650000">$5,650,000</option>
																			<option value="5700000">$5,700,000</option>
																			<option value="5750000">$5,750,000</option>
																			<option value="5800000">$5,800,000</option>
																			<option value="5850000">$5,850,000</option>
																			<option value="5900000">$5,900,000</option>
																			<option value="5950000">$5,950,000</option>
																			<option value="6000000">$6,000,000</option>
																			<option value="6050000">$6,050,000</option>
																			<option value="6100000">$6,100,000</option>
																			<option value="6150000">$6,150,000</option>
																			<option value="6200000">$6,200,000</option>
																			<option value="6250000">$6,250,000</option>
																			<option value="6300000">$6,300,000</option>
																			<option value="6350000">$6,350,000</option>
																			<option value="6400000">$6,400,000</option>
																			<option value="6450000">$6,450,000</option>
																			<option value="6500000">$6,500,000</option>
																			<option value="6550000">$6,550,000</option>
																			<option value="6600000">$6,600,000</option>
																			<option value="6650000">$6,650,000</option>
																			<option value="6700000">$6,700,000</option>
																			<option value="6750000">$6,750,000</option>
																			<option value="6800000">$6,800,000</option>
																			<option value="6850000">$6,850,000</option>
																			<option value="6900000">$6,900,000</option>
																			<option value="6950000">$6,950,000</option>
																			<option value="7000000">$7,000,000</option>
																			<option value="7050000">$7,050,000</option>
																			<option value="7100000">$7,100,000</option>
																			<option value="7150000">$7,150,000</option>
																			<option value="7200000">$7,200,000</option>
																			<option value="7250000">$7,250,000</option>
																			<option value="7300000">$7,300,000</option>
																			<option value="7350000">$7,350,000</option>
																			<option value="7400000">$7,400,000</option>
																			<option value="7450000">$7,450,000</option>
																			<option value="7500000">$7,500,000</option>
																			<option value="7550000">$7,550,000</option>
																			<option value="7600000">$7,600,000</option>
																			<option value="7650000">$7,650,000</option>
																			<option value="7700000">$7,700,000</option>
																			<option value="7750000">$7,750,000</option>
																			<option value="7800000">$7,800,000</option>
																			<option value="7850000">$7,850,000</option>
																			<option value="7900000">$7,900,000</option>
																			<option value="7950000">$7,950,000</option>
																			<option value="8000000">$8,000,000</option>
																			<option value="8050000">$8,050,000</option>
																			<option value="8100000">$8,100,000</option>
																			<option value="8150000">$8,150,000</option>
																			<option value="8200000">$8,200,000</option>
																			<option value="8250000">$8,250,000</option>
																			<option value="8300000">$8,300,000</option>
																			<option value="8350000">$8,350,000</option>
																			<option value="8400000">$8,400,000</option>
																			<option value="8450000">$8,450,000</option>
																			<option value="8500000">$8,500,000</option>
																			<option value="8550000">$8,550,000</option>
																			<option value="8600000">$8,600,000</option>
																			<option value="8650000">$8,650,000</option>
																			<option value="8700000">$8,700,000</option>
																			<option value="8750000">$8,750,000</option>
																			<option value="8800000">$8,800,000</option>
																			<option value="8850000">$8,850,000</option>
																			<option value="8900000">$8,900,000</option>
																			<option value="8950000">$8,950,000</option>
																			<option value="9000000">$9,000,000</option>
																			<option value="9050000">$9,050,000</option>
																			<option value="9100000">$9,100,000</option>
																			<option value="9150000">$9,150,000</option>
																			<option value="9200000">$9,200,000</option>
																			<option value="9250000">$9,250,000</option>
																			<option value="9300000">$9,300,000</option>
																			<option value="9350000">$9,350,000</option>
																			<option value="9400000">$9,400,000</option>
																			<option value="9450000">$9,450,000</option>
																			<option value="9500000">$9,500,000</option>
																			<option value="9550000">$9,550,000</option>
																			<option value="9600000">$9,600,000</option>
																			<option value="9650000">$9,650,000</option>
																			<option value="9700000">$9,700,000</option>
																			<option value="9750000">$9,750,000</option>
																			<option value="9800000">$9,800,000</option>
																			<option value="9850000">$9,850,000</option>
																			<option value="9900000">$9,900,000</option>
																			<option value="9950000">$9,950,000</option>
																			<option value="10000000">$10,000,000</option>
																		</select>
																	</div>
																</div>

																<div class="form-group">                    
																	<label class="control-label col-xs-12 col-sm-5 col-md-4">Footage:</label>
																	<div class="col-xs-12 col-sm-7 col-md-8 from-to">
																		<select name="footage_from" class="form-control">
																			<option value="">0</option>
																			<option value="500">500</option>
																			<option value="1000">1,000</option>
																			<option value="1500">1,500</option>
																			<option value="2000">2,000</option>
																			<option value="2000">2,000</option>
																			<option value="3000">3,000</option>
																			<option value="4000">4,000</option>
																			<option value="5000">5,000</option>
																			<option value="6000">6,000</option>
																			<option value="7000">7,000</option>
																			<option value="7000">7,000</option>
																			<option value="8500">8,500</option>
																			<option value="10000">10,000</option>
																		</select>           
																		<span>to</span>
																		<select name="footage_to" class="form-control">
																			<option value="">Any</option>
																			<option value="500">500</option>
																			<option value="1000">1,000</option>
																			<option value="1500">1,500</option>
																			<option value="2000">2,000</option>
																			<option value="2000">2,000</option>
																			<option value="3000">3,000</option>
																			<option value="4000">4,000</option>
																			<option value="5000">5,000</option>
																			<option value="6000">6,000</option>
																			<option value="7000">7,000</option>
																			<option value="7000">7,000</option>
																			<option value="8500">8,500</option>
																			<option value="10000">10,000</option>
																		</select>
																	</div>
																</div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-5 col-md-4">Year Built:</label>
																	<div class="col-xs-12 col-sm-7 col-md-8 from-to">
																		<select name="year_from" class="form-control">
																			<option value="">Any</option>
																			<option value="1900">1900</option>
																			<option value="1910">1910</option>
																			<option value="1920">1920</option>
																			<option value="1930">1930</option>
																			<option value="1940">1940</option>
																			<option value="1950">1950</option>
																			<option value="1960">1960</option>
																			<option value="1970">1970</option>
																			<option value="1980">1980</option>
																			<option value="1990">1990</option>
																			<option value="2000">2000</option>
																			<option value="2000">2000</option>
																			<option value="2001">2001</option>
																			<option value="2002">2002</option>
																			<option value="2003">2003</option>
																			<option value="2004">2004</option>
																			<option value="2005">2005</option>
																			<option value="2006">2006</option>
																			<option value="2007">2007</option>
																			<option value="2008">2008</option>
																			<option value="2009">2009</option>
																			<option value="2010">2010</option>
																			<option value="2011">2011</option>
																			<option value="2012">2012</option>
																			<option value="2013">2013</option>
																			<option value="2014">2014</option>
																			<option value="2015">2015</option>
																			<option value="2016">2016</option>
																		</select>
																		<span>to</span>
																		<select name="year_to" class="form-control">
																			<option value="">Any</option>
																			<option value="1900">1900</option>
																			<option value="1910">1910</option>
																			<option value="1920">1920</option>
																			<option value="1930">1930</option>
																			<option value="1940">1940</option>
																			<option value="1950">1950</option>
																			<option value="1960">1960</option>
																			<option value="1970">1970</option>
																			<option value="1980">1980</option>
																			<option value="1990">1990</option>
																			<option value="2000">2000</option>
																			<option value="2000">2000</option>
																			<option value="2001">2001</option>
																			<option value="2002">2002</option>
																			<option value="2003">2003</option>
																			<option value="2004">2004</option>
																			<option value="2005">2005</option>
																			<option value="2006">2006</option>
																			<option value="2007">2007</option>
																			<option value="2008">2008</option>
																			<option value="2009">2009</option>
																			<option value="2010">2010</option>
																			<option value="2011">2011</option>
																			<option value="2012">2012</option>
																			<option value="2013">2013</option>
																			<option value="2014">2014</option>
																			<option value="2015">2015</option>
																			<option value="2016">2016</option>
																		</select>
																	</div>
																</div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-5 col-md-4">Bedrooms:</label>
																	<div class="col-xs-12 col-sm-7 col-md-8 from-to">
																		<select name="bedrooms_from" class="form-control">
																			<option value="">Any</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>
																			<option value="6">6</option>
																			<option value="7">7</option>
																			<option value="8">8</option>
																			<option value="9">9</option>
																			<option value="10">10</option>
																		</select>
																		<span>to</span>
																		<select name="bedrooms_to" class="form-control">
																			<option value="">Any</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>
																			<option value="6">6</option>
																			<option value="7">7</option>
																			<option value="8">8</option>
																			<option value="9">9</option>
																			<option value="10">10</option>
																		</select>
																	</div>
																</div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-5 col-md-4">Bathrooms:</label>
																	<div class="col-xs-12 col-sm-7 col-md-8 from-to">
																		<select name="bathrooms_from" class="form-control">
																			<option value="">Any</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>
																			<option value="6">6</option>
																			<option value="7">7</option>
																			<option value="8">8</option>
																			<option value="9">9</option>
																			<option value="10">10</option>
																		</select>
																		<span>to</span>
																		<select name="bathrooms_to" class="form-control">
																			<option value="">Any</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>
																			<option value="6">6</option>
																			<option value="7">7</option>
																			<option value="8">8</option>
																			<option value="9">9</option>
																			<option value="10">10</option>
																		</select>
																	</div>
																</div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-5 col-md-4">Water Front Property:</label>
																	<div class="col-xs-12 col-sm-7 col-md-8">
																		<select name="waterFrontPresent" class="form-control">
																			<option value="">Show All</option>
																			<option>Yes</option> 
																			<option>No</option> 
																		</select>
																	</div>
																</div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-5 col-md-4">Foreclosure/Short Sale:</label>
																	<div class="col-xs-12 col-sm-7 col-md-8">
																		<select name="foreclosure" class="form-control">
																			<option value="">Show All</option>
																			<option>Yes</option> 
																			<option>No</option>
																		</select>
																	</div>
																</div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-5 col-md-4">55+ Community:</label>
																	<div class="col-xs-12 col-sm-7 col-md-8">
																		<select name="adult_community" class="form-control"> 
																			<option value="">Show All</option>
																			<option>Yes</option> 
																			<option>No</option>
																		</select>
																	</div>
																</div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-5 col-md-4">Swimming Pool:</label>
																	<div class="col-xs-12 col-sm-7 col-md-8">
																		<select name="pool" class="form-control">
																			<option value="">Any</option>
																			<option value="None">None</option>
																			<option value="Private">Private</option>
																			<option value="Community">Community</option>
																			<option value="Community &amp; Private">Community &amp; Private</option>
																		</select>
																	</div>
																</div>

																<button class="btn btn-sm styler_bg_color btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseExample">
																	More Search Options <i class="fa fa-chevron-up"></i>
																</button>

																<div class="clear"></div>

																<div class="collapse" id="collapseSearch">

																	<br>

																	<label>Interior Features:</label>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">  
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Bar">
																				</span>
																				Bar                                 </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Breakfast Nook">
																				</span>
																				Breakfast Nook                                  </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Closet - Walk-Ins">
																				</span>
																				Closet - Walk-Ins                                   </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Computer Wired">
																				</span>
																				Computer Wired                                  </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Cook Island">
																				</span>
																				Cook Island                                 </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Handicap Features">
																				</span>
																				Handicap Features                                   </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Kitchen - Eat In">
																				</span>
																				Kitchen - Eat In                                    </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Kitchen - Island">
																				</span>
																				Kitchen - Island                                    </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Laundry in Garage">
																				</span>
																				Laundry in Garage                                   </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Living/Dining Combo">
																				</span>
																				Living/Dining Combo                                 </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Office">
																				</span>
																				Office                                  </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Outside Storage">
																				</span>
																				Outside Storage                                 </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Pantry">
																				</span>
																				Pantry                                  </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Pantry - Butler">
																				</span>
																				Pantry - Butler                                 </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Pantry - Walk-in">
																				</span>
																				Pantry - Walk-in                                    </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Pull Down Stairs">
																				</span>
																				Pull Down Stairs                                    </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Sky Light(s)">
																				</span>
																				Sky Light(s)                                    </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Solar Tubes">
																				</span>
																				Solar Tubes                                 </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="interior_features[]" type="checkbox" value="Storage">
																				</span>
																				Storage                                 </div>
																		</div>
																	</div>

																	<hr class="dotted">

																	<label>Exterior Features:</label>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Balcony">
																				</span>
																				Balcony                                 </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Barbeque">
																				</span>
																				Barbeque                                    </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Breezeway">
																				</span>
																				Breezeway                                   </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Courtyard">
																				</span>
																				Courtyard                                   </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Deck">
																				</span>
																				Deck                                    </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Fence">
																				</span>
																				Fence                                   </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Fire Pit">
																				</span>
																				Fire Pit                                    </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Gazebo">
																				</span>
																				Gazebo                                  </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Outdoor Shower">
																				</span>
																				Outdoor Shower                                  </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Patio">
																				</span>
																				Patio                                   </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Porch">
																				</span>
																				Porch                                   </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Sprinkler">
																				</span>
																				Sprinkler                                   </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Storage/Shed">
																				</span>
																				Storage/Shed                                    </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Storm Shutters">
																				</span>
																				Storm Shutters                                  </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Tennis Court">
																				</span>
																				Tennis Court                                    </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Well">
																				</span>
																				Well                                    </div>
																		</div>
																		<div class="col-xs-12 col-sm-6 col-md-4">
																			<div class="checkbox-inline">
																				<span class="check-btn">
																					<input name="exterior_features[]" type="checkbox" value="Workshop">
																				</span>
																				Workshop                                    </div>
																		</div>
																	</div>

																</div>

																<hr class="dotted">

																<div class="form-group " style="margin-bottom: 0;">
																	<div class="col-xs-12 ">
																		<button type="submit" class="btn styler_bg_color btn-block-sm pull-right">Search MLS</button>
																		<button type="reset" class="btn btn-beige btn-block-sm pull-right">Reset Form</button>
																		
																	</div>

																</div>

															</form>
														</div>
													</div>
												</div> 

												<div class="col-xs-12 col-md-12 col-lg-4">
													<div class="row">
														<div class="col-xs-12 col-sm-12 col-md-4 col-lg-12">
															<div class="content-box equal-1" style="height: auto;"> 
																<h2 class="blue-plate">Search by Street</h2>
																<div class="wrap">
																	<form action="/search_result.php" method="POST" class="form-horizontal" id="bymlsform">
																		<input type="hidden" value="1" name="dosearch">
																		<input type="hidden" value="address" name="searchtype">

																		<div class="form-group">
																			<label class="col-xs-12" style="text-align: left;">Street Name:</label>
																			<div class="col-xs-12">
																				<input class="form-control" name="streetName" size="10" value="">
																			</div>
																		</div>

																		<div class="form-group">
																			<label class="col-xs-12" style="text-align: left;">Select City:</label>
																			<div class="col-xs-12">
																				<select class="form-control" name="city">
																					<option value="">Pick a City</option>
																					<option value="LASVEGAS">Las Vegas</option>
																					<option value="NORTHLASVEGAS">North Las Vegas</option>
																					<option value="PAHRUMP">Pahrump</option>
																					<option value="BOULDERCITY">Boulder City</option>
																					<option value="ELY">Ely</option>
																					<option value="OVERTON">Overton</option>
																					<option value="LOGANDALE">Logandale</option>
																					<option value="LAUGHLIN">Laughlin</option>
																					<option value="MESQUITE">Mesquite</option>
																					<option value="MCGILL">McGill</option>
																					<option value="INDIANSPRINGS">Indian Springs</option>
																					<option value="CALIENTE">Caliente</option>
																					<option value="PIOCHE">Pioche</option>
																					<option value="SANDYVALLEY">Sandy Valley</option>
																					<option value="OTHER">Other</option>
																				</select>
																			</div>
																		</div>

																		<hr class="dotted">

																		<div class="form-group" style="margin-bottom: 0;">
																			<div class="col-xs-12">
																				<button type="submit" class="btn styler_bg_color btn-block-sm pull-right">Search Street</button>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
														</div>

														<div class="col-xs-12 col-sm-6 col-md-4 col-lg-12">
															<div class="content-box equal-1 equal-2" style="height: auto;">
																<h2 class="blue-plate">MLS Number</h2>
																<div class="wrap">
																	<form action="/search_result.php" class="form-horizontal" method="POST" id="bymlsform">
																		<input type="hidden" value="1" name="dosearch">
																		<input type="hidden" value="mls" name="searchtype">
																		<div class="form-group">
																			<label class="col-xs-12" style="text-align: left;">MLS Number:</label>
																			<div class="col-xs-12">
																				<input class="form-control" name="mlsnumber" size="6" maxlength="6">
																			</div>
																		</div>

																		<hr class="dotted">

																		<div class="form-group" style="margin-bottom: 0;">
																			<div class="col-xs-12">
																				<button type="submit" class="btn styler_bg_color btn-block-sm pull-right">Search MLS#</button>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
														</div>

														<div class="col-xs-12 col-sm-6 col-md-4 col-lg-12">
															<div class="content-box equal-1 equal-2" style="height: auto;">
																<h2 class="blue-plate">Quick Search</h2>

																<div class="wrap">
																	<form action="/new-homes.php">
																		<div class="form-group">
																			<button class="btn btn-sm styler_bg_color btn-block" type="submit">New Homes</button>
																		</div>
																	</form>
																	<form action="/new-condos.php">
																		<div class="form-group" style="margin-bottom: 11px;">
																			<button class="btn btn-sm btn-beige btn-block" type="submit">New Condos</button>
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

								</div>

								<!-- MLS Search form ends here -->



								<!-- awards and associations logo block starts here -->
								<!-- Remove this comment for award sections
								<div class="wide-block">
								<div class="awards-block">
								<div id="awards_marker"></div>
								<div class="row">
								<div class="col-sm-3 col-ms-3">

								<img src="img/award1.jpg" alt="" />
								</div>
								<div class="col-sm-3 col-ms-3">

								<img src="img/award2.jpg" alt="" />
								</div>
								<div class="col-sm-3 col-ms-3">

								<img src="img/award3.jpg" alt="" />
								</div>
								<div class="col-sm-3 col-ms-3">

								<img src="img/award4.jpg" alt="" />
								</div>
								</div>
								</div>
								</div>
								-->
								<!-- begin resources -->                                
								<div class="resources clearfix">
									<div id="resources_marker"></div>
									<!-- edit the resources heading here -->
									<h2 class="block-title styler_color">
										MOVING RESOURCES
									</h2>
									<div class="block-separator clearfix"></div>
									<div class="resources-wrapper">
										<div class="col-md-4 col-sm-4">
											<!-- edit the resources tabs here -->
											<ul class="nav nav-tabs">
												<li class="styler_parent_active active"><a class="styler_bg_color styler_active_color" href="#movers" data-toggle="tab">Movers</a></li>
												<li class="styler_parent_active"><a class="styler_bg_color styler_active_color" href="#contractors" data-toggle="tab">Contractors</a></li>
												<li class="styler_parent_active"><a class="styler_bg_color styler_active_color" href="#utilities" data-toggle="tab">Utilities</a></li>
												<li class="styler_parent_active"><a class="styler_bg_color styler_active_color" href="#lenders" data-toggle="tab">Lenders</a></li>
											</ul>
										</div>
										<div class="col-md-8 col-sm-8">
											<div class="tab-content">
												<!-- edit tab #1 (movers) content here -->
												<div class="tab-pane active" id="movers">
													<div class="top-sector">
														<div class="title">
															Around the block moving
														</div>
														<address>
															9535 Forest Lane<br />
															Dallas, TX 75254<br />
															(214)348-8888
														</address>
														<a class="lnk styler_color" href="#">www.atbmoving.com</a>                                                
													</div>
													<div class="bottom-sector">
														<div class="title">
															United Moving Company
														</div>
														<address>
															7500 Churchill Road<br />
															Dallas, TX 75231<br />
															(214)348-8888
														</address>
														<a class="lnk styler_color" href="#">www.umcservices.com</a>                                                
													</div>
												</div>
												<!-- edit tab #2 (contractors) content here -->
												<div class="tab-pane" id="contractors">
													<div class="top-sector">
														<div class="title">
															NewLeaf Remodeling, Inc.
														</div>
														<address>
															5105 Royal Lane<br />
															Dallas, TX 75235<br />
															(214)649-6680
														</address>
														<a class="lnk styler_color" href="#">www.newleafremodel.com</a>
													</div>
													<div class="bottom-sector">
														<div class="title">
															Stevens & Sons Plumbing
														</div>
														<address>
															9935 Forest Lane<br />
															Dallas, TX 75290<br />
															(214)348-8888
														</address>
														<a class="lnk styler_color" href="#">www.stevensplumbers.com</a>                                                
													</div>
												</div>
												<!-- edit tab #3 (utilities) content here -->
												<div class="tab-pane" id="utilities">
													<div class="top-sector">
														<div class="title">
															Comcast (Dallas Office)
														</div>
														<address>
															3335 Munger Road<br />
															Dallas, TX 75235<br />
															(972)556-7000
														</address>
														<a class="lnk styler_color" href="#">www.comcast.com</a>                                                
													</div>
													<div class="top-sector">
														<div class="title">
															Time Warner Cable (Dallas Office)
														</div>
														<address>
															4500 Luther Lane<br />
															Dallas, TX 75234<br />
															(214)888-8888
														</address>
														<a class="lnk styler_color" href="#">www.twc.com</a>                                                
													</div>
												</div>
												<!-- edit tab #4 (lenders) content here -->
												<div class="tab-pane" id="lenders">
													<div class="top-sector">
														<div class="title">
															Prime Lending & Associates
														</div>
														<address>
															9535 Preston Road<br />
															Suite 600<br />
															Dallas, TX 75252<br />
															(214)325-8866
														</address>
														<a class="lnk styler_color" href="#">www.primelending.com</a>                                                
													</div>
													<div class="top-sector">
														<div class="title">
															Texas Lending, LLC.
														</div>
														<address>
															4400 Hillcreat Road<br />
															Dallas, TX 75245<br />
															(214)348-8888
														</address>
														<a class="lnk styler_color" href="#">www.texaslending.com</a>                                                     
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /end resources -->
								<!-- begin contact form -->
								<div id="contact_marker"></div>
								<h2 class="block-title styler_color">
									CONTACT US
								</h2>
								<div class="block-separator clearfix"></div>
								<div class="bottom-contact">
									<div class="row">
										<div class="col-md-8 col-sm-8">
											<form role="form" id="validForm">
												<div class="form-group">
													<input type="text" class="form-control" id="inputName" placeholder="Name">
												</div>
												<div class="form-group">
													<input type="text" class="form-control" id="inputName2" placeholder="Name">
												</div>
												<div class="form-group">
													<input type="email" class="form-control" id="inputEmail" placeholder="Email">
												</div>
												<div class="form-group">
													<textarea id="textarea" class="form-control" rows="3"></textarea>
												</div>
												<div class="g-recaptcha pull-right" data-sitekey="6LeZqxoTAAAAAGUlFHVPwdhTiKFaNgtiH8rTVZQn"></div>
												<!-- turn captcha on here by removing this comment

												<?php
												require_once('config.php');
												require_once('recaptchalib.php');
												if($use_recaptcha === true){
													echo recaptcha_get_html($publickey);
												}
												?>

												-->

												<div id="result"></div>
												<input type="submit" value="Submit" class="btn btn-primary submit styler_bg_color">
											</form>
										</div>
										<div class="col-md-4 col-sm-4">
											<div class="address">
												<div class="title styler_color">Address, Phone & Email</div>
												<div class="name styler_color">Las Vegas Luxe Realty</div>
												<address class="styler_color">
													Melanie Saljougui<br />
													9890 S. Maryland Pkwy. Suite 200  <br />
													Las Vegas, Nevada 89193<br />
													<br />
													phone. 702-313-7003<br />
													cell. 415-815-9079
													<!-- $moreinfo
													f. 214.985.9003<br />
													-->
													<a class="styler_color" 
														href="mailto:melaniesaljougui@gmail.com">melaniesaljougui@gmail.com</a>
												</address>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- the about section starts here -->
							<div class="container"></div>
							<div class="row">
								<div class="col-sm-12 col-ms-12">      
									<div id="about-realtor_marker"></div>
									<div class=" about-block">                                                                                        
										<!-- edit the about heading text here -->
										<h2 class="block-title styler_color">
											ABOUT MELANIE SALJOUGUI
										</h2>
										<div class="block-separator clearfix"></div>
										<div class="col-sm-8 col-ms-8">
											<!-- edit the about text here -->
											<div class="promo-text">
												<p>Born and raised in France and with an Iranian background, I have a natural understanding and appreciation for the diversity of cultures. I am also fluent in French, Spanish, English and Farsi.
													I am a tireless worker and will help you in any way that I can because it is what I truly love to do. </p>
												<p>My family being so close and important to me, I understand that the right house provides a comfortable place to call your own and a gathering place for relatives and friends.</p>
												<p>Outside of work, I enjoy the outdoors. I love to travel, hike with my dog, really anything that gets me outside in nature. I love meeting new people and experiencing new places, I also enjoy painting and reading in my free time.
													Please help me help you by providing the basics of what you are looking for and your personal real estate likes and dislikes. I will find you what you are looking for!
													Sincerely,</p>
											</div>
										</div>
										<!-- realtor about image area starts here -->
										<div class="col-sm-4 col-ms-4">
											<!-- edit edit the realtor about image here -->
											<img class="img-responsive vcenter  img-circle center-block" src="img/Melanie.png" alt="" />

										</div>
									</div>
								</div>
							</div>      
							<!-- /end the about section starts here -->
						</div>

					</div>

					<!-- Accordian start-->
					<div class="container-fluid break-out">
						<div class="row">
							<div class="col-xs-12">
								<div id="quick-search" class="container">
									<div class="row">
										<div class="col-xs-12 text-center">
											<h2 class="blue-plate">Quick MLS
												<nobr>City Search</nobr>
											</h2>
											<p>Click on a city/town area below to expand the quick search options.<br class="hidden-sm hidden-xs">
												Search MLS by homes, town homes, condos, or Hi-Rise properties with a couple easy clicks.</p>
											<br>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading1">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion1" href="#collapse1" aria-expanded="false" aria-controls="collapse1"><i class="fa fa-caret-right"></i>
																Las Vegas
															</a>
														</h4>
													</div>
													<div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
														<div class="panel-body">
															<ul id="capecanaveral" class="list-unstyled">
																<li><a href="/search/fl/capecanaveral/homes/">Homes</a></li>
																<li><a href="/search/fl/capecanaveral/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/capecanaveral/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading2">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion1" href="#collapse2" aria-expanded="false" aria-controls="collapse2"><i class="fa fa-caret-right"></i>
																Henderson
															</a>
														</h4>
													</div>
													<div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
														<div class="panel-body">
															<ul id="cocoa" class="list-unstyled">
																<li><a href="/search/fl/cocoa/homes/">Homes</a></li>
																<li><a href="/search/fl/cocoa/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/cocoa/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading3">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion1" href="#collapse3" aria-expanded="false" aria-controls="collapse3"><i class="fa fa-caret-right"></i>
																North Las Vegas
															</a>
														</h4>
													</div>
													<div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
														<div class="panel-body">
															<ul id="cocoabeach" class="list-unstyled">
																<li><a href="/search/fl/cocoabeach/homes/">Homes</a></li>
																<li><a href="/search/fl/cocoabeach/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/cocoabeach/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading4">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion1" href="#collapse4" aria-expanded="false" aria-controls="collapse4"><i class="fa fa-caret-right"></i>
																Pahrump 
															</a>
														</h4>
													</div>
													<div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
														<div class="panel-body">
															<ul id="indialantic" class="list-unstyled">
																<li><a href="/search/fl/indialantic/homes/">Homes</a></li>
																<li><a href="/search/fl/indialantic/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/indialantic/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>

											</div>
										</div>

										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading6">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion2" href="#collapse6" aria-expanded="false" aria-controls="collapse7"><i class="fa fa-caret-right"></i>
																Boulder City 
															</a>
														</h4>
													</div>
													<div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
														<div class="panel-body">
															<ul id="malabar" class="list-unstyled">
																<li><a href="/search/fl/malabar/homes/">Homes</a></li>
																<li><a href="/search/fl/malabar/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/malabar/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading7">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion2" href="#collapse7" aria-expanded="false" aria-controls="collapse8"><i class="fa fa-caret-right"></i>
																Overton
															</a>
														</h4>
													</div>
													<div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
														<div class="panel-body">
															<ul id="melbourne" class="list-unstyled">
																<li><a href="/search/fl/melbourne/homes/">Homes</a></li>
																<li><a href="/search/fl/melbourne/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/melbourne/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading8">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion2" href="#collapse8" aria-expanded="false" aria-controls="collapse9"><i class="fa fa-caret-right"></i>
																Ely
															</a>
														</h4>
													</div>
													<div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
														<div class="panel-body">
															<ul id="melbournebeach" class="list-unstyled">
																<li><a href="/search/fl/melbournebeach/homes/">Homes</a></li>
																<li><a href="/search/fl/melbournebeach/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/melbournebeach/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading9">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion2" href="#collapse9" aria-expanded="false" aria-controls="collapse10"><i class="fa fa-caret-right"></i>
																Overton
															</a>
														</h4>
													</div>
													<div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
														<div class="panel-body">
															<ul id="merrittisland" class="list-unstyled">
																<li><a href="/search/fl/merrittisland/homes/">Homes</a></li>
																<li><a href="/search/fl/merrittisland/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/merrittisland/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>

											</div>
										</div>
										<div class="clearfix visible-md"></div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading11">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion3" href="#collapse11" aria-expanded="false" aria-controls="collapse12"><i class="fa fa-caret-right"></i>
																Logandale
															</a>
														</h4>
													</div>
													<div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
														<div class="panel-body">
															<ul id="titusville" class="list-unstyled">
																<li><a href="/search/fl/ocean-front/homes/">Homes</a></li>
																<li><a href="/search/fl/ocean-front/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/ocean-front/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading12">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion3" href="#collapse12" aria-expanded="false" aria-controls="collapse13"><i class="fa fa-caret-right"></i>
																Laughlin
															</a>
														</h4>
													</div>
													<div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
														<div class="panel-body">
															<ul id="tortoiseisland" class="list-unstyled">
																<li><a href="/search/fl/river-front/homes/">Homes</a></li>
																<li><a href="/search/fl/river-front/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/river-front/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading13">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion3" href="#collapse13" aria-expanded="false" aria-controls="collapse14"><i class="fa fa-caret-right"></i>
																Mesquite
															</a>
														</h4>
													</div>
													<div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
														<div class="panel-body">
															<ul id="rockledge" class="list-unstyled">
																<li><a href="/search/fl/rockledge/homes/">Homes</a></li>
																<li><a href="/search/fl/rockledge/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/rockledge/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading14">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion3" href="#collapse14" aria-expanded="false" aria-controls="collapse15"><i class="fa fa-caret-right"></i>
																McGill
															</a>
														</h4>
													</div>
													<div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14">
														<div class="panel-body">
															<ul id="satellitebeach" class="list-unstyled">
																<li><a href="/search/fl/satellitebeach/homes/">Homes</a></li>
																<li><a href="/search/fl/satellitebeach/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/satellitebeach/condos/">Condos</a></li>
																<li><a href="/search/fl/satellitebeach/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>

											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="panel-group" id="accordion4" role="tablist" aria-multiselectable="true">
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading16">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion4" href="#collapse16" aria-expanded="false" aria-controls="collapse17"><i class="fa fa-caret-right"></i>
																Indian Springs
															</a>
														</h4>
													</div>
													<div id="collapse16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading16">
														<div class="panel-body">
															<ul id="titusville" class="list-unstyled">
																<li><a href="/search/fl/titusville/homes/">Homes</a></li>
																<li><a href="/search/fl/titusville/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/titusville/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading17">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion4" href="#collapse17" aria-expanded="false" aria-controls="collapse18"><i class="fa fa-caret-right"></i>
																Caliente 
															</a>
														</h4>
													</div>
													<div id="collapse17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading17">
														<div class="panel-body">
															<ul id="tortoiseisland" class="list-unstyled">
																<li><a href="/search/fl/tortoiseisland/homes/">Homes</a></li>
																<li><a href="/search/fl/tortoiseisland/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/tortoiseisland/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading18">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion4" href="#collapse18" aria-expanded="false" aria-controls="collapse19"><i class="fa fa-caret-right"></i>
																Pioche
															</a>
														</h4>
													</div>
													<div id="collapse18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading18">
														<div class="panel-body">
															<ul id="verobeach" class="list-unstyled">
																<li><a href="/search/fl/verobeach/homes/">Homes</a></li>
																<li><a href="/search/fl/verobeach/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/verobeach/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading" role="tab" id="heading19">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion4" href="#collapse19" aria-expanded="false" aria-controls="collapse20"><i class="fa fa-caret-right"></i>
																Sandy Valley
															</a>
														</h4>
													</div>
													<div id="collapse19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading19">
														<div class="panel-body">
															<ul id="viera"  class="list-unstyled">
																<li><a href="/search/fl/viera/homes/">Homes</a></li>
																<li><a href="/search/fl/viera/townhomes/">Town Homes</a></li>
																<li><a href="/search/fl/viera/condos/">Condos</a></li>
																<li><a href="/search/fl/ocean-front/rental/">Hi-Rise</a></li>
															</ul>
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

				<!-- Accordian end-->

			</div>
			<div id="empty"></div>
		</div>

		<!-- begin footer -->
		<div id="footer">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<!-- edit footer logo here -->
							<a href="#" class="logo"><img src="img/logo.png" alt="" /></a>


						</div>
						<div class="col-md-4 col-sm-6 col-xs-6">
							<!-- edit alt footer logo here -->
							<a href="#" class="logo"><img src="img/key-logo-white.png"  alt="" /></a>
							<div class="text">
								<!-- edit equal housing opportunity disclaimer here -->

							</div>
						</div>

						<div class="col-md-4 col-sm-6 col-xs-12  text-center" >
							<!-- begin newsletter form area -->
							<div class="text text-center">
								<div class="header ">NEWSLETTER</div>
								<p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>
							</div>
							<div class="subscribe center-block">
								<form action="/" method="post">
									<input type="text" placeholder="Email Address" />
									<input type="submit" value="GO" class="styler_bg_color" />
								</form>
							</div>
							<!-- /end newsletter form area -->
						</div>

						<div class="col-md-12 col-sm-6 col-xs-12 text-center">
							<!-- begin disclaimer here -->
							<div class="text">
								<div class="header">DISCLAIMER</div>
								<!-- edit your disclaimer text here -->
								<p>Information is from the multiple listing service and neither suggests nor infers that the [name of agent] or [name of company] participated as either the listing or cooperating agent or broker in the sale or purchase of the properties depicted.</p>
								<p >All properties listed in this web site are available on an equal opportunity basis.</p>
							</div>
							<!-- /end disclaimer -->
						</div>
					</div>
				</div>
			</div>
			<div class="bottom styler_bg_color">
				<div class="container">
					<div class="row">
						<!-- edit copyright notice here -->
						<div class="copyrights">Design / RETS by Webware Development 2016</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /end footer -->

		<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>

		<script>
			$(document).ready(function(){
				/* Reset Button */
				$('form').on('reset', function() {
					setTimeout(function() {
						$('.check-btn > input').each(function() {
							$(this).parent().removeClass('checked-btn');
							if($(this).prop('checked') !== false) {
								$(this).parent().addClass('checked-btn');
							}
						});
						$('#collapseSearch').removeClass('in');
						$('html, body').animate({
							scrollTop: $('header').outerHeight(true) + $('#tag-line').outerHeight(true)
							}, 500);
					});
				});
			});
		</script>

		<!-- start style switcher -->
		<!-- remove this section when you want to remove the style switcher -->
		<!--		<script type="text/javascript" src="js/style-switcher/style-switcher.js"></script>  -->
		<!-- /end style switcher -->

		<!-- capthca script -->
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<!-- /end capthca script -->

		<!-- scripting (at the bottom for faster loading) -->
		<script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
		<script type="text/javascript" src="js/jquery.carouFredSel-6.2.1.js"></script>
		<script type="text/javascript" src="http://www.google.com/jsapi"></script>
		<script type="text/javascript" src="js/jquery.easy-pie-chart.js"></script>
		<script type="text/javascript" src="js/library.js"></script>
		<script type="text/javascript" src="js/function.js"></script>
		<script type="text/javascript" src="js/mail_validation.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="js/jquery.royalslider.min.js"></script>   
		<!-- /end scripting -->

	</body>
</html>