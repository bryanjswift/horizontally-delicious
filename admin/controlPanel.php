<?php 
class ControlPanel {
	var $default_settings = Array(
		'categories_is_link' => 0,
		'tags_is_link' => 0,
		'pages_is_link' => 0,
		'archives_is_link' => 0,
		'owner_id' => 0,
		'include_sifr' => 0,
		'sifr_alternate_path' => '',
		'hdjs_laternate_path' => '',
		'additional_head' => ''
	);

	function ControlPanel() {
		add_action('admin_menu', array(&$this, 'adminMenu'));
		add_action('admin_head', array(&$this, 'adminHead'));
		if (!is_array(get_option('Horizontally Delicious'))) {
			add_option('Horizontally Delicious', $this->default_settings);
		}
		$this->options = get_option('Horizontally Delicious');
	}
	
	function adminMenu() {
		add_theme_page('Theme Settings', 'HD Settings', 'edit_themes', 'Horizontally Delicious', array(&$this, 'optionsMenu'));
	}
	
	function adminHead() {
	}
	
	function optionsMenu() {
  	if ($_POST['ss_action'] == 'save') {
			$this->options["categories_is_link"] = isset($_POST['categories_is_link']) ? 1 : 0;
			$this->options["tags_is_link"] = isset($_POST['tags_is_link']) ? 1 : 0;
			$this->options["pages_is_link"] = isset($_POST['pages_is_link']) ? 1 : 0;
			$this->options["archives_is_link"] = isset($_POST['archives_is_link']) ? 1 : 0;
			$this->options["owner_id"] = $_POST['owner_id'];
			$this->options["include_sifr"] = isset($_POST['include_sifr']) ? 1 : 0;
			$this->options["sifr_alternate_path"] = $_POST['sifr_alternate_path'];
			$this->options["hdjs_alternate_path"] = $_POST['hdjs_alternate_path'];
			$this->options["additional_head"] = $_POST['additional_head'];
			update_option('Horizontally Delicious', $this->options);
			echo '<div class="updated fade" id="message"><p><strong>Settings saved</strong>.</p></div>';
		}
		?>
		<div class="wrap">
			<h2><?php _e('Horizontally Delicious Settings'); ?></h2>
			<form action="" method="post" class="themeform">
				<input type="hidden" id="ss_section" name="ss_action" value="save" />
				<table class="form-table">
					<tr valign="top">
						<th scope="row">Header Links</th>
						<td>
							<label for="categories_is_link"><input type="checkbox" name="categories_is_link" id="categories_is_link" <?php if ($this->options["categories_is_link"] == 1) echo ' checked="checked"'; ?> /> Categories is a link?</label><br />
							<label for="tags_is_link"><input type="checkbox" name="tags_is_link" id="tags_is_link" <?php if ($this->options["tags_is_link"] == 1) echo ' checked="checked"'; ?> /> Tags is a link?</label><br />
							<label for="pages_is_link"><input type="checkbox" name="pages_is_link" id="pages_is_link" <?php if ($this->options["pages_is_link"] == 1) echo ' checked="checked"'; ?> /> Pages is a link?</label><br />
							<label for="archives_is_link"><input type="checkbox" name="archives_is_link" id="archives_is_link" <?php if ($this->options["archives_is_link"] == 1) echo ' checked="checked"'; ?> /> Archives is a link?</label><br />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Comment Highlighting</th>
						<td>
							<label for="owner_id">User id of comments to highlight as the author's:</label>
							<input id="owner_id" name="owner_id" value="<?php echo $this->options["owner_id"]; ?>" size="40" class="code" /><br />
							Your user id is: <?php global $userdata; get_currentuserinfo(); echo $userdata->ID; ?>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Theme Resources</th>
						<td>
							<label for="include_sifr"><input type="checkbox" name="include_sifr" id="include_sifr" <?php if ($this->options["include_sifr"] == 1 || !isset($this->options["include_sifr"])) echo ' checked="checked"'; ?> /> Include sIFR javascript from theme?</label><br />
							<label for="sifr_alternate_path">Alternate sIFR path: </label>
							<input type="text" name="sifr_alternate_path" id="sifr_alternate_path" value="<?php echo $this->options["sifr_alternate_path"]; ?>" size="65" class="code" /><br />
							<label for="hdjs_alternate_path">Alternate path for theme javascript: </label>
							<input type="text" name="hdjs_alternate_path" id="hdjs_alternate_path" value="<?php echo $this->options["hdjs_alternate_path"]; ?>" size="65" class="code" /><br />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Additional Information</th>
						<td>
							<label for="additional_head">Additional markup to include in the &gt;head&lt; element</label><br />
							<textarea id="additional_head" name="additional_head" cols="65" rows="10"><?php echo stripslashes($this->options["additional_head"]); ?></textarea>
						</td>
					</tr>
				</table>
				<p class="submit"><input type="submit" value="Save Changes" name="cp_save"/></p>
			</form>
		</div>
		<?php
	}
}
?>
