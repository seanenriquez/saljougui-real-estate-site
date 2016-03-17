<?

// load 
$page_title = $this->page->getPageTitle();
$page_desc = "<insert page desc here>";
$page_keys = $this->page->getPageKeywords();

$homepage = false;

$city = $this->page->getPageCity();

include('includes/header.php');   
?>

  <body id="top">

    <?php include('includes/topbars.php')  ?>
 
    <!-- begin:header -->
    <div id="header" class="heading" style="background-image: url(<?= $this->page->getImageFn(); ?>)">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-8 col-md-offset-2 col-sm-12">
            <div class="page-title">
              <h2><?= fixDashes($this->page->getPageCity()) ?>, Florida MLS Search</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="/index.php">Home</a></li>
              <li class="active"><?= $city ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->
    
    <!-- begin:info -->
    <div id="service">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ">
                                   
            <h1 class="big-title text-center"><?= $this->page->getPageHeadline()  ?></h1>
            
             <a class="btn btn-default scrollto" href="#content"><i class="fa fa-arrow-down"></i>Search The Properties With Our One-Button-Search!</a>
                        
            <div class="blog-title">
                <?= $this->page->getPageContent() ?>
            </div> 
          </div>
          
          <div class="row">
          
            <h2>There are currently <?= $this->page->getPageCurrentHits() ?> properties available. In the past 12 months, <?= $this->page->getPageClosedHits() ?> units have sold with an average price of $<?= $this->page->getPageClosedAvgPrice() ?>, a low price of $<?= $this->page->getPageClosedLoPrice() ?> a high price of $<?= $this->page->getPageClosedHiPrice() ?>. The average time on market was <?= $this->page->getPageClosedAvgDOM() ?> days. Homes currently on the market start at $$$’</h2>
	          
            <? if ($this->page->getPageYouTubeId()!="") { ?>
	            <div class="embed-responsive embed-responsive-16by9">  
	              <iframe src="//www.youtube.com/embed/<?= $this->page->getPageYouTubeId() ?>" frameborder="0" allowfullscreen></iframe>
	            </div>
            <? } ?>
            
            <hr>
            
            <?= $this->page->getPageAgent() ?>
            
          </div>
        </div>
      </div>    
    </div>
    <!-- end:info -->

    <!-- begin:content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="blog-container">
              <div class="blog-content"> 
                
                    <?php 
                                     
                      $action=basename(__FILE__, '.php');               // load action from filename for consistancy      
                      $controller = new retsController($action.'-search');    // register controller with page action and parameter
                      $controller->invoke();                            // invokde controller to get view

                    ?>              
              </div>
              
            </div>
          </div>
        </div>
    </div>
    </div>
    <!-- end:content -->

    <!-- begin:subscribe
    <div id="subscribe">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-sm-8 col-xs-12">
            <h3>The Shattow Group Newsletter</h3>
          </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="input-group">
              <input type="text" class="form-control input-lg" placeholder="Enter your mail">
              <span class="input-group-btn">
                <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-envelope"></i></button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end:subscribe -->

    <?php include('includes/footer.php'); ?>
 
    <?php include('includes/bottom_scripts.php');  ?>
    
  </body>
</html>

