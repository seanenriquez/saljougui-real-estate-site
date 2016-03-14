   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="<?=$assets;?>/js/bootstrap.js"></script>
<div></div>
  <script type="text/javascript" src="<?=$assets;?>/js/lightbox.js"></script> 
  <script type="text/javascript" src="<?=$assets;?>/js/adminpanel.js"></script>
    <!-- Load jQuery --> 
    <script type="text/javascript" src="http://www.google.com/jsapi"></script> 
    <!-- Load jQuery build --> 
    <script type="text/javascript" src="<?=$assets;?>/js/tiny_mce/tiny_mce.js"></script> 
    <script type="text/javascript">
    tinyMCE.init({
      
      // General options
      mode : "textareas",
      theme : "advanced",
      plugins : "jbimages,paste,pagebreak,style,layer,table,save,advhr,advimage,advlink,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras",

      // Theme options
      theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
      theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,jbimages,cleanup,help,code,|,forecolor,backcolor",
      theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,fullscreen",
      /* theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak", */
      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      theme_advanced_resizing : true,

      // Example content CSS (should be your site CSS)
      content_css : "<?=$assets;?>/css/tiny_mce.css",
      
      relative_urls : false

    });
</script>