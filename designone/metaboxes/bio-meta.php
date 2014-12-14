<div class="my_meta_control">

	<label>Contact Number</label>

	<p>
		<?php $mb->the_field('_number'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>

	<label>E-Mail Address</label>

	<p>
		<?php $mb->the_field('_email'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	</p>
</div>
