<?
/* This file prevents non-administrators from viewing a page */
$secure_user_types = array(1,4);
if(!in_array($_SESSION['USER_TYPE'],$secure_user_types))
{
?>
<script type="text/javascript">
<!--
window.location = "index.php"
//-->
</script>
<?
}
?>