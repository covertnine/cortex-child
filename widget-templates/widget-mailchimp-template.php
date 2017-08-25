<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="text-wrapper">
				<span class="first-word">Subscribe</span><br><span class="second-word"> to our newsletter</span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="<?php echo $this->id_base . '_form-' . $this->number; ?>" method="post">
			<?php echo $this->subscribe_errors;?>
			<?php
			    if ($instance['collect_first']) {
			        ?>
				<p class="input input--cortex first-name"><input placeholder=<?php echo __('First', 'mailchimp-widget'); ?> type="text" required name="<?php echo $this->id_base . '_first_name'; ?>" class="input__field input__field--cortex" /><label class="input__label input__label--cortex input__label--cortex-color-1"><span class="input__label-content--cortex"><?php echo __('First', 'mailchimp-widget'); ?></span></label></p>
			<?php
			    }
			    if ($instance['collect_last']) {
			        ?>
				<p class="input input--cortex last-name"><input placeholder=<?php echo __('Last', 'mailchimp-widget'); ?> type="text" required name="<?php echo $this->id_base . '_last_name'; ?>" class="input__field input__field--cortex" /><label class="input__label input__label--cortex input__label--cortex-color-1"><span class="input__label-content--cortex"><?php echo __('Last', 'mailchimp-widget'); ?></span></label></p>
			<?php
			    }
			?>
				<br class="display-on-large">
				<input type="hidden" name="ns_mc_number" value="<?php echo $this->number; ?>" />
				<p class="input input--cortex"><input id="<?php echo $this->id_base; ?>-email-<?php echo $this->number; ?>" placeholder=<?php echo __('Email Address', 'mailchimp-widget'); ?> type="email" required name="<?php echo $this->id_base; ?>_email" class="input__field input__field--cortex" />
					<label for="<?php echo $this->id_base; ?>-email-<?php echo $this->number; ?>" class="input__label input__label--cortex input__label--cortex-color-1"><span class="input__label-content--cortex"><?php echo __('Email Address', 'mailchimp-widget'); ?></span></label></p>
				<input class="button" type="submit" name="<?php echo __($instance['signup_text'], 'mailchimp-widget'); ?>" value="<?php echo __($instance['signup_text'], 'mailchimp-widget'); ?>" />
			</form>
			<?php //End Column ?>
		</div>
		<?php //End Row ?>
	</div>
	<?php //End Container ?>
</div>
	<script>jQuery('#<?php echo $this->id_base; ?>_form-<?php echo $this->number; ?>').ns_mc_widget({"url" : "<?php echo $_SERVER['PHP_SELF']; ?>", "cookie_id" : "<?php echo $this->id_base; ?>-<?php echo $this->number; ?>", "cookie_value" : "<?php echo $this->hash_mailing_list_id(); ?>", "loader_graphic" : "<?php echo $this->default_loader_graphic; ?>"}); </script>
