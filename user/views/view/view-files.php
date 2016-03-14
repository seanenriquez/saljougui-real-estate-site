<?php
//prevent non-administrative users from accessing this page
include('includes/secure.php');
?>
<div class="span9">
<ul class="breadcrumb">
<li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
<li class="active">View Files</li>
</ul>
<div class="well well-small">
<h1>View Files</h1>
<iframe src="<?=$root_url;?>/elfinder/elfinder.php" width="100%" height="600px" frameborder="0"></iframe>
<!-- Start elfinder instance -->
<div id="elfinder"></div>
<!-- End elfinder instance -->
</div>
</div>