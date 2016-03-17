        
        
        <!-- <div class="item <?=$this->model->isFirst()?"active":"" ?>" style=" background-position: center center;background-image: url(<?= $this->model->getFrontPicFn()?>);"></div>  -->

        					<li class="slide<?= $this->model->rowidx ?>" data-transition="slotzoom-horizontal" data-slotamount="5"  data-masterspeed="300">

									<img alt="" src="<?= $this->model->getFrontPicFn()?>" />
									<!-- slide 2 caption 1 parameters -->
									<div class="caption sft" data-x="10" data-y="380" data-speed="2500" data-start="1000" data-easing="easeInBack">
										<!-- slide 2 caption 1 -->
										<p class="cap-1"><?= $this->model->getStreetAddress()?><br />
											<span class="price"><?= $this->model->getPrice()?></span>
										</p>
									</div>
								</li>