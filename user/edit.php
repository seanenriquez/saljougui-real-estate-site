<?php
//Global Panel Settings
include('includes/panel-settings.php');
include('includes/main.funcs.php');
include('includes/logincheck.php');
include('includes/config.php');

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL & ~E_DEPRECATED);
ini_set('display_errors',1);

//get type
$type = isset($_GET['type']) ? $_GET['type'] : NULL;
$type = strtoupper($type);
//Page Setup
$title = "EDIT $type";
$page_name = "view";
$status = isset($_GET['status']) ? $_GET['status'] : NULL;
//get id
$id = isset($_POST['id']) ? $_POST['id'] : NULL;
//check for action
$action = isset($_POST['post_action']) ? $_POST['post_action'] : NULL;
if($action)
{
	switch($action)
	{
    //!Update Community
    case "update_city":
    
      $status = "updated";
      $city_update_ok=false;
      if($_POST)
        {
          extract($_POST);
          $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
          mysql_select_db($dbname, $con) or die(mysql_error());
          $city = mysql_real_escape_string($city);
          $headline = mysql_real_escape_string($headline);
          $youtube_id = mysql_real_escape_string($youtube_id);
          $content = mysql_real_escape_string($content);
          $additional_info_link = mysql_real_escape_string($additional_info_link);
          //$subdivision_area_name = mysql_real_escape_string($subdivision_area_name);
          //$street_address = mysql_real_escape_string($street_address);
          //$state = mysql_real_escape_string($state);
          //$zip = mysql_real_escape_string($zip);
          $keywords = mysql_real_escape_string($keywords);
          $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
          mysql_select_db($dbname, $con) or die(mysql_error());
          $sql = "UPDATE city_information SET `city` = '$city', `youtube_id` = '$youtube_id', `agent_id` = '$agent_id', `headline` = '$headline', `content` = '$content', `additional_info_link` = '$additional_info_link', `keywords` = '$keywords', `youtube_keywords` = '$youtube_keywords', `youtube_desc` = '$youtube_desc' WHERE id=$id";
          $res = mysql_query($sql) or die(mysql_error());
          logAction($_SESSION['USERID'], "Updated City: <a href=\"edit.php?type=city&id=$id\">$city</a>");
          $city_update_ok=true;
          mysql_close($con);
        }
    break;
		//!Update Community
		case "update_community":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$subdivision_area_name = mysql_real_escape_string($subdivision_area_name);
				$youtube_id = mysql_real_escape_string($youtube_id);
				$content = mysql_real_escape_string($content);
				$additional_info_link = mysql_real_escape_string($additional_info_link);
				$street_address = mysql_real_escape_string($street_address);
				$city = mysql_real_escape_string($city);
				$state = mysql_real_escape_string($state);
				$zip = mysql_real_escape_string($zip);
        $headline = mysql_real_escape_string($headline);
				$keywords = mysql_real_escape_string($keywords);
				$sql = "UPDATE `community_area_information` SET `subdivision_area_name` = '$subdivision_area_name', `youtube_id` = '$youtube_id', `content` = '$content', `additional_info_link` = '$additional_info_link',`street_address` = '$street_address', `city` = '$city', `state` = '$state', `zip` = '$zip', `keywords` = '$keywords', `headline` = '$headline',`youtube_keywords` = '$youtube_keywords', `youtube_desc` = '$youtube_desc' WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated Community: <a href=\"edit.php?type=community&id=$id\">$subdivision_area_name</a>");
				mysql_close($con);

			}
		break;

		//!Update Page
		case "update_page":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$page_text = addslashes($page_text);
				$page_description = addslashes($page_description);
				$sql = "UPDATE pages SET `page_name` = '$page_name', `page_title` = '$page_title', `page_keywords` = '$page_keywords', `page_description` = '$page_description', `page_text` = '$page_text', `active` = '$active' WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated page: <a href=\"edit.php?type=page&id=$id\">$page_name</a>");
				mysql_close($con);

			}
		break;
		
		//!Update FAQ
		case "update_faq":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$question = addslashes($question);
				$answer = addslashes($answer);
				$sql = "UPDATE faqs SET `question` = '$question', `answer` = '$answer', `category_id` = '$category_id' WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated FAQ: <a href=\"edit.php?type=faq&id=$id\">$question</a>");
				mysql_close($con);

			}
		break;
		
		//!Update News Post
		case "update_faq_category":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$sql = "UPDATE faq_category SET `category` = '$category' WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated FAQ Category: <a href=\"edit.php?type=faq_category&id=$id\">$category</a>");
				mysql_close($con);

			}
		break;
		
		//!Update Blog Post
		case "update_blog_post":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$short_description = addslashes($short_description);
				$content = mysql_real_escape_string($content);
				$title = mysql_real_escape_string($title);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$sql = "UPDATE `blogs` SET `title` = '$title', `content` = '$content', `category_id` = '$category_id', `source_link` = '$source_link', `youtube_id` = '$youtube_id', `short_description` = '$short_description', `keywords` = '$keywords' WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated Blog Post: <a href=\"edit.php?type=blog&id=$id\">$title</a>");
				mysql_close($con);

			}
		break;
		
		//!Update Blog Category
		case "update_blog_category":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$sql = "UPDATE blog_category SET `category` = '$category' WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated Blog Category: <a href=\"edit.php?type=blog_category&id=$id\">$category</a>");
				mysql_close($con);

			}
		break;
		
		//!Update Partner
		case "update_partner":
		$status = "updated";
		if($_POST)
		{
				extract($_POST);
				$partner_name = addslashes($partner_name);
				$sql = $dbpdo->prepare("UPDATE `partners` SET `partner_name` = :partner_name, `partner_url` = :partner_url, `active` = :active WHERE `id` = :partner_id");
				$data = array(
				'partner_id' => $id,
				'partner_name' => $partner_name,
				'partner_url' => $partner_url,
				'active' => $active
				);
				
				if($sql->execute($data))
				{
					$status = "updated";
					logAction($_SESSION['USERID'], "Updated Partner: <a href=\"edit.php?type=partner&id=$id\">$partner_name</a>");
				}
				else
				{
					$status = "error";
				}
				
		}
		break;
		
		//!Update Attraction
		case "update_attraction":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$title = addslashes($title);
				$description = addslashes($description);
				$content = addslashes($content);
				$youtube_id = addslashes($youtube_id);
				$file_name = addslashes($file_name);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$sql = "UPDATE `attractions` SET `title` = '$title', `description` = '$description', `content` = '$content', `youtube_id` = '$youtube_id', `file_name` = '$file_name'  WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated Attraction: <a href=\"edit.php?type=attractions&id=$id\">$title</a>");
				mysql_close($con);

			}
		break;
		
		//!Update Builder
		case "update_builder":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$title = addslashes($title);
				$description = addslashes($description);
				$content = addslashes($content);
				$youtube_id = addslashes($youtube_id);
				$file_name = addslashes($file_name);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$sql = "UPDATE `local_builders` SET `title` = '$title', `description` = '$description', `content` = '$content', `youtube_id` = '$youtube_id', `file_name` = '$file_name'  WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated Builder: <a href=\"edit.php?type=builders&id=$id\">$title</a>");
				mysql_close($con);

			}
		break;
		//!Update Event
		case "update_event":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$event_name = addslashes($event_name);
				$event_location = addslashes($event_location);
				$event_description = addslashes($event_description);
				$event_long_description = addslashes($event_long_description);
				$event_price = addslashes($event_price);
				$event_youtube_id = addslashes($event_youtube_id);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$sql = "UPDATE `events` SET `event_name` = '$event_name', `event_date` = '$event_date', `event_location` = '$event_location', `event_description` = '$event_description', `event_long_description` = '$event_long_description', `event_price` = '$event_price', `event_file_name` = '$event_file_name', `event_youtube_id` = '$event_youtube_id' WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated Event: <a href=\"edit.php?type=events&id=$id\">$event_name</a>");
				mysql_close($con);

			}
		break;
		
		//!Update News Post
		case "update_news_post":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$sql = "UPDATE news SET `title` = '$title', `content` = '$content', `youtube_id` = '$youtube_id', `category_id` = '$category_id', `source_link` = '$source_link', `short_description` = '$short_description' WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated News Post: <a href=\"edit.php?type=news&id=$id\">$title</a>");
				mysql_close($con);

			}
		break;
		
		//!Update News Category
		case "update_news_category":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$sql = "UPDATE news_category SET `category` = '$category' WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated News Category: <a href=\"edit.php?type=news_category&id=$id\">$category</a>");
				mysql_close($con);

			}
		break;
		
		//!Update Testimonial
		case "update_testimonial":
		$status = "updated";
		if($_POST)
			{
				extract($_POST);
				$comments = addslashes($comments);
				$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
				mysql_select_db($dbname, $con) or die(mysql_error());
				$sql = "UPDATE testimonials SET `client_name` = '$client_name', `comments` = '$comments' WHERE `id` = '$id'";
				$res = mysql_query($sql) or die(mysql_error());
				logAction($_SESSION['USERID'], "Updated Testimonial: <a href=\"edit.php?type=testimonials&id=$id\">$client_name</a>");
				mysql_close($con);

			}
		break;
		
		//!Update Staff Member
		case "update_staff":
		//!Insert New Staff Member into users table
		
		extract($_POST);
		
		$sql = $dbpdo->prepare("UPDATE `staff` SET `first_name` = :first_name, `last_name` = :last_name, `email` = :email, `bio` = :bio, `testimonial` = :testimonial, `phone` = :phone, `website` = :website, `facebook` = :facebook, `twitter` = :twitter, `activerain` = :activerain, `linkedin` = :linkedin, `address` = :address WHERE `id` = :staff_id");
		
		$data = array(
		'first_name' => $first_name,
		'last_name' => $last_name,
		'email' => $email,
		'phone' => $phone,
		'website' => $website,
		'facebook' => $facebook,
		'twitter' => $twitter,
		'activerain' => $activerain,
		'linkedin' => $linkedin,
		'address' => $address,
		'bio' => $bio,
		'testimonial' => $testimonial,
		'staff_id' => (int)$id
		);

		if($sql->execute($data))
		{
			$status = "updated";
		}
		else
		{
			$status = "error";
		}
				
		break;
		
		//!Update Custom Listing
		case "update_custom_listing":
		
		extract($_POST);
		
		$sql = $dbpdo->prepare("UPDATE `custom_listings` SET `content` = :custom_listing_content, `active` = :active_status, `youtube_url` = :custom_listing_youtube_url WHERE `id` = :custom_listing_id");
		
		$data = array(
		'custom_listing_id' => $id,
		'custom_listing_content' => $content,
		'custom_listing_youtube_url' => $youtube_url,
		'active_status' => $active
		);
		
		if($sql->execute($data))
		{
			$status = "updated";
		}
		else
		{
			$status = "error";
		}
		
		break;
		
	}
}

include('includes/header.php');
?>

<body>
<?php include('includes/top-nav.php');?>
<div class="container-fluid">
  <div class="row-fluid">
    <?php //include the navigation sidebar
		include('includes/sidebar.php');

		//!Check for edit type
		switch($type):
		
		case NULL:
			//redirect to main admin panel
			?>
			<script type="text/javascript">
            <!--
            window.location = "<?=$panel_url;?>"
            //-->
            </script>
            <?php
		break;
		
		//!Page Edit
		case "PAGE":
			include('views/edit/edit-page.php');
		break;
		
		//!Edit Staff Member
		case "STAFF":
			include('views/edit/edit-staff.php');
		break;
    
    //!City Edit
    case "CITY":
    

    // include('views/view/view-cities.php?status=updated');  // NOT WORKING
    include('views/edit/edit-city.php');
    
    break;
		
		//!Subdivision Edit
		case "COMMUNITY":
			include('views/edit/edit-community.php');
		break;
		
		//!Attraction Edit
		case "ATTRACTIONS":
			include('views/edit/edit-attraction.php');
		break;

		//!Attraction Edit
		case "BUILDER":
			include('views/edit/edit-builder.php');
		break;
		
		//!Events Edit
		case "EVENTS":
			include('views/edit/edit-event.php');
		break;
				
		//!Edit FAQ
		case "FAQ":
			include('views/edit/edit-faq.php');
		break;
				
		//!Edit FAQ CATEGORY
		case "FAQ_CATEGORY":
			include('views/edit/edit-faq-category.php');
		break;
		
		//!Edit Blog Post
		case "BLOG":
			include('views/edit/edit-blog-post.php');
		break;
				
		//!Edit NEWS CATEGORY
		case "BLOG_CATEGORY":
			include('views/edit/edit-blog-category.php');
		break;
		
		//!Edit News Post
		case "NEWS":
			include('views/edit/edit-news-post.php');
		break;
				
		//!Edit NEWS CATEGORY
		case "NEWS_CATEGORY":
			include('views/edit/edit-news-category.php');
		break;
		
		//!Edit Testomonial
		case "TESTIMONIALS":
			include('views/edit/edit-testimonial.php');
		break;
		
		//!Edit Custom Listing
		case "CUSTOM_LISTING":
			include('views/edit/edit-custom-listing.php');
		break;
		
		//!Edit Partner
		case "PARTNER":
			include('views/edit/edit-partner.php');
		break;
		
		//!Default Edit View
		default:
			include('views/view/view-default.php');
		break;
		
		endswitch;
?>
  </div>
  <hr>
  <?php include('includes/footer.php');?>
</div>
<?php include('includes/bottom-scripts.php');?>
</body>
</html>