

                        <!-- <div class="item <?=$this->model->isFirst()?"active":"" ?>" style=" background-position: center center;background-image: url(<?= $this->model->getFrontPicFn()?>);"></div>  -->

                        <div class="ls-slide<?= $this->model->rowidx ?>" data-ls="transition2d:1;timeshift:-1000; transition2d: 9;">

                            <img  alt="Slide background" class="ls-bg" src="<?= $this->model->getFrontPicFn()?>" />
                            <!-- slide 2 caption 1 parameters -->
                            <h3 class="ls-l" style="padding: 8px;color:white ;background-color:rgba(12,12,12,0.6);  top: 80%; left: 50%; font-size: 20px; text-align:center;"><?= $this->model->getStreetAddress()?><br>
                                <?= $this->model->getPrice()?>
                            </h3>

                        </div>
