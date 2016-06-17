<?php 

defined("ABSPATH") or exit;

?>
<div style="height:80vh;">
	<h1 style="padding: 50px;"><?php echo get_localeStr('Core Bot Settings'); ?></h1>
	<form method="post" action="options.php" style="padding: 0 50px 50px 50px;">
		<?php settings_fields( 'bot_settings_group' ); ?>
		<table>
				<tr valign="top">
					<th scope="row">
						<label><?php echo get_localeStr('Schedule'); ?></label>
					</th>
					<td>
						<select style="width: 200px; margin-bottom: 20px;" name="bot_settings[schedule]">
							<option value="10" <?php if (esc_attr( $opts['schedule'] ) == "10" || (!bot_valid_config())) echo "selected";?>>10 <?php echo get_localeStr('hours'); ?></option>
							<option value="20" <?php if (esc_attr( $opts['schedule'] ) == "20") echo "selected";?>>20 <?php echo get_localeStr('hours'); ?></option>
							<option value="30" <?php if (esc_attr( $opts['schedule'] ) == "30") echo "selected";?>>30 <?php echo get_localeStr('hours'); ?></option>
							<option value="40" <?php if (esc_attr( $opts['schedule'] ) == "40") echo "selected";?>>40 <?php echo get_localeStr('hours'); ?></option>
							<option value="50" <?php if (esc_attr( $opts['schedule'] ) == "50") echo "selected";?>>50 <?php echo get_localeStr('hours'); ?></option>
						</select>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<label><?php echo get_localeStr('Language'); ?></label>
					</th>
					<td>
						<select style="width: 200px; margin-bottom: 50px;" name="bot_settings[language]">
							<option value="en" <?php if (esc_attr( $opts['language'] ) == "en" || (!bot_valid_config())) echo "selected";?>><?php echo get_localeStr('English'); ?></option>
							<option value="de" <?php if (esc_attr( $opts['language'] ) == "de") echo "selected";?>><?php echo get_localeStr('German'); ?></option>
						</select>
					</td>
				</tr>
		</table>

		<input type="submit" value="<?php echo get_localeStr('Save Changes'); ?>" class="button button-primary">
	</form>
<div>

<?php ?>