<?php
function e($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
}
?>
<form class="contact-form" action="contact_form/scripts/mailer.php" method="post">
    <div id="form-messages" class="alert"></div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control form-control-success form-control-danger" name="name" id="name" placeholder="What's your name?" autocomplete="off" value="<?= ($_POST && !empty($_POST['name'])) ? e($_POST['name']) : '' ; ?>">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control form-control-success form-control-danger" name="email" id="email" placeholder="What's your email?" autocomplete="off" value="<?= ($_POST && !empty($_POST['email'])) ? e($_POST['email']) : '' ; ?>">
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control form-control-success form-control-danger" name="message" id="message" placeholder="Leave your message here"><?= ($_POST && !empty($_POST['message'])) ? e($_POST['message']) : '' ; ?></textarea>
    </div>

	<div class="form-group">
		<!-- TODO: put <script src='https://www.google.com/recaptcha/api.js'></script> before closing head tag -->
	    <!-- <div class="g-recaptcha" data-sitekey="SITE-KEY-HERE"></div> -->
		<style media="screen">
			.g-recaptcha.form-control {
				border-color: transparent;
			}
		</style>
	    <div class="g-recaptcha form-control form-control-success form-control-danger" data-sitekey="6LeMQhgTAAAAAG1Dl2Is8XzbMjIkMv3SETGfPqRw"></div>
	</div>

    <input type="submit" class="btn btn-success" value="Send message">

</form>
<script src="contact_form/scripts/process.js" charset="utf-8"></script>
