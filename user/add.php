<?php
//Global Panel Settings
include('includes/config.php');
include('includes/panel-settings.php');
include('includes/main.funcs.php');

//prevent non-administrative users from accessing this page
include('includes/secure.php');
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL & ~E_DEPRECATED);
ini_set('display_errors',1);

//get type
$type = isset($_GET['type']) ? $_GET['type'] : NULL;
$type = strtoupper($type);
//Page Setup
$title = "ADD $type";
$page_name = "add";
//check for $_POST data
$update_status = 0;
$action = isset($_POST['post_action']) ? $_POST['post_action'] : NULL;

if($action)
{
  switch($action)
  {
    case "add_city":

      //!Insert New Subdivision
      extract($_POST);

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
      $sql = "INSERT INTO `city_information` SET `city` = '$city', `youtube_id` = '$youtube_id',  `agent_id` = '$agent_id', `headline` = '$headline', `content` = '$content', `additional_info_link` = '$additional_info_link', `keywords` = '$keywords', `youtube_keywords` = '$youtube_keywords', `youtube_desc` = '$youtube_desc';";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added City: <a href=\"edit.php?type=city&id=$new_id\">$title</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;
    case "add_subdivision":
      //!Insert New Subdivision
      extract($_POST);
      $subdivision_area_name = mysql_real_escape_string($subdivision_area_name);
      $youtube_id = mysql_real_escape_string($youtube_id);
      $content = mysql_real_escape_string($content);
      $additional_info_link = mysql_real_escape_string($additional_info_link);
      $street_address = mysql_real_escape_string($street_address);
      $city = mysql_real_escape_string($city);
      $state = mysql_real_escape_string($state);
      $zip = mysql_real_escape_string($zip);
      $keywords = mysql_real_escape_string($keywords);
      $headline = mysql_real_escape_string($headline);

      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO `community_area_information` SET `subdivision_area_name` = '$subdivision_area_name', `youtube_id` = '$youtube_id', `content` = '$content', `additional_info_link` = '$additional_info_link',`street_address` = '$street_address', `city` = '$city', `headline` = '$headline', `state` = '$state', `zip` = '$zip', `keywords` = '$keywords', `youtube_keywords` = '$youtube_keywords', `youtube_desc` = '$youtube_desc';";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added Subdivision: <a href=\"edit.php?type=community&id=$new_id\">$title</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_attraction":
      //!Insert New Attraction
      extract($_POST);
      $title = mysql_real_escape_string($title);
      $description = mysql_real_escape_string($description);
      $content = mysql_real_escape_string($content);
      $youtube_id = mysql_real_escape_string($youtube_id);
      $file_name = mysql_real_escape_string($file_name);
      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO `attractions` SET `title` = '$title', `description` = '$description', `content` = '$content', `youtube_id` = '$youtube_id', `file_name` = '$file_name' ";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added Attraction: <a href=\"edit.php?type=attraction&id=$new_id\">$title</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;
    case "add_builder":
      //!Insert New Attraction
      extract($_POST);
      $title = mysql_real_escape_string($title);
      $description = mysql_real_escape_string($description);
      $content = mysql_real_escape_string($content);
      $youtube_id = mysql_real_escape_string($youtube_id);
      $file_name = isset($_POST['file_name']) ? mysql_real_escape_string($file_name) : NULL;
      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO `local_builders` SET `title` = '$title', `description` = '$description', `content` = '$content', `youtube_id` = '$youtube_id', `file_name` = '$file_name' ";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added Local Builder: <a href=\"edit.php?type=builder&id=$new_id\">$title</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_user":
      //!Insert New User into users table
      extract($_POST);
      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $salt = mt_rand();
      $hashkey = md5($salt.$email);
      $password = md5($password);
      $sql = "INSERT INTO `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', `phone` = '$phone', `hashkey` = '$hashkey', `password` = '$password'";
      $result = mysql_query($sql) or die(mysql_error());
      if($result)
      {
        $update_status = "updated";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_staff":
      //!Insert New Staff Member into users table

      extract($_POST);

      $sql = $dbpdo->prepare("INSERT INTO `staff` SET first_name = :first_name, `last_name` = :last_name, `email` = :email, `bio` = :bio, `testimonial` = :testimonial, 
      `phone` = :phone, `website` = :website, `facebook` = :facebook, `twitter` = :twitter, `activerain` = :activerain, `linkedin` = :linkedin, `address` = :address");

      $sql = "INSERT INTO `staff` SET `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', `phone` = '$phone', `website` = '$website', `facebook` = '$facebook', twitter = '$twitter', activerain = '$activerain', linkedin = '$linkedin', address = '$address', bio = '$bio', testimonial = '$testimonial' ";
      
      $data = array(
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':email' => $email,
        ':phone' => $phone,
        ':website' => $website,
        ':facebook' => $facebook,
        ':twitter' => $twitter,
        ':activerain' => $activerain,
        ':linkedin' => $linkedin,
        ':address' => $address,
        ':bio' => $bio,
        ':testimonial' => $testimonial
      );
      
      $result = mysql_query($sql) or die(mysql_error());
      
      // if($sql->execute($data))
      if ($result)
      {
        $update_status = "updated";
        $insert_id = $dbpdo->lastInsertId();
        $headers = 'From: webmaster@theshattowgroup.com' . "\r\n" .
        'Reply-To: webmaster@theshattowgroup.com' . "\r\n" .
        'Return-Path: webmaster@theshattowgroup.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_page":
      //!Insert New Page into pages table
      extract($_POST);
      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO pages SET `page_name` = '$page_name', `page_title` = '$page_title', `page_description` = '$page_description', `page_keywords` = '$page_keywords', `page_text` = '$page_text'";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added page: <a href=\"edit.php?type=page&id=$new_id\">$page_name</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;



    case "add_event":
      //!Insert New Partner into Partners table
      extract($_POST);
      $event_name = addslashes($event_name);
      $event_description = addslashes($event_description);
      $event_long_description = addslashes($event_long_description);
      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO `events` SET `event_name` = '$event_name', `event_date` = '$event_date', `event_description` = '$event_description', `event_location` = '$event_location', `event_long_description` = '$event_long_description', `event_price` = '$event_price', `event_file_name` = '$event_file_name', `event_youtube_id` = '$event_youtube_id'";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added Event: <a href=\"edit.php?type=events&id=$new_id\">$event_name</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_faq":
      //!Insert New FAQ into faqs table
      extract($_POST);
      $question = addslashes($question);
      $answer = addslashes($answer);
      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO faqs SET `question` = '$question', `answer` = '$answer', `category_id` = '$category_id'";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added FAQ: <a href=\"view.php?type=faq&id=$new_id\">$question</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_faq_category":
      //!Insert New FAQ Category
      extract($_POST);
      $content = addslashes($content);
      $title = addslashes($title);
      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO `faq_category` SET `category` = '$category'";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added FAQ Category: <a href=\"edit.php?type=faq_category&id=$new_id\">$category</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_blog_post":
      //!Insert New Blog Post into blogs table
      extract($_POST);
      $content = addslashes($content);
      $title = addslashes($title);
      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO `blogs` SET `title` = '$title', `content` = '$content', `category_id` = '$category_id', `source_link` = '$source_link', `youtube_id` = '$youtube_id', `short_description` = '$short_description', `keywords` = '$keywords'";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added Blog Post: <a href=\"edit.php?type=blog&id=$new_id\">$title</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_blog_category":
      //!Insert New Blog Category into blogs table
      extract($_POST);
      $content = addslashes($content);
      $title = addslashes($title);
      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO `blog_category` SET `category` = '$category'";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added Blog Category: <a href=\"edit.php?type=blog_category&id=$new_id\">$category</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_news_post":
      //!Insert News Post into news table
      extract($_POST);
      $content = addslashes($content);
      $title = addslashes($title);

      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO news SET `title` = '$title', `content` = '$content', `keywords` = '$keywords', `youtube_id` = '$youtube_id', `category_id` = '$category_id', `source_link` = '$source_link', `short_description` = '$short_description'";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added News Post: <a href=\"edit.php?type=news&id=$new_id\">$title</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_news_category":
      extract($_POST);
      $content = addslashes($content);
      $title = addslashes($title);
      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO news_category SET `category` = '$category' ";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added News Category: <a href=\"edit.php?type=news_category&id=$new_id\">$category</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_testimonial":
      //!Insert Testimonial into testimonials table
      extract($_POST);
      $comments = addslashes($comments);
      $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
      mysql_select_db($dbname, $con) or die(mysql_error());
      $sql = "INSERT INTO testimonials SET `client_name` = '$client_name', `comments` = '$comments'";
      $result = mysql_query($sql) or die(mysql_error());
      $new_id = mysql_insert_id();
      logAction($_SESSION['USERID'], "Added Testimonial: <a href=\"edit.php?type=testimonials&id=$new_id\">$client_name</a>");
      if($result)
      {
        $update_status = "added";
        $insert_id = mysql_insert_id();
        #echo $insert_id;
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_custom_listing":

      //!Insert Custom Listing into custom_listings table
      extract($_POST);
      $sql = $dbpdo->prepare("INSERT INTO `custom_listings` SET `listing_id` = :custom_listing_id, `content` = :custom_listing_content, `youtube_id` = :custom_listing_youtube_url, `active` = :custom_listing_active;", 
        array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $data = array(
        ':custom_listing_active' => $active,
        ':custom_listing_id' => $listing_id,
        ':custom_listing_content' => $content,
        ':custom_listing_youtube_url' => $youtube_url
      );
      if($sql->execute($data))
      {
        $update_status = "added";
      }
      else
      {
        $update_status = "error";
      }

      break;

    case "add_partner":
      //!Insert partner into partners table
      extract($_POST);
      $sql = $dbpdo->prepare("INSERT INTO `partners` SET `partner_name` = :partner_name, `partner_url` = :partner_url, `active` = :active");
      $data = array(
        'partner_name' => $partner_name,
        'partner_url' => $partner_url,
        'active' => $active
      );

      if($sql->execute($data))
      {
        $update_status = "added";
      }
      else
      {
        $update_status = "error";
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

      switch($type)
      {

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

          //!Add Users
        case "USERS":
          include('views/add/add-user.php');
          break;

          //!Add Staff Members
        case "STAFF":
          include('views/add/add-staff-member.php');
          break;

          //!Add City
        case "CITY":
          include('views/add/add-city.php');
          break;

          //!Add Community
        case "COMMUNITY":
          include('views/add/add-community.php');
          break;

          //!Add Pages
        case "PAGE":
          include('views/add/add-page.php');
          break;

          // !Events
        case "ATTRACTIONS":
          include('views/add/add-attraction.php');
          break;

          // !Builders
        case "BUILDER":
          include('views/add/add-builder.php');
          break;

          // !Events
        case "EVENTS":
          include('views/add/add-event.php');
          break;

          //!Add FAQS
        case "FAQ":
          include('views/add/add-faq.php');
          break;

          //!Add FAQ Category
        case "FAQ_CATEGORY":
          include('views/add/add-faq-category.php');
          break;

          //!Add BLOG POST
        case "BLOG":
          include('views/add/add-blog-post.php');
          break;

          //!Add BLOG Category
        case "BLOG_CATEGORY":
          include('views/add/add-blog-category.php');
          break;

          //!Add News POST
        case "NEWS":
          include('views/add/add-news-post.php');
          break;

          //!Add News Category
        case "NEWS_CATEGORY":
          include('views/add/add-news-category.php');
          break;

          //!Add Testimonial
        case "TESTIMONIALS":
          include('views/add/add-testimonial.php');
          break;

          //!Add Files
        case "FILES":
          include('views/add/add-files.php');
          break;

          //!Add Custom Listing
        case "CUSTOM_LISTING":
          include('views/add/add-custom-listing.php');
          break;

          //!Add Partner
        case "PARTNER":
          include('views/add/add-partner.php');
          break;

        default:
          include('views/view/view-default.php');
          break;

      }//end switch($type)
      ?>
    </div>

    <hr>
    <?php include('includes/footer.php');?>
  </div>

  <?php include('includes/bottom-scripts.php');?>
</body>
</html>
