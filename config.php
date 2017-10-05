<?php
/**
 * This is the extra settings for this field type
 */
?>
<div class="caldera-config-group">
	<label for="{{_id}}_default">
		<?php esc_html_e( 'Default', 'cf-total-field' ); ?>
	</label>
	<div class="caldera-config-field">
		<input type="text" id="{{_id}}_default" class="block-input field-config magic-tag-enabled"
		       name="{{_name}}[default]" value="{{default}}">
	</div>
</div>

<div class="caldera-config-group">
	<label for="{{_id}}_total">
		<?php esc_html_e( 'Field', 'cf-total-field' ); ?></label>
	<div class="caldera-config-field">
		<input type="text" id="{{_id}}_total" class="block-input field-config" name="{{_name}}[total]"
		       value="{{total}}">
	</div>
</div>

<div class="caldera-config-group">
	<label for="{{_id}}_before">
		<?php esc_html_e( 'Before Text', 'cf-total-field' ); ?></label>
	<div class="caldera-config-field">
		<input type="text" id="{{_id}}_before" class="block-input field-config" name="{{_name}}[before]"
		       value="{{before}}">
	</div>
</div>


<div class="caldera-config-group">
	<label for="{{_id}}_after">
		<?php esc_html_e( 'After Text', 'cf-total-field' ); ?></label>
	<div class="caldera-config-field">
		<input type="text" id="{{_id}}_after" class="block-input field-config" name="{{_name}}[after]"
		       value="{{after}}">
	</div>
</div>