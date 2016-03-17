
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="property-container">
              <div class="property-content-list">
                <div class="property-image-list">
                  <a href="/mls/<?= $this->model->getMLS() ?>" >
                    <img src="<?php echo ($this->model->getThumbFN()) ?>" alt="shattow">
                  </a>
                  
                  <div class="property-price">
                    <h4><?php $stg=$this->model->getPropertyType(); echo $stg ?></h4>
                    <span><?php $stg=$this->model->getPrice(); echo $stg ?></span>
                  </div>
                  
                  <div class="property-footer">
                    <a href="#" title="Add to favorite"><i class="fa fa-heart"></i></a>
                    <a href="#" title="Contact Agent"><i class="fa fa-envelope"></i></a>
                  </div>
                </div>
                <div class="property-text">
                  <h3><a href="/mls/<?= $this->model->getMLS() ?>" ><?php $stg=$this->model->getPropertyTypeTag(); echo $stg ?><br><?php $stg=$this->model->getCity(); echo $stg ?></a> <small><?php $stg=$this->model->getStreetAddress(); echo $stg ?></small></h3>
                  <p><?php $stg=$this->model->getShortDesc(76); echo $stg ?></p>
                </div>
              </div>
              <div class="property-features">
                <span><i class="fa fa-home"></i><?php echo($this->model->getSqFt()) ?> ft<sup>2</sup></span>
                <span><i class="fa fa-hdd-o"></i> <?php echo($this->model->getBeds()) ?> Beds</span>
                <span><i class="fa fa-male"></i> <?php echo($this->model->getBaths()) ?> Baths</span>
                <span><i class="fa fa-camera"></i> <?php echo( $this->model->getNumPics()) ?> </span>
                <br>
                <? if ($this->model->getHomeStyle()!= "") { ?>
                  <span><i class="fa fa-building-o"></i> <?php echo($this->model->getHomeStyle()) ?></span>             
                <? } ?>
                <span><i class="fa fa-car"></i> <?php echo($this->model->getMLS()) ?></span>
              </div>
            </div>
          </div>
          <!-- end summery lopp -->