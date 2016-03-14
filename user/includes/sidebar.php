<!--Begin Sidebar-->
<div class="span3">
<div class="well sidebar-nav" id="menu_nav">
<ul class="nav nav-list">
<li class="nav-header">Main Menu</li>
<?php
if (isset($_SESSION["LOGGEDIN"]))
{
  if($_SESSION['USER_TYPE'] == 4)
  {
    ?>
    <li><a href="https://http://166.62.39.55:2083/" target="_blank"><i class="icon-wrench"></i> cPanel</a></li> 
    <li><a href="https://http://166.62.39.55:2087/" target="_blank"><i class="icon-wrench"></i> WHM</a></li> 
    <li><a href="<?=$panel_url;?>/settings.php"><i class="icon-wrench"></i> Panel Settings</a></li>
    <?php
  }
//!Logged In 
?>
<li><a href="<?=$base_url;?>" target="_blank"><i class="icon-home"></i> Main Site</a></li>
<?php if ($_SESSION['USER_TYPE'] == 1 || $_SESSION['USER_TYPE'] == 4)
{
  //if user is admin show settings and system log links
  //!View Logs
  if($_SESSION['USER_TYPE'] == 4)
  {
    ?>
    <li><a href="<?=$panel_url;?>/view.php?type=logs"><i class="icon-search"></i> Logs</a></li>
    <?php 
  }
}
?>
<li><a href="<?=$panel_url;?>/logout.php"><i class="icon-off"></i> Logout</a></li>
<li class="divider"></li>
<li class="nav-header">My Account</li>
<li><a href="<?=$panel_url;?>/edit-user.php?id=<?=$_SESSION['USERID'];?>"><i class="icon-wrench"></i> Edit Profile</a></li>
<?php if ($_SESSION['USER_TYPE'] == 1 || $_SESSION['USER_TYPE'] == 4)
{
  //if user is Admin show User and Pages administration links
  //!Administrative Edit Links
?>
<?php
if($_SESSION['USER_TYPE'] == 4)
{
?>
  <li class="divider"></li>
  <li class="nav-header">Users</li>
  <li><a href="<?=$panel_url;?>/view.php?type=users"><i class="icon-search"></i> View Users</a></li>
  <li><a href="<?=$panel_url;?>/add.php?type=users"><i class="icon-plus"></i> Add User</a></li>
<?php
}
?>
<li class="divider"></li>
<!-- !Pages 
<li class="nav-header">Pages</li>
<li><a href="<?=$panel_url;?>/view.php?type=pages"><i class="icon-search"></i> View Pages</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=page"><i class="icon-plus"></i> Add Pages</a></li>
<li class="divider"></li>
<!-- !Cities -->
<li class="nav-header">Cities</li>
<li><a href="view.php?type=city"><i class="icon-search"></i> View Cities</a></li>
<li><a href="add.php?type=city"><i class="icon-plus"></i> Add Cities</a></li>
<li class="divider"></li>
<!-- !Subdivisions -->
<li class="nav-header">Communities</li>
<li><a href="<?=$panel_url;?>/view.php?type=subdivisions"><i class="icon-search"></i> View Communities</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=community"><i class="icon-plus"></i> Add Comunity</a></li>
<li class="divider"></li>

<!-- !Custom Listings -->
<li class="nav-header">Custom Listings</li>
<li><a href="<?=$panel_url;?>/view.php?type=custom_listings"><i class="icon-search"></i> View Custom Listings</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=custom_listing"><i class="icon-plus"></i> Add Custom Listing</a></li>
<li class="divider"></li>

<li class="nav-header">Agents</li>
<li><a href="<?=$panel_url;?>/view.php?type=staff"><i class="icon-search"></i> View Agents</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=staff"><i class="icon-plus"></i> Add Agents</a></li>
<li class="divider"></li>
<!-- !Events
<li class="nav-header">EVENTS</li>
<li><a href="<?=$panel_url;?>/view.php?type=events"><i class="icon-search"></i> View Events</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=events"><i class="icon-plus"></i> Add Event</a></li>
<li class="divider"></li>
<!-- !Attractions
<li class="nav-header">ATTRACTIONS</li>
<li><a href="<?=$panel_url;?>/view.php?type=attractions"><i class="icon-search"></i> View Attractions</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=attractions"><i class="icon-plus"></i> Add Attractions</a></li>
<li class="divider"></li>
<!-- !Faqs -->
<!--
<li class="nav-header">FAQS</li>
<li><a href="<?=$panel_url;?>/view.php?type=faq"><i class="icon-search"></i> View All</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=faq"><i class="icon-plus"></i> Add FAQ</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=faq_category"><i class="icon-plus"></i> Add Category</a></li>
<li><a href="<?=$panel_url;?>/view.php?type=faq_category"><i class="icon-search"></i> View Category</a></li>
<li class="divider"></li>  
--?
<!-- !Blogs -->
<!--
<li class="nav-header">Blog</li>
<li><a href="<?=$panel_url;?>/view.php?type=blog"><i class="icon-search"></i> View Blog Posts</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=blog"><i class="icon-plus"></i> Add Blog Post</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=blog_category"><i class="icon-plus"></i> Add Category</a></li>
<li><a href="<?=$panel_url;?>/view.php?type=blog_category"><i class="icon-search"></i> View Category</a></li>
<li class="divider"></li>
-->
<!-- !News    
<li class="nav-header">News</li>
<li><a href="<?=$panel_url;?>/view.php?type=news"><i class="icon-search"></i> View News Posts</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=news"><i class="icon-plus"></i> Add News Post</a></li>
<li><a href="<?=$panel_url;?>/add.php?type=news_category"><i class="icon-plus"></i> Add Category</a></li>
<li><a href="<?=$panel_url;?>/view.php?type=news_category"><i class="icon-search"></i> View Category</a></li>
-->

<?php
  }//end admin nav
} 
else {
//!Not Logged In
//user is not logged in, display just the login link

?>
<li><a href="login.php"><i class="icon-home"></i> Login</a></li>
<?php  
  }
?>
</ul>
</div>
</div>
<!--End Sidebar-->