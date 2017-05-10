
<!-- begin:search --> 

<div id="the-search"> 
    <div class="container">      
        <div class="row">        
            <ul class="nav nav-tabs nav-justified" id="search-tab">
                <li class="active"><a href="#property" data-toggle="tab"> Search Homes For Sale </a></li>
                <li><a href="#rental" data-toggle="tab">  Search Rentals </a></li>
                <li><a href="#seachsale" data-toggle="tab"> MLS DeepSearch Sales</a></li>
                <li><a href="#seachrent" data-toggle="tab"> MLS DeepSearch Rentals </a></li>
            </ul>
        </div>
        <div class="row"> 

            <div class="tab-content">

                <div class="tab-pane fade in active" id="property">       
                    <form  role="form" id="prop-search"  name="prop-search" method="get" target="_blank" action="search.php">

                        <fieldset>

                            <input type="hidden" name="searchtype" value="Residential">

                            <div class="col-md-2 col-sm-6 col-xs-6"> 
                                <div class="form-group">
                                    <label for="bedroom">MLS #</label>
                                    <input type="text" class="form-control" placeholder="Enter MLS" name="mlsid">
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-6">      
                                <div class="form-group">
                                    <label for="location">City</label>
                                    <select class="form-control" id="area" name="area">
                                        <option selected>All</option>

                                        <?php
                                        $action=basename(__FILE__, '.php');               // load action from filename for consistancy 
                                        $controller = new retsController($action . '-cities'); // register controller with page action and parameter
                                        $controller->invoke();                            // invokde controller to get view
                                        ?>     

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control" id="proptype"  name="proptype">
                                        <option selected>All</option>
                                        <option >House</option>
                                        <option>Condo</option>
                                        <option>Townhome/Villa</option>                    
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="bathroom">Baths</label>
                                    <select class="form-control" id="baths" name="baths">
                                        <option>1</option>
                                        <option selected>2</option>
                                        <option>3</option>
                                        <option>4+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="bedroom">Beds</label>
                                    <select class="form-control" id="beds" name="beds">
                                        <option>1</option>
                                        <option>2</option>
                                        <option selected>3</option>
                                        <option>4+</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-6">

                                <div class="form-group">
                                    <label for="minprice">$-Range</label>
                                    <select class="form-control" id="pricerange" name="pricerange">
                                        <option value="0-100">$0-$100k</option>
                                        <option value="100-175">$100k-$175k</option>
                                        <option value="175-250" selected>$175k-$250k</option>
                                        <option value="250-325">$250k-$325k</option>
                                        <option value="325-400">$325k-$400k</option>
                                        <option value="400-500">$400k-$500k</option>
                                        <option value="500-600">$500k-$600k</option>
                                        <option value="600-750">$600k-$750k</option>
                                        <option value="750-900">$750k-$900k</option>
                                        <option value="900-1100">$900k-$1.1m</option>
                                        <option value="1100-1500">$1.1m-$1.5m</option>
                                        <option value="1500-100000">$1.5m+</option>              
                                    </select>
                                </div>

                            </div>

                            <div class="row text-center" style="clear:both">
                                <div class="col-md-12">
                                    <div class="form-group">     
                                        <input type="submit" name="submit" value="search" class="btn btn-default btn-block">  
                                    </div>                     
                                </div>
                            </div>

                        </fieldset>

                    </form>

                </div>

                <div class="tab-pane fade" id="rental">

                    <form role="form" id="rental-search"  name="rental-search" method="get" target="_blank" action="search.php">

                        <fieldset>

                            <input type="hidden" name="searchtype" value="Rental">

                            <div class="col-md-2 col-sm-6 col-xs-6"> 
                                <div class="form-group">
                                    <label for="bedroom">MLS #</label>
                                    <input type="text" class="form-control" placeholder="Enter MLS" name="mlsid">
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-4 col-xs-4">      
                                <div class="form-group">
                                    <label for="location">City</label>
                                    <select class="form-control" id="area" name="area">
                                        <option selected>All</option>
                                        <?php
                                        $action=basename(__FILE__, '.php');               // load action from filename for consistancy 
                                        $controller = new retsController($action . '-cities'); // register controller with page action and parameter
                                        $controller->invoke();                            // invokde controller to get view
                                        ?>    
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-4 col-xs-4">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control" id="proptype" name="proptype">
                                        <option selected>All</option>
                                        <option>House</option>
                                        <option>Condo</option>
                                        <option>Townhome</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-4 col-xs-4">
                                <div class="form-group">
                                    <label for="bathroom">Baths</label>
                                    <select class="form-control" id="baths"  name="baths">
                                        <option selected>1</option>
                                        <option >2</option>
                                        <option>3</option>

                                        <option>4+</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-4 col-xs-4">
                                <div class="form-group">
                                    <label for="bedroom">Beds</label>
                                    <select class="form-control" id="beds" name="beds">
                                        <option>1</option>
                                        <option selected>2</option>
                                        <option >3</option>

                                        <option>4+</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-4 col-xs-4">
                                <div class="form-group">
                                    <label for="minprice">Price Range</label>
                                    <select class="form-control" id="pricerange" name="pricerange">
                                        <option value="0-800">to $800</option>
                                        <option value="800-1000" >$800-$1000</option>
                                        <option value="1000-1200">$1000-$1200</option>
                                        <option value="1200-1400" selected>$1200-$1400</option>
                                        <option value="1400-1700">$1400-$1700</option>
                                        <option value="1700-2000">$1700-$2000</option>
                                        <option value="2000-2400">$2000-$2400</option>
                                        <option value="2400-3000">$2400-$3k</option>
                                        <option value="3000-10000">$3,000+</option>
                                    </select>
                                </div>
                            </div>
                            <!--  </div>

                            <div class="col-md-2 col-sm-2 col-xs-3">  -->

                            <div class="row text-center" style="clear:both">
                                <div class="col-md-12">
                                    <div class="form-group">     
                                        <input type="submit" name="submit" value="search" class="btn btn-default btn-block">  
                                    </div>                     
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>

                <!--     
                DEEP SEARCH - //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                -->

                <div class="tab-pane fade" id="seachsale">
                    <form role="form" id="rental-search"  name="rental-search" method="get" target="_blank" action="search.php">
                        <input type="hidden" name="searchtype" value="residential">

                        <div class="col-md-2 col-sm-6 col-xs-6">   

                            <div class="form-group">
                                <label for="location">City</label>
                                <select class="form-control" id="area_deep_resi" name="area_deep_resi" onchange="get_communities()">
                                    <option selected>All</option>
                                    <?php
                                    $action=basename(__FILE__, '.php');               // load action from filename for consistancy 
                                    $controller = new retsController($action . '-cities'); // register controller with page action and parameter
                                    $controller->invoke();                            // invokde controller to get view
                                    ?>    
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bathroom">Baths Min</label>
                                <select class="form-control" id="bathrooms_from"  name="bathrooms_from">
                                    <option selected>1</option>
                                    <option >2</option>
                                    <option>3</option>
                                    <option>4+</option>
                                </select>
                            </div>

                            <div class="form-group">

                                <label for="bathroom">Baths Max</label>
                                <select class="form-control" id="bathrooms_to"  name="bathrooms_to">
                                    <option >1</option>
                                    <option >2</option>
                                    <option selected>3</option>
                                    <option>4+</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-6">

                            <div class="form-group">
                                <label for="type">Community</label>
                                <select class="form-control" id="subdiv" name="subdiv" disabled>
                                    <option selected>All</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bedroom">Beds Min</label>
                                <select class="form-control" id="bedrooms_from" name="bedrooms_from">
                                    <option>1</option>
                                    <option selected>2</option>
                                    <option >3</option>                
                                    <option >4</option>                
                                    <option>5+</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bedroom">Beds Max</label>
                                <select class="form-control" id="bedrooms_to" name="bedrooms_to">
                                    <option>1</option>
                                    <option >2</option>
                                    <option >3</option>      
                                    <option selected>4</option>          
                                    <option>5+</option>
                                </select>

                            </div>


                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="proptype" name="proptype">
                                    <option selected>All</option>
                                    <option>House</option>
                                    <option>Condo</option>
                                    <option value="townhome">Townhome/Villa</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="minprice">Price Min</label>
                                <select class="form-control" id="price_from" name="price_from">
                                    <option value="100000">$100k</option>
                                    <option value="150000" >$150k</option>
                                    <option value="200000">$200k</option>
                                    <option value="250000" selected>$250k</option>
                                    <option value="300000">$300k</option>
                                    <option value="400000">$400k</option>
                                    <option value="500000">$500k</option>
                                    <option value="700000">$700k</option>
                                    <option value="900000">$900k</option>
                                    <option value="1100000">$1.1m</option>
                                    <option value="1500000">$1.5m</option>
                                    <option value="10000000">$1.5m+</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="maxprice">Price Max</label>
                                <select class="form-control" id="price_to" name="price_to">
                                    <option value="150000" >$150k</option>
                                    <option value="200000">$200k</option>
                                    <option value="250000" >$250k</option>
                                    <option value="300000">$300k</option>
                                    <option value="400000" selected>$400k</option>
                                    <option value="500000">$500k</option>
                                    <option value="700000">$700k</option>
                                    <option value="900000">$900k</option>
                                    <option value="1100000">$1.1m</option>
                                    <option value="1500000">$1.5m</option>
                                    <option value="10000000">$1.5m+</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-6">

                            <div class="form-group">
                                <label for="minsqft">Sqft Min</label>
                                <select class="form-control" id="sqft_from" name="sqft_from">

                                    <option value="700">700</option>
                                    <option value="900" >900</option>
                                    <option value="1100">1100</option>
                                    <option value="1300" selected>1300</option>
                                    <option value="1500">1500</option>
                                    <option value="1750">1750</option>
                                    <option value="2000">2000</option>
                                    <option value="2500">2500</option>
                                    <option value="3000">3000</option>
                                    <option value="4000">4000</option>
                                    <option value="20000">4000+</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="maxsqft">Sqft Max</label>
                                <select class="form-control" id="sqft_to" name="sqft_to">
                                    <option value="700">700</option>
                                    <option value="900" >900</option>
                                    <option value="1100">1100</option>
                                    <option value="1300" >1300</option>
                                    <option value="1500">1500</option>
                                    <option value="1750" selected >1750</option>
                                    <option value="2000">2000</option>
                                    <option value="2500">2500</option>
                                    <option value="3000">3000</option>
                                    <option value="4000">4000</option>
                                    <option value="20000">4000+</option>
                                </select>
                            </div>

                            <div class="form-group text-center">
                                <label for="type"><input type="checkbox" class="form-control" id="reo" name="reo">REO/Bank Pnwed</label>
                            </div> 

                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-6">

                            <div class="form-group text-center">
                                <label for="type"><input type="checkbox" class="form-control" id="shortsale" name="shortsale">Short Sale</label>
                            </div>                                      

                            <div class="form-group text-center" style="clear:both">
                                <label for="type"><input type="checkbox" class="form-control" id="waterfront" name="waterfront">Waterfront</label>
                            </div>

                            <div class="form-group text-center">
                                <label for="type"><input type="checkbox" class="form-control" id="pets" name="pets">Pets</label>
                            </div>

                        </div>    

                        <div class="col-md-2 col-sm-6 col-xs-6">

                            <div class="form-group text-center">
                                <label for="type"><input type="checkbox" class="form-control" id="pool" name="pool">Pool</label>
                            </div>

                            <div class="form-group text-center">
                                <label for="type"><input type="checkbox" class="form-control" id="gated" name="gated">Gated</label>
                            </div>

                            <div class="form-group text-center">
                                <label for="type"><input type="checkbox" class="form-control" id="golf" name="golf">Golf</label>
                            </div>

                        </div>     

                        <div class="row text-center" style="clear:both">
                            <div class="col-md-12">
                                <div class="form-group">     
                                    <input type="submit" name="submit" value="search" class="btn btn-default btn-block">  
                                </div>                     
                            </div>
                        </div>
                    </form>

                </div>

                <div class="tab-pane fade" id="seachrent">

                    <form role="form" id="rental-search"  name="rental-search" method="get" target="_blank" action="search.php">

                        <input type="hidden" name="searchtype" value="rental">

                        <div class="col-md-2 col-sm-6 col-xs-6">      

                            <div class="form-group">
                                <label for="location">City</label>
                                <select class="form-control" id="area_deep_rent" name="area_deep_rent" onchange="get_communities_rental()">
                                    <option selected>All</option>
                                    <?php
                                    $action=basename(__FILE__, '.php');               // load action from filename for consistancy 
                                    $controller = new retsController($action . '-cities'); // register controller with page action and parameter
                                    $controller->invoke();                            // invokde controller to get view
                                    ?>    
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="minprice">Price Min</label>
                                <select class="form-control" id="price_from" name="price_from">
                                    <option value="0">$0</option>
                                    <option value="800">$800</option>
                                    <option value="1000" >$1,000</option>
                                    <option value="1200" selected>$1,200</option>
                                    <option value="1400" >$1,400</option>
                                    <option value="1700">$1,700</option>
                                    <option value="2000">$2,000</option>
                                    <option value="2400">$2,400</option>
                                    <option value="3000">$3,000</option>
                                    <option value="10000">$3,000+</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="minprice">Price Max</label>
                                <select class="form-control" id="price_to" name="price_to">
                                    <option value="800">$800</option>
                                    <option value="1000" >$1,000</option>
                                    <option value="1200">$1,200</option>
                                    <option value="1400" >$1,400</option>
                                    <option value="1700" selected >$1,700</option>
                                    <option value="2000">$2,000</option>
                                    <option value="2400">$2,400</option>
                                    <option value="3000">$3,000</option>
                                    <option value="10000">$3,000+</option>
                                </select>
                            </div>                    


                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-6">

                            <div class="form-group">
                                <label for="type">Community</label>
                                <select class="form-control" id="subdivr" name="subdivr" disabled>
                                    <option selected>All</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bedroom">Beds Min</label>
                                <select class="form-control" id="bedrooms_from" name="bedrooms_from">
                                    <option>1</option>
                                    <option selected>2</option>
                                    <option >3</option>                
                                    <option>4+</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bedroom">Beds Max</label>
                                <select class="form-control" id="bedrooms_to" name="bedrooms_to">
                                    <option>1</option>
                                    <option >2</option>
                                    <option selected>3</option>                
                                    <option>4+</option>
                                </select>

                            </div>

                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-6">


                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="proptype" name="proptype">
                                    <option selected>All</option>
                                    <option>House</option>
                                    <option>Condo</option>
                                    <option value="townhome">Townhome/Villa</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="bathroom">Baths Min</label>
                                <select class="form-control" id="bathrooms_from"  name="bathrooms_from">
                                    <option selected>1</option>
                                    <option >2</option>
                                    <option>3</option>
                                    <option>4+</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bathroom">Baths Max</label>
                                <select class="form-control" id="bathrooms_to"  name="bathrooms_to">
                                    <option >1</option>
                                    <option >2</option>
                                    <option selected>3</option>
                                    <option>4+</option>
                                </select>
                            </div>                    

                        </div>


                        <div class="col-md-2 col-sm-6 col-xs-6">

                            <div class="form-group">
                                <label for="minsqft">Sqft Min</label>
                                <select class="form-control" id="sqft_from" name="sqft_from">

                                    <option value="700">700</option>
                                    <option value="900" >900</option>
                                    <option value="1100">1100</option>
                                    <option value="1300" selected>1300</option>
                                    <option value="1500">1500</option>
                                    <option value="1750">1750</option>
                                    <option value="2000">2000</option>
                                    <option value="2500">2500</option>
                                    <option value="3000">3000</option>
                                    <option value="4000">4000</option>
                                    <option value="20000">4000+</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="maxsqft">Sqft Max</label>
                                <select class="form-control" id="sqft_to" name="sqft_to">
                                    <option value="700">700</option>
                                    <option value="900" >900</option>
                                    <option value="1100">1100</option>
                                    <option value="1300" >1300</option>
                                    <option value="1500">1500</option>
                                    <option value="1750" selected >1750</option>
                                    <option value="2000">2000</option>
                                    <option value="2500">2500</option>
                                    <option value="3000">3000</option>
                                    <option value="4000">4000</option>
                                    <option value="20000">4000+</option>
                                </select>
                            </div>

                            <div class="form-group text-center">           
                                <label for="type"><input type="checkbox" class="form-control" id="seasonal" name="seasonal">Seasonal</label>
                            </div>

                        </div>  

                        <div class="col-md-2 col-sm-6 col-xs-6">

                            <div class="form-group text-center">
                                <label for="type"><input type="checkbox" class="form-control" id="pool" name="pool">Pool</label>
                            </div>

                            <div class="form-group text-center">
                                <label for="type"><input type="checkbox" class="form-control" id="gated" name="gated">Gated</label>
                            </div>

                            <div class="form-group text-center">
                                <label for="type"><input type="checkbox" class="form-control" id="pets" name="pets">Pets</label>
                            </div>

                        </div>   

                        <div class="col-md-2 col-sm-6 col-xs-6">

                            <div class="form-group text-center">
                                <label for="type"><input type="checkbox" class="form-control" id="waterfront" name="waterfront">Waterfront</label>
                            </div>

                            <div class="form-group text-center">
                                <label for="type"> <input type="checkbox" class="form-control" id="golf" name="golf">Golf</label>
                            </div>

                        </div>            

                        <div class="row text-center" style="clear:both">
                            <div class="col-md-12">
                                <div class="form-group">     
                                    <input type="submit" name="submit" value="search" class="btn btn-default btn-block">  
                                </div>                     
                            </div>
                        </div>

                    </form>

                </div>




            </div>  <!-- tab content -->
        </div> <!-- row -->
    </div> <!-- container -->
</div>
<!-- end:search -->