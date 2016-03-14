<?
//Global Panel Settings
include('includes/panel-settings.php');
include('includes/main.funcs.php');
include('includes/logincheck.php');
//get type
$type = isset($_GET['type']) ? $_GET['type'] : NULL;
$type = strtoupper($type);
//Page Setup
$title = "VIEW $type";
$page_name = "view";
$status = isset($_GET['status']) ? $_GET['status'] : NULL;
//check for action
$action = isset($_GET['action']) ? $_GET['action'] : NULL;
$file = isset($_GET['filename']) ? $_GET['filename'] : NULL;

//!Action Check
if($action)
{
	switch($action)
	{
		//!Delete action
		case "delete":
			$status = "delete_file";
		break;
		
		//!Clear Logs action
		case "clear-logs":
			$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
			mysql_select_db($dbname, $con) or die(mysql_error());
			$sql = "DELETE FROM `ip_logs`";
			$result = mysql_query($sql) or die(mysql_error());
			logAction($_SESSION['USERID'], "Cleared log table");
			mysql_close($con);		
		break;
	}
}
//gotta include the header!
include('includes/header.php');
?>

<body>
<? include('includes/top-nav.php');?>
<div class="container-fluid">
  <div class="row-fluid">
    <? //include the navigation sidebar
		include('includes/sidebar.php');

		//!View Type Check
		switch($type){
		
		case NULL:
			//redirect to main admin panel
			?>
			<script type="text/javascript">
            <!--
            window.location = "<?=$panel_url;?>"
            //-->
            </script>
            <?
		break;
		
		//!View Users
		case "USERS":
			include('views/view/view-users.php');
		break;
		
		//!View Staff Members
		case "STAFF":
			include('views/view/view-staff.php');
		break;
		
		//!View Profile
		
		case "PROFILE":
			include('views/view/view-profile.php');
		break;
		
		//!View Logs
		case "LOGS":
			include('views/view/view-logs.php');
		break;
		
		//!View Pages
		case "PAGES":
			include('views/view/view-pages.php');
		break;
				
		//!View Partners
		case "EVENTS":
			include('views/view/view-events.php');
		break;
    
    //!View Cities
    case "CITY":
      include('views/view/view-cities.php');
    break;
  
		
		//!View Subdivisions
		case "SUBDIVISIONS":
			include('views/view/view-communities.php');
		break;
		
		//!View Subdivisions
		case "COMMUNITIES":
			include('views/view/view-communities.php');
		break;
		
		//!View Attractions
		case "ATTRACTIONS":
			include('views/view/view-attractions.php');
		break;

		//!View Builders
		case "BUILDERS":
			include('views/view/view-builders.php');
		break;
		
		//!View FAQS
		case "FAQ":
			include('views/view/view-faqs.php');
		break;
		
		//!View Blog Category
		case "FAQ_CATEGORY":
			include('views/view/view-faq-categories.php');
		break;
		
		//!View Blog Posts
		case "BLOG":
			include('views/view/view-blog-posts.php');
		break;
		
		//!View Blog Category
		case "BLOG_CATEGORY":
			include('views/view/view-blog-categories.php');
		break;
		
		//!View News Posts
		case "NEWS":
			include('views/view/view-news-posts.php');
		break;
		
		//!View News Posts
		case "NEWS_CATEGORY":
			include('views/view/view-news-categories.php');
		break;
		
		//!View Testimonials
		case "TESTIMONIALS":
			include('views/view/view-testimonials.php');
		break;
		
		//!View Files
		case "FILES":
			include('views/view/view-files.php');
		break;
		
		//!View Custom Listings
		case "CUSTOM_LISTINGS":
			include('views/view/view-custom-listings.php');
		break;
		
		//!View Partners
		case "PARTNERS":
			include('views/view/view-partners.php');
		break;
		
		//!Default View (WOOPS)
		default:
			include('views/view/view-default.php');
		break;
		
		} //end switch($type)
?>
  </div>
  <hr>
  <? include('includes/footer.php');?>
</div>
<? include('includes/bottom-scripts.php');?>
</body>
</html>