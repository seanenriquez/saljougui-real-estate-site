
              <!-- start index-loop -->
              <? $city = $this->model->getCity() ?>
              <div class="row">
              
                <div class="col-md-12 ">
                
                  <div class="service-container">
                    <div class="service-content">
                     <div class="heading-title">
                       <h2><a href="/fl/<?php echo ($this->model->getCityDashes()) ?>"><?= $city ?></a></h2>
                     </div>
                      <p><?= $this->model->getCityDesc($city) ?></p>
                    </div>
                  </div>
                             
	                <!-- <div class="col-md-7 col-sm-6 col-xs-12">  -->
	                <div class="pull-right">
	                  <div class="property-container">
	                    <div class="property-image">
	                      <a href="/fl/<?= $this->model->getCityDashes() ?>" >
	                        <img src="<?php $stg=$this->model->getFrontPicFn();echo $stg ?>" alt="">
	                      </a>
	                      <div class="property-price">
	                        <h4><?php $stg=$this->model->getPropertyType(); echo $stg ?></h4>
	                        <span><?php echo ($this->model->getPrice()) ?></span>
	                      </div>
	                    </div>
	                    <div class="property-features">
	                      <span><i class="fa fa-home"></i> <?php echo ($this->model->getSqFt()) ?> ft<sup>2</sup></span>
	                      <span><i class="fa fa-hdd-o"></i><?php echo ($this->model->getBeds()) ?> Beds</span>
	                      <span><i class="fa fa-male"></i> <?php echo ($this->model->getBaths()) ?> Baths</span>
	                      <span><i class="fa fa-car"></i>  <?php echo ($this->model->getMLS()) ?></span>
	                      <span><i class="fa fa-camera"></i> <?php echo( $this->model->getNumPics()) ?> </span>
	                    </div>
	                    
	                    
	                    <!--
	                    <div class="property-content">
	                      <h3><a href="#"><?php $stg=$this->model->getPropertyTypeTag(); echo $stg ?></a> <small><?php $stg=$this->model->getStreetAddress(); echo $stg ?></small></h3>
	                      <p><?php $stg=$this->model->getShortUCDesc(164); echo $stg ?>.</p>
	                    </div>
	                    <div class="property-footer">
	                      <a href="#" title="Add to favorite"><i class="fa fa-heart"></i></a>
	                      <a href="contact.php?mlsid=<?php echo $this->model->getMLS() ?>" title="Contact Agent"><i class="fa fa-envelope"></i></a>
	                    </div>
	                  </div>
	                  -->
	                  </div>
	                </div>
	                
	              </div>
              </div>
              
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 text-center">                 
                      <a href="fl/<?= $this->model->getCityDashes()?>" class="btn btn-default btn-lg"> <?= $this->model->getCitySearchButtonTag($city,"Homes","Sale")?></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-center">                 
                      <a href="fl/<?= $this->model->getCityDashes()?>" class="btn btn-default btn-lg"> <?= $this->model->getCitySearchButtonTag($city,"Homes","Rent") ?></a>
                </div>
              </div>
              <hr/>
              <!-- end index-loop -->
