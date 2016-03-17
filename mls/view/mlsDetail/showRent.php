         <!-- begin:article -->
          <div class="col-md-8 col-md-push-2">
            <div class="row">
              <div class="col-md-12 single-post">
              
                    <div class="row">
                      <div class="col-md-12">
                        <h2><?= $this->model->getStreetAddress(); ?><br /><?= $this->model->getCityStZip();?></h2>
                        <div id="slider-property" class="carousel slide" data-ride="carousel">

                          <div class="carousel-inner">
                            <?= $this->model->getImageDisplayList(); ?>     
                          </div>
                          <a class="left carousel-control" href="#slider-property" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                          </a>
                          <a class="right carousel-control" href="#slider-property" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                        </div>
                        
                        <h3>Rental Property Overview</h3>
                        <table class="table table-bordered">
                          <tr>
                            <td width="20%"><strong>ID</strong></td>
                            <td><?= $this->model->getMls(); ?></td>
                          </tr>
                          <tr>
                            <td><strong>Year Built</strong></td>
                            <td><?= $this->model->getData("year_built"); ?></td>
                          </tr>
                          <tr>
                            <td><strong>Pets</strong></td>
                            <td><?= $this->model->getData("pets"); ?></td>
                          </tr>
                          <tr>
                            <td><strong>Price</strong></td>
                            <td><?= $this->model->getPrice(); ?></td>
                          </tr>
                          <tr>
                            <td><strong>Type</strong></td>
                            <td><?= $this->model->getPropertyTypeTag(); ?></td>
                          </tr>
                          <tr>
                            <td><strong>Style</strong></td>
                            <td><?= $this->model->getData('home_style'); ?></td>
                          </tr>
                          <tr>
                            <td><strong>Location</strong></td>
                            <td><?= $this->model->getStreetAddress(); ?>, <?= $this->model->getCityStZip();?></td>
                          </tr>
                          <tr>
                            <td><strong>Bathrooms</strong></td>
                            <td><?= $this->model->getBaths(); ?></td>
                          </tr>
                          <tr>
                            <td><strong>Bedrooms</strong></td>
                            <td><?= $this->model->getBeds(); ?></td>
                          </tr>
                          <tr>
                            <td><strong>Area</strong></td>
                            <td><?= $this->model->getSqft(); ?> ft<sup>2</sup> </td>
                          </tr>
                          <tr>
                            <td><strong>Construction</strong></td>
                            <td><?= $this->model->getData('construction'); ?> </td>
                          </tr>
                          <tr>
                            <td><strong>Floor</strong></td>
                            <td><?= $this->model->getData('floor'); ?> </td>
                          </tr>
                          <tr>
                            <td><strong>Taxes</strong></td>
                            <td> $<?= $this->model->getData('tax_amount'); ?> [<?= $this->model->getData('tax_year'); ?>]</td>
                          </tr>                          
                          <tr>
                            <td><strong>Garage</strong></td>
                            <td><?= $this->model->getData('garage'); ?> </td>
                          </tr>                          
                          <tr>
                            <td><strong>Security</strong></td>
                            <td><?= $this->model->getData('security'); ?> </td>
                          </tr>
                        </table>
                        <h3>Property Features</h3>
                        <div class="row">
                          <div class="col-md-4 col-sm-4">
                            <strong>Exterior</strong>
                            <ul>
                              <?= $this->model->getExtFeatsList(); ?>        
                            </ul>
                            <? if ($this->model->getData('amenities')!="None") { ?>
                              <strong>Amenities</strong>
                              <ul>
                                <?= $this->model->getAmenityList(); ?>        
                              </ul>
                            <? } ?>
                          </div>
                          <div class="col-md-4 col-sm-4">
                            <strong>Appliances<span></span></strong>
                            <ul>
                                <?= $this->model->getEquipApplList(); ?>
                            </ul>
                          </div>
                          <div class="col-md-4 col-sm-4">
                            <strong>Interior</strong>
                            <ul>
                              <?= $this->model->getIntFeatsList(); ?>
                            </ul>
                          </div>                          
                        </div>

                        <h3>Property Description</h3>
                        <p><?= $this->model->getData('remarks');?></p>
                      </div>
                    </div>            
                  </div>             
                  <!-- start - map -->
                  
                    <div class="row" >               
                      <div class="embed-responsive embed-responsive-4by3">
                        <iframe  frameborder="0" style="border:0" height="500" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyD-LkyO4WqQDY0UV5ZT-Xr7qAywVcMsC7I&center=<?= $this->model->getData('latitude') ?>,<?= $this->model->getData('longitude') ?>&zoom=18&maptype=satellite"></iframe>
                      </div>
                   </div>
                    <div class="row">
                      <div class="col-md-12">
                        <h3>Contact Agent</h3>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <div class="team-container team-dark">
                          <div class="team-image">
                              <img src="/img/debbibizcardpic.png" alt="the team - the shattow group">
                          </div>
                          <div class="team-description">
                            <h3>Debbie Shattow</h3>
                            <p><i class="fa fa-phone"></i> Office : (561) 371-9119<br>
                            <i class="fa fa-mobile"></i> Mobile : (561) 371-9119<br>
                            <i class="fa fa-print"></i> Fax : (561) 371-9119</p>
                            <p>Please, contact me for more information about this property.</p>
                            <div class="team-social">
                              <span><a href="#" title="Twitter" rel="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a></span>
                              <span><a href="#" title="Facebook" rel="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a></span>
                              <span><a href="#" title="Google Plus" rel="tooltip" data-placement="top"><i class="fa fa-google-plus"></i></a></span>
                              <span><a href="#" title="Email" rel="tooltip" data-placement="top"><i class="fa fa-envelope"></i></a></span> 
                              <span><a href="#" title="LinkedIn" rel="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a></span> 
                            </div>                       
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <form>
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control input-lg" placeholder="Enter name : ">
                          </div>
                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control input-lg" placeholder="Enter email : ">
                          </div>
                          <div class="form-group">
                            <label for="telp">Telp.</label>
                            <input type="text" class="form-control input-lg" placeholder="Enter phone number : ">
                          </div>
                          <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control input-lg" rows="7" placeholder="Type a message : "></textarea>
                          </div>
                          <div class="form-group">
                            <input type="submit" name="submit" value="Send Message" class="btn btn-success btn-lg">
                          </div>
                        </form>
                      </div>
                    </div>

    
            </div>
          </div>
          <!-- end:article -->
          <script src="https://maps.googleapis.com/maps/api/js"></script>
