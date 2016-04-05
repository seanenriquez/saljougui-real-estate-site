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
                                                            <img class="img-responsive" src="img/realtor_profile.jpg" alt="">
                                                        </div>
                                                    </div>
                                                    <!-- edit featured property #1 details summary info (listing agent name, address and phone number) -->
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="details-name"></div>
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