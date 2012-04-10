<?php
$this->template('/common/header_iphone.php');
?>

<div style="padding: 10px">
<?php
if (! empty($vars['error'])) {
?>
      <div style="color: red"><b>Error : <?=$vars['error']?></b><br />
      </div>
<?php
}
?>    
<form action="<?=PartuzaConfig::get('web_prefix');?>/login<?php if (isset($_GET['redirect'])) { echo "?redirect=".urlencode($_GET['redirect']); }?>" method="post" id="register">

	<div class="form_entry">
	<input type="text" name="login_email" id="login_email"
	  value="<?=isset($_POST['login_email']) ? $_POST['login_email'] : ''?>" />
	</div>

	<div class="form_entry">
	<input type="password" name="login_password" id="login_password"
	  value="<?=isset($_POST['login_password']) ? $_POST['login_password'] : ''?>" />
	</div>

	<div class="form_entry">
	<input class="submit" type="submit" value="Login" /></div>
	</div>

</form>
</div>

<?php
$this->template('/common/footer_iphone.php');
?>
