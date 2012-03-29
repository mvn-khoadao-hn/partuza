<form method="post" enctype="multipart/form-data" action="<?=$vars['url']?>">
    <input type="hidden" name="platform_user_id" id="platform_user_id" value="<?=$vars['user_id']?>" />
    <input type="hidden" name="payment_id" id="payment_id" value="<?=$vars['payment_id']?>" />
    <input type="hidden" name="oauth_consumer_key" id="oauth_consumer_key" value="consumer_key" />
    <input type="submit" class="submit" value="Payment" /></div>
</form>

