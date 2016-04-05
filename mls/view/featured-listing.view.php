                             
                                            <div class="col-lg-4 col-md-4 col-sm-4 ">
                                                <!-- featured item  house #1 summary info -->
                                                <div class="featured-item box-seq shadow-back">
                                                    <!-- house #1 image -->
                                                    <img class="img-responsive" style="" src="<?= $this->model->getFrontPicFn()?>" alt="">
                                                    <!-- house #1 headline -->                        
                                                    <div class="heading styler_bg_color"><?= $this->model->getPrice()?></div>
                                                    <!-- house #1 summary content -->
                                                    <div class="content">
                                                        <!-- house #1 summary content: address -->
                                                        <address>
                                                            <?= $this->model->getStreetAddress()?><br />
                                                            <?= $this->model->getCityStZip()?>   
                                                        </address>
                                                        <!-- house #1 summary content: characteristics -->
                                                        <div class="characteristics">
                                                            <ul>
                                                                <li><?= $this->model->getSqFt() ?> sqFt</li>
                                                                <li><?= $this->model->getBeds() ?> Bedrooms</li>
                                                                <li><?= $this->model->getBaths() ?> Baths</li>
                                                            </ul>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <!-- house #1 summary content: price -->
                                                                    <div class="price styler_color">
                                                                        MLS #: <?= $this->model->getMLS()?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <!-- link to house #1 featured item detail -->
                                                                    <div class="more">
                                                                        <a id="item<?= $this->model->rowIdx ?>" href="javascript:void(0)" class="styler_color property-link">View Details</a>
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                           