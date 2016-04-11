<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Contact me about this property</button>

                                                    <!-- Modal -->
                                                    <div id="myModal" class="modal fade" role="dialog">
                                                      <div class="modal-dialog modal-lg">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button btn-lg" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title text-center">Contact me about non view</h4>
                                                          </div>
                                                          <div class="modal-body">
  <div class="container "> 
    <div class="bottom-contact">
        <div class="row">
            <div class="col-md-10 col-sm-10">
                <form role="form" id="validForm">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputName"  placeholder="Name">
                    </div>
                    
                    <div class="form-group">
                        <input type="email" required class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <textarea id="textarea" class="form-control" rows="10" value="">Hello test! </textarea>
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
                <div class="col-md-12 col-sm-12">
                    <div class="address">
                        <div class="title styler_color">Address, Phone & Email</div>
                        <div class="name styler_color">Las Vegas Luxe Realty</div>
                        <address class="styler_color">
                            Melanie Saljougui<br />
                            9890 S. Maryland Pkwy. Suite 200  <br />
                            Las Vegas, Nevada 89193<br />
                            <br />
                            Phone: 702-313-7003<br />
                            Cell: 415-815-9079
                            <!-- $moreinfo
                            f. 214.985.9003<br />
                            -->
                            <a class="styler_color" 
                                href="mailto:melaniesaljougui@gmail.com">melaniesaljougui@gmail.com</a>
                        </address>
                    </div>
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