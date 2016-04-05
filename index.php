<?php

session_start();
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
			<?php

			include('includes/nav-bar.php');

			?>

			<!-- begin slider -->
			<div id="layerslider" class="center-block"  style="width: 800px; height: 400px; max-height:400px; max-width: 800px">

				<!-- slide contents goes here -->

				<?php

				$controller = new retsController('carousel');    	// register controller with page action and parameter
				$controller->invoke();                            // invokde controller to get view

				?>                    

			</div>


			<!-- /end slider -->

			<div class="container">
				<div class="row">
					<!-- begin real estate agents promo block -->
					<div class="col-sm-12 col-ms-12">

						<div class="row">
							<div class="col-sm-12 col-ms-12">                                         
								<div class="promo-block">
									<!-- edit real estate agent's promo block heading here -->
									<br>
									<h2 class="block-title styler_color sr-header"  >
										Discover Melanie's Difference...
									</h2>
									<!-- promo real estate agent's block line divider here -->
									<div class="block-separator clearfix"></div>                                            
									<div class="col-sm-4 col-ms-4">
										<!-- edit real estate agent's promo block image here -->
										<img class="img-responsive block-img ease-right-1" src="img/mel_crop1.png" alt="" />
									</div>
									<div class="col-sm-8 col-ms-8">
										<!-- real estate agent's promo block text starts here -->
										<div class="promo-text">
											<!-- edit real estate agent's promo block sub-heading here -->
											<h3 class="ease-left-1 ">Trust An Experienced Las Vegas MLS Agent.</h3>
											<br/>
											<!-- edit real estate agent's promo block paragraph text here -->
											<p class="ease-left-1">I am dedicated to matching prospective buyers with a house that meets their needs and that they will truly love! I believe in listening to my clients and providing them with listings that are within their price range and matching them with homes that exceed their expectations.</p>
											<p class="ease-left-1">I have a diverse skill set with a solid natural sciences and business educational background. I hold a BA in Biology from Sacramento State University and an MBA Marketing from Golden Gate University, San Francisco. <ipsum class=""></ipsum></p>
											<img class="ease-left-1" style="float: left;" src="img/realtor-signature.jpg" alt="" />
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- /end promo text block -->

						<!-- begin featured listings summary block -->                                
						<div class="wide-block">
							<div class="featured-listings">
								<div class="row">
									<div id="featured-listings_marker"></div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<!-- edit featured listings headline here -->
										<h2 class="block-title styler_color sr-header">
											Las Vegas & Henderson NV Top MLS Listings
										</h2>
									</div>
								</div>
								<!-- row #1 featured listings summary block --> 
								<div id="featured-listings_marker"></div>
								<div class="row">
									<?php

									$controller = new retsController('featured-listing'); // register controller with page action and parameter
									$controller->invoke();                            // invokde controller to get view

									?> 
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





						<!-- ==========================MLS Search form starts here=======================================-->
						<!-- Disabled php, remove the "//" before include to activate -->
						<?php //include('includes/search-form.php'); ?>

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
						<!--
						<!-- begin resources - ->                                
						<div class="resources clearfix">
						<div id="resources_marker"></div>
						<!-- edit the resources heading here - ->
						<h2 class="block-title styler_color">
						MOVING RESOURCES
						</h2>
						<div class="block-separator clearfix"></div>
						<div class="resources-wrapper">
						<div class="col-md-4 col-sm-4">
						<!-- edit the resources tabs here - ->
						<ul class="nav nav-tabs">
						<li class="styler_parent_active active"><a class="styler_bg_color styler_active_color" href="#movers" data-toggle="tab">Movers</a></li>
						<li class="styler_parent_active"><a class="styler_bg_color styler_active_color" href="#contractors" data-toggle="tab">Contractors</a></li>
						<li class="styler_parent_active"><a class="styler_bg_color styler_active_color" href="#utilities" data-toggle="tab">Utilities</a></li>
						<li class="styler_parent_active"><a class="styler_bg_color styler_active_color" href="#lenders" data-toggle="tab">Lenders</a></li>
						</ul>
						</div>
						<div class="col-md-8 col-sm-8">
						<div class="tab-content">
						<!- - edit tab #1 (movers) content here - ->
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
						<!- - edit tab #2 (contractors) content here - ->
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
						<!- - edit tab #3 (utilities) content here - ->
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
						<!- - edit tab #4 (lenders) content here - ->
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
						-->
						<!-- /end resources -->
						<?php include('includes/accordion.php'); ?>
						
						<!-- the about section starts here -->
						<div class="container">
						<div class="row">
							<div class="col-sm-12 col-ms-12">      
								<div id="about-realtor_marker"></div>
								<div class=" about-block">                                                                                        
									<!-- edit the about heading text here -->
									<h2 class="block-title styler_color sr-header">
										About Melanie Saljougui 
									</h2>
									<div class="block-separator clearfix"></div>
									<div class="col-sm-8 col-ms-8">
										<!-- edit the about text here -->
										<div class="promo-text ease-right-2">
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
										<img class="img-responsive vcenter  img-circle center-block ease-left-2" src="img/Melanie.png" alt="Melanie Saljougui, your real estate pro!" />

									</div>
								</div>
							</div>
						</div>      
						</div>
						<!-- /end  about section  here -->
						
						<!-- begin contact form -->
						<div class="container">
							<div id="contact_marker"></div>
							<h2 class="block-title styler_color sr-header">
								Contact Me
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
											<div class="g-recaptcha " data-sitekey="6LeZqxoTAAAAAGUlFHVPwdhTiKFaNgtiH8rTVZQn" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
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
												Phone: 702-313-7003<br />
												Cell: 415-815-9079
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


					</div>
				</div>
			</div>

			<!-- Accordian end-->

		</div>
		<div id="empty"></div>
	</div>

	<!-- begin footer -->
	<?php include('includes/footer_new.php');  ?>
	<!-- /end footer -->

	<!-- Javascript/bootstrap + all other scripts -->
	<?php include('includes/bottom_scripts_new.php');  ?>
	<!-- /End Scripts -->

</body>

</html>