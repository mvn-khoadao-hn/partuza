<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Partuza</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?=PartuzaConfig::get('web_prefix')?>/css/container_iphone.css?v=5" rel="stylesheet" type="text/css">
<link type="text/css" href="<?=PartuzaConfig::get('web_prefix')?>/css/jquery.css?v=5" rel="Stylesheet" />
<script type="text/javascript" src="<?=PartuzaConfig::get('gadget_server')?>/gadgets/js/rpc.js?c=1"></script>
<script type="text/javascript" src="<?=PartuzaConfig::get('web_prefix')?>/js/jquery.all.js"></script>
<script type="text/javascript" src="<?=PartuzaConfig::get('web_prefix')?>/js/container.js"></script>
<link rel="openid2.provider openid.server" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/openid/auth">
<?php if($this instanceof profileController) { ?>
<meta http-equiv="X-XRDS-Location" content="http://<?php echo $_SERVER['HTTP_HOST'];?>/openidxrds" />
<?php } else { ?>
<meta http-equiv="X-XRDS-Location" content="http://<?php echo $_SERVER['HTTP_HOST'];?>/xrds" />
<?php } ?>
</head>
<body>

<!-- 
	<? $this->template('/common/headera.php'); ?> 
-->

<div id="profileContentWide" style="width: 'auto'; padding-left: 0px;">
<?
$gadget = $vars['application'];
$width = 320;
$view = 'canvas';
$this->template('/gadget/gadget.php', array('width' => $width, 'gadget' => $gadget, 'person' => $vars['person'], 
    'view' => $view));
?>
</div>

<div style="clear: both"></div>

<!-- 
	<? $this->template('/common/footer.php'); ?> 
-->

</body>
</html>
