<?
$page_title = $this->page->getPageTitle();
$page_desc = "<insert page desc here>";
$page_keys = $this->page->getPageKeywords();

$homepage = false;

$city = $this->page->getPageCity();
$subdiv =  $this->page->getPageSubdiv();

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
              <h2><?= $subdiv ?></h2>
              <h2><?= fixDashes($this->page->getPageCity()) ?>, Florida MLS Search</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="/index.php">Home</a></li>
              <li><a href="/fl/<?= fixBlanks($city) ?>"><?= $city ?></a></li>
              <li class="active"><?= $subdiv ?></li>
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
          <div class="col-sm-12 ">
          
            <h1 class="big-title"><?= $this->page->getPageHeadline()  ?></h1>
            
            <div class="blog-title">
                <p><?= $this->page->getPageContent() ?></p> 
            </div> 
            
            <a class="btn btn-default scrollto" href="#content"><i class="fa fa-arrow-down"></i> Check Out The Properties!</a>

            <h2>There are currently <?= $this->page->getPageCurrentHits() ?> properties available. In the past 12 months, <?= $this->page->getPageClosedHits() ?> units have sold with an average price of $<?= $this->page->getPageClosedAvgPrice() ?>, a low price of $<?= $this->page->getPageClosedLoPrice() ?> a high price of $<?= $this->page->getPageClosedHiPrice() ?>. The average time on market was <?= $this->page->getPageClosedAvgDOM() ?> days. Homes currently on the market start at $$$’</h2>
            
            <? if ($this->page->getPageYouTubeId()!="") { ?>
	            <div class="embed-responsive embed-responsive-16by9">  

	              <iframe src="//www.youtube.com/embed/<?= $this->page->getPageYouTubeId() ?>" frameborder="0" allowfullscreen></iframe>
	              
	            </div>    
            <? } ?>
            
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


    <?php include('includes/footer.php'); ?>
 
    <?php include('includes/bottom_scripts.php');  ?>
    
  </body>
  
</html>