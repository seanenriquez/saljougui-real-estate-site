
<div id="myModal<?= $this->model->rowIdx ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        
        <div class="modal-content">
            <div class="modal-body">

                <div class="bottom-contact">
                    <div class="row">
                        <div class="col-md-12 col-  sm-12 center-block">
                            <form role="form" id="validForm">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <input type="email" required class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea id="textarea" class="form-control" rows="10" value="">Hi Melanie, I'm interested  in <?= $this->model->getStreetAddress()?> <?= $this->model->getCityStZip()?>  MLS#: <?= $this->model-> getMLS()?> </textarea>
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
                    </div>
                    <div class="row">
                        <div class="address">

                            <div class="col-sm-6">
                                <div class="title styler_color">Key Realty</div>
                                <address class=" styler_color">
                                    Melanie Saljougui<br />
                                    9890 S. Maryland Pkwy. Suite 200  <br />
                                    Las Vegas, Nevada 89193<br />
                                    <br />
                                </address>
                            </div>
                            <div class="col-sm-6">
                                <div class="title styler_color">Phone & Email</div>
                                <address class=" styler_color">   
                                    <a href="tel:415-815-9079"><i class="fa fa-mobile-phone"></i> 415-815-9079</a><br /><a href="tel:702-313-7003"><i class="fa fa-phone"></i> 702-313-7003</a> <br />
                                    <a TARGET="_blank"  href="mailto:Melaniesaljougui@gmail.com?&subject=Intrested%20in%20<?= $this->model->getStreetAddress()?>,%20<?= $this->model->getCityStZip()?>,%20MLS#%20<?= $this->model-> getMLS()?>&body=Hi%20Melanie,">Melaniesaljougui@gmail.com</a>
                                </address>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-default center-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>