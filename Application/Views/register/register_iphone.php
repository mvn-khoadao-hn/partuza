<?
$this->template('/common/header_iphone.php');
?>

<div style="padding: 10px">
  <?
  if (! empty($vars['error'])) {
  ?>
	<div style="color: red"><b>Error : <?=$vars['error']?></b><br />
	</div>
  <?
  }
  ?>
		
<form action="<?=PartuzaConfig::get('web_prefix');?>/register"	method="post" id="register">

<div class="form_header">Account information</div>

<div class="form_entry">
	<div class="form_label">
		<label for="register_email">email</label>	
	</div>
	<input type="text" name="register_email" id="register_email"
		value="<?=isset($_POST['register_email']) ? $_POST['register_email'] : ''?>" />
</div>

<div class="form_entry">
	<div class="form_label">
		<label for="register_password">password</label>
	</div>
	<input type="password" name="register_password" id="register_password"
		value="<?=isset($_POST['register_password']) ? $_POST['register_password'] : ''?>" />
</div>

<div class="form_header">Your information</div>

<div class="form_entry">
	<div class="form_label">
		<label for="register_first_name">first name</label>
	</div>
	<input type="text" name="register_first_name" id="register_first_name"
		value="<?=isset($_POST['register_first_name']) ? $_POST['register_first_name'] : ''?>" />
</div>

<div class="form_entry">
	<div class="form_label">
		<label for="register_last_name">last name </label>
	</div>
	<input type="text" name="register_last_name" id="register_last_name"
		value="<?=isset($_POST['register_last_name']) ? $_POST['register_last_name'] : ''?>" />
</div>

<div class="form_entry">
	<div class="form_label">
		<label for="date_of_birth_month">birthday</label>
	</div>
	<select name="date_of_birth_month" id="date_of_birth_month" style="width: auto">
	<option value="-">-</option>
	<?
	  for ($month = 1; $month <= 12; $month ++) {
	    $sel = isset($_POST['date_of_birth_month']) && $_POST['date_of_birth_month'] == $month ? ' SELECTED' : '';
	    echo "<option value=\"$month\"$sel>$month</option>\n";
	  }
	  ?>
				</select> <select name="date_of_birth_day" id="date_of_birth_day"
		style="width: auto">
		<option value="-">-</option>
				<?
	  for ($day = 1; $day <= 31; $day ++) {
	    $sel = isset($_POST['date_of_birth_day']) && $_POST['date_of_birth_day'] == $day ? ' SELECTED' : '';
	    echo "<option value=\"$day\"$sel>$day</option>\n";
	  }
	  ?>
				</select> <select name="date_of_birth_year" id="date_of_birth_year"
		style="width: auto">
		<option value="-">-</option>
				<?
	  for ($year = 1940; $year <= 2008; $year ++) {
	    $sel = isset($_POST['date_of_birth_year']) && $_POST['date_of_birth_year'] == $year ? ' SELECTED' : '';
	    echo "<option value=\"$year\"$sel>$year</option>\n";
	  }
	?>
	</select>
</div>

<div class="form_entry">
	<div class="form_label">
		<label for="gender">gender</label>
	</div>
	<select name="gender" id="gender" style="width: auto">
		<option value="-">-</option>
		<option value="FEMALE">Female</option>
		<option value="Male">Male</option>
	</select>
</div>

<div class="form_entry">
	<input class="submit" type="submit" value="Register" /></div>
</div>

</form>
</div>
<?
$this->template('/common/footer_iphone.php');
?>
