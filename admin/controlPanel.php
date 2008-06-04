<?php 
class ControlPanel {
	var $default_settings = Array(
		'categories_is_link' => 1,
		'tags_is_link' => 1,
		'pages_is_link' => 1,
		'archives_is_link' => 1,
		'owner_id' => 0
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
								<input id="owner_id" name="owner_id" value="<?php echo $this->options["owner_id"]; ?>" size="40" class="code" /><br />
								Your user id is: <?php global $userdata; get_currentuserinfo(); echo $userdata->ID; ?>
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