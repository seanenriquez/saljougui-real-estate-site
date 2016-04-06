<div id="property-item<?= $this->model->rowIdx ?>" class="property-item">
                                <div class="wide-divider">
                                    <a class="close-details" href="javascript:void(0)"></a>
                                </div>
                                <div class="inner-block">

                                    <div class="row">
                                        <div class="col-md-8 col-sm-8">
                                            <!-- edit featured property #1 address -->
                                            <div class="address">
                                                <div class="address-top">
                                                    <?= $this->model->getStreetAddress()?>
                                                </div>    
                                                <div class="address-bottom">
                                                    <?= $this->model->getCityStZip()?>
                                                </div>    
                                            </div>                                                
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <!-- edit featured property #1 price -->
                                            <div class="price styler_color">
                                                 <?= $this->model->getPrice()?>
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
                                                            MLS #: <?= $this->model-> getMLS()?>
                                                        </div>
                                                        <!-- edit featured property #1 details summary info (characteristics) here -->
                                                        <div class="characteristics">
                                                            <ul>
                                                                <li><?= $this->model-> getSqFt()?> s/f</li>
                                                                <li><?= $this->model-> getBeds()?> Bedrooms</li>
                                                                <li><?= $this->model-> getBaths()?> Baths</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6 col-sm-6">
                                                        <!-- edit featured property #1 details summary info (listing agent image) -->
                                                        <div class="realtor-mini">
                                                            <img class="img-responsive " src="img/Melanie.png" alt="">
                                                        </div>
                                                    </div>
                                                    <!-- edit featured property #1 details summary info (listing agent name, address and phone number) -->
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="details-name">Melanie Saljougui</div>
                                                        <div class="details-place"><?= $this->model-> getData("listing_office_name")?></div>
                                                        <div class="details-phone"><?= $this->model-> getData("listing_office_phone")?></div>
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
                                                                    <p><?= $this->model-> getData("building_desc")?></p>
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <!-- edit featured listings house #1 left-side details content here -->
                                                                            <div class="left-tab-wrapper">
                                                                                <table class="details-values">
                                                                                    <tr>
                                                                                        <td><strong>Property Type:</strong></td>
                                                                                        <td><?= $this->model-> getData("zoning")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Year Built:</strong></td>
                                                                                        <td><?= $this->model-> getData("year_built")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Property Class:</strong></td>
                                                                                        <td><?= $this->model-> getData("property_sub_type")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>County:</strong></td>
                                                                                        <td><?= $this->model-> getData("county")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Subdivision:</strong></td>
                                                                                        <td><?= $this->model-> getData("subdivision")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Pet info:</strong></td>
                                                                                        <td><?= $this->model-> getData("pets")?>  <?= $this->model-> getData("pet_fee")?></td>
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
                                                                                        <td><?= $this->model-> getBeds()?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Baths:</strong></td>
                                                                                        <td><?= $this->model-> getBaths()?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Lot Size:</strong></td>
                                                                                        <td><?= $this->model-> getData("sqft_tot")?> sq/ft</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Stories:</strong></td>
                                                                                        <td><?= $this->model-> getData("building_desc")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Garage:</strong></td>
                                                                                        <td><?= $this->model-> getData("garage")?> cars | <?= $this->model-> getData("garage_desc")?>  <?= $this->model-> getData("parking")?>  </td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Age restricted:</strong></td>
                                                                                        <td> <?= $this->model-> getData("over_55")?>   </td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Construction info:</strong></td>
                                                                                        <td> <?= $this->model-> getData("construction")?>   </td> 
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
                                                                    <p>Features: <?= $this->model-> getData("interior_features")?></p>
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <!-- edit featured listings house #1 interior slide left-side content here -->
                                                                            <div class="left-tab-wrapper">
                                                                                <table class="details-values">
                                                                                    <tr>
                                                                                        <td><strong>Living Area:</strong></td>
                                                                                        <td><?= $this->model-> getData("live_room_dim")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Family Room:</strong></td>
                                                                                        <td><?= $this->model-> getData("fam_room_dim")?> | <?= $this->model-> getData("fam_room_desc")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Den:</strong></td>
                                                                                        <td><?= $this->model-> getData("den_dim")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Dining Room:</strong></td>
                                                                                        <td><?= $this->model-> getData("dining_area")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Kitchen:</strong></td>
                                                                                        <td>22 x 24</td>
                                                                                    </tr>
                                                                                    
                                                                                    <tr>
                                                                                        <td><strong>Fireplace:</strong></td>
                                                                                        <td><?= $this->model-> getData("fireplace")?> | <?= $this->model-> getData("fireplace_desc")?> | <?= $this->model-> getData("fireplace_loc")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Flooring:</strong></td>
                                                                                        <td><?= $this->model-> getData("floor")?></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <!-- edit featured listings house #1 interior slide right-side content here -->
                                                                            <div class="right-tab-wrapper">
                                                                                <table class="details-values">
                                                                                    <tr>
                                                                                        <td><strong>Master Bedroom:</strong></td>
                                                                                        <td><?= $this->model-> getData("master_bed_dim")?> | <?= $this->model-> getData("master_bedbath")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Bedroom 2:</strong></td>
                                                                                        <td><?= $this->model-> getData("2nd_bed_dim")?> | <?= $this->model-> getData("2nd_bed_desc")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Bedroom 3:</strong></td>
                                                                                        <td><?= $this->model-> getData("3rd_bed_dim")?> | <?= $this->model-> getData("3rd_bed_desc")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Bedroom 4:</strong></td>
                                                                                        <td><?= $this->model-> getData("4th_bed_dim")?> | <?= $this->model-> getData("4th_bed_desc")?></td>
                                                                                    </tr>
                                                                                     <tr>
                                                                                        <td><strong>Bedroom 5:</strong></td>
                                                                                        <td><?= $this->model-> getData("5th_bed_dim")?> | <?= $this->model-> getData("5th_bed_desc")?></td>
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
                                                                    <p>Features: <?= $this->model-> getData("exterior_features")?></p>
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <!-- edit featured listings house #1 exterior slide left-side content here -->
                                                                            <div class="left-tab-wrapper">
                                                                                <table class="details-values">
                                                                                    <tr>
                                                                                        <td><strong>Fence:</strong></td>
                                                                                        <td><?= $this->model-> getData("fence_type")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Sprinkler System:</strong></td>
                                                                                        <td>Yes</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Lot Dimensions:</strong></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Pool:</strong></td>
                                                                                        <td><?= $this->model-> getData("pool_features")?> <?= $this->model-> getData("private_pool")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Roof:</strong></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </table>                     
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <!-- edit featured listings house #1 exterior slide right-side content here -->
                                                                            <div class="right-tab-wrapper">
                                                                                <table class="details-values">
                                                                                    <tr>
                                                                                        <td><strong>Home face direction:</strong></td>
                                                                                        <td><?= $this->model-> getData("street_dir")?></td>
                                                                                    </tr>
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
                                                                    <p><?= $this->model-> getData("show_additional")?></p>
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <!-- edit featured listings house #1 additional details slide left-side content here -->
                                                                            <div class="left-tab-wrapper">
                                                                                <table class="details-values">
                                                                                    <tr>
                                                                                        <td><strong>Listing Status:</strong></td>
                                                                                        <td><?= $this->model-> getData("property_status")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Cooling:</strong></td>
                                                                                        <td><?= $this->model-> getData("cooling")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Heating:</strong></td>
                                                                                        <td><?= $this->model-> getData("heating")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Security:</strong></td>
                                                                                        <td><?= $this->model-> getData("security")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Utility info:</strong></td>
                                                                                        <td><?= $this->model-> getData("utilities")?></td>
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
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Elementary School:</strong></td>
                                                                                        <td><?= $this->model-> getData("elem_school")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Middle School:</strong></td>
                                                                                        <td><?= $this->model-> getData("middle_school")?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>High School:</strong></td>
                                                                                        <td><?= $this->model-> getData("high_school")?></td>
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