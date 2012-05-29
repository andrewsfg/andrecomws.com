<?php
/**
 * Plugin Name: WP-Twitter Retweet Button
 * Plugin URI: http://blog.ppfeufer.de/wordpress-plugin-wp-twitter-button/
 * Description: This plugin will install the official Twitter Button provided by Twitter to your Wordpress-Blog.
 * Version: 1.8.2
 * Author: H.-Peter Pfeufer
 * Author URI: http://ppfeufer.de
 */

/**
 * Changelog:
 * = 1.8.2 (18. 04. 2011) =
 * Fix: typo in arraykeys
 *
 * = 1.8.1 (21. 03. 2011) =
 * New: added dutch translation (thanks to <a href="http://wpwebshop.com/">Rene</a>)
 *
 * = 1.8.0 (04. 03. 2011) =
 * Change: Moved link to settings page to settings menu.
 * Change: optimized code, removed unused functions.
 * Update: German translation file.
 * New: sanitizing twitternames.
 * New: added a little twitter-icon to settings link.
 *
 * = 1.7.5 (26.01.2011) =
 * Change: moved external JavaScript to the footer to improve performance.
 *
 * = 1.7.4 (09.01.2011) =
 * Fix: corrected loading of JavaScript after saving action.
 *
 * = 1.7.3 (08.01.2011) =
 * Update: german translation
 * Update: JavaScript
 * Test: ready for WordPress 3.1 (testet on WordPress 3.1-RC2)
 *
 * = 1.7.2 =
 * Optimized loading of javascript in backend. Load only when needed.
 * Updated function for tweettext shorting. Now only fired if needed.
 * Added Options for default tweettext ("Posttitle » Blogtitle" or "Posttitle")
 * Fixed a bug with custom tweettext, which was not shown in backend.
 * Added warning if custom tweettext is selected and tweettext is missing.
 * Added fallback to default settings for tweetext as "Posttitle » Blogtitle" if custom tweettext is selected and tweettext is missing.
 *
 *
 * = 1.7.1 =
 * JavaScript for Flattr-Button now added, I forgot it in last version :-(
 *
 * = 1.7.0 =
 * Shorten tweettext to fit in 140 characters (requested by <a href="http://kkoepke.de">Kai Köpke</a>)
 * Added Flattr-Button in backend
 *
 * = 1.6.3 =
 * Fixed #hashtag-handling in single-posts.
 *
 * = 1.6.2 =
 * Fixed a little trouble I ran into with some themes.
 *
 * = 1.6.1 =
 * Added maintenanceoptions.
 *
 * = 1.6.0 =
 * Reduced the database load.
 * Cleaned up old options and removed from database.
 *
 * = 1.5.2 =
 * Replaced deprecated function for language support with new one
 *
 * = 1.5.1 =
 * Updated french trabslation (by <a href="http://www.frankoli.de/blog/">Frank</a>)
 *
 * = 1.5.0 =
 * Added Support for #Hashtags
 *
 * = 1.4.0 =
 * Option to display in archive-view added (Note: not all themes support this option)
 * Option to display in category-view added (Note: not all themes support this option)
 * Fixed the code for displaying in RSS
 * Modified german translation
 * Updated screenshot :-)
 *
 * = 1.3.1 =
 * Renamed menu WP-Twitter to Twitterbutton to avoid any confusion with the WP to Twitter Plugin
 * Added translation in dashboardmenu (Twitterbutton -> Settings)
 *
 * = 1.3.0 =
 * Added german translation
 * Added french translation (by <a href="http://www.frankoli.de/blog/">Frank</a>)
 *
 * = 1.2.1 =
 * Fixed a little typo in the rss-settings
 * Added options for position in rss
 *
 * = 1.2.0 =
 * Buttonlanguage added
 * Option to display button on frontpage added
 * Option to display button on rss-feed added
 * Option for own tweetext added
 *
 * = 1.1.1 =
 * Codecorrection
 *
 * = 1.1.0 =
 * Added Support for all the three buttons provided by Twitter. Selectable in Settings.
 *
 * = 1.0.0 =
 * Initial Release
 */

define('WP_TWITTER_RETWEET_BUTTON_VERSION', '1.8.0');
if(!defined('PPFEUFER_FLATTRSCRIPT')) {
	define('PPFEUFER_FLATTRSCRIPT', 'http://cdn.ppfeufer.de/js/flattr/flattr.js');
}

/**
 * Button Menü zum Dashboard hinzufügen
 * @since 1.0.0
 */
function wp_twitter_options() {
	add_options_page('Twitterbutton', '<img src="' . plugins_url('wp-twitter-retweet-button/img/twitter-icon.png') . '" id="twitter-icon" alt="Twitter Icon" /> Twitterbutton', 'manage_options', 'wp-twitter-retweet-button-options', 'wp_twitter_options_page');
}

/**
 * Reset und Delete abfangen.
 * @since 1.6.1
 */
function wp_twitter_reset_options() {
	wp_twitter_delete_options();
	add_option('wp_twitter_settings', wp_twitter_get_default_options());

	return;
}

function wp_twitter_delete_options() {
	delete_option('wp_twitter_settings');

	return;
}

/**
 * Optionen auslesen.
 * @param string $parameter
 * @since 1.6.0
 */
function wp_twitter_get_option ($parameter = '') {
	/**
	 * Prüfen ob das Formular abgesendet wurde.
	 * Wenn nicht, importiere $wp_twitter_options,
	 * ansonsten lade sie neu.
	 * @since 1.8.0
	 */
	if(!isset($_POST)) {
		global $wp_twitter_options;
	} else {
		$wp_twitter_options = get_option('wp_twitter_settings');
	}

	if ($parameter == '') {
		return $wp_twitter_options;
	} else {
		return $wp_twitter_options[$parameter];
	}
}

/**
 * Buttons generieren.
 * @since 1.0.0
 */
function wp_twitter_generate_button() {
	$url = get_permalink();
	$tweettext = wp_twitter_get_tweettext();

	return '<div class="wp_twitter_button" style="' . wp_twitter_get_option('wp_twitter_style') . '">
				<a href="http://twitter.com/share?counturl=' . urlencode($url) . '" class="twitter-share-button" data-url="' . $url . '" data-count="' . wp_twitter_get_option('wp_twitter_version') . '" data-via="' . wp_twitter_get_option('wp_twitter_source') . '" data-lang="' . wp_twitter_get_option('wp_twitter_language') . '" ' . $tweettext . '>Tweet</a>
			</div>';
}

function wp_twitter_generate_static_button() {
	if(get_post_status($post->ID) == 'publish') {
		$url = get_permalink();
		$tweettext = wp_twitter_get_tweettext();

		return '<div class="wp_twitter_button" style="' . wp_twitter_get_option('wp_twitter_style') . '">
					<a href="http://twitter.com/share?counturl=' . urlencode($url) . '" class="twitter-share-button" data-url="' . $url . '" data-count="' . wp_twitter_get_option('wp_twitter_version') . '" data-via="' . wp_twitter_get_option('wp_twitter_source') . '" data-lang="' . wp_twitter_get_option('wp_twitter_language') . '" ' . $tweettext . '>Tweet</a>
					<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				</div>';
	} else {
		return;
	}
}

/**
 * Tweettext einbinden
 * @since 1.0.0
 */
function wp_twitter_get_tweettext() {
	$twitter_hashtags = wp_twitter_get_hashtags();
	$tweettext = '';

	if (wp_twitter_get_option('wp_twitter_tweettext') == 'own') {
		if(wp_twitter_get_option('wp_twitter_tweettext') == 'own' && strlen(wp_twitter_get_option('wp_twitter_tweettext_owntext')) == 0) {
			$tweettext = the_title('', '', false) . ' &raquo; ' . get_bloginfo('name') . $twitter_hashtags;
		} else {
			$tweettext = wp_twitter_get_option('wp_twitter_tweettext_owntext') . $twitter_hashtags;
		}
	} else {
		if(wp_twitter_get_option('wp_twitter_tweettext_default_as') == 'posttitle-blogtitle') {
			$tweettext = the_title('', '', false) . ' &raquo; ' . get_bloginfo('name') . $twitter_hashtags;
		} elseif(wp_twitter_get_option('wp_twitter_tweettext_default_as') == 'posttitle') {
			$tweettext = the_title('', '', false) . $twitter_hashtags;
		}
	}

	return 'data-text="' . wp_twitter_shorten_tweettext($tweettext) . '"';
}

/**
 * Tweettext kürzen
 * @since 1.7.0
 */
function wp_twitter_shorten_tweettext($tweettext) {
	$array_tweettextData = array(
		'length_tweettext_maximal' => 140,
		'length_tweettext' => strlen($tweettext),
		'length_twitter_name' => strlen(' via @' . wp_twitter_get_option('wp_twitter_source')),
		'length_tweetlink' => 20,
		'length_more' => strlen(' [...]')
	);

	$length_new_tweettext = $array_tweettextData['length_tweettext_maximal'] - $array_tweettextData['length_twitter_name'] - $array_tweettextData['length_tweetlink'] - $array_tweettextData['length_more'];

	if($array_tweettextData['length_tweettext'] > $length_new_tweettext) {
		$tweettext = substr($tweettext, 0, $length_new_tweettext) . ' [...]';
	}

	return $tweettext;
}

/**
 * Tags des Artikels in #Hashtags umwandeln
 * @since 1.5.0
 */
function wp_twitter_get_hashtags() {
	/**
	 * Sollen #Hashtags angezeigt werden?
	 */
	if (wp_twitter_get_option('wp_twitter_hashtags') == '1') {
		$hashtags = strip_tags(get_the_tag_list(' #', ' #', ''));
	} else {
		$hashtags = '';
	}

	return $hashtags;
}

/**
 * The Loop.
 * @since 1.0.0
 */
function wp_twitter_update($content) {
	global $post;

	/**
	 * Manual Option
	 */
	if(wp_twitter_get_option('wp_twitter_where') == 'manual') {
		return $content;
	}

	/**
	 * Sind wir auf einer CMS-Seite?
	 */
	if(wp_twitter_get_option('wp_twitter_display_page') == null && is_page()) {
		return $content;
	}

	/**
	 * Sind wir auf der Startseite?
	 */
	if(wp_twitter_get_option('wp_twitter_display_front') == null && is_home()) {
		return $content;
	}

	/**
	 * Sind wir in der Achiveanzeige?
	 * @since 1.4.0
	 */
	if(wp_twitter_get_option('wp_twitter_display_archive') == null && is_archive()) {
		return $content;
	}

	/**
	 * Sind wir in der Kategorieanzeige?
	 * @since 1.4.0
	 */
	if(wp_twitter_get_option('wp_twitter_display_category') == null && is_category()) {
		return $content;
	}

	/**
	 * Ist es ein Feed
	 */
	if (is_feed()) {
		$button = wp_twitter_generate_static_button();
		$where = 'wp_twitter_rss_where';
	} else {
		$button = wp_twitter_generate_button();
		$where = 'wp_twitter_where';
	}

	/**
	 * Soll der Button im Feed ausgeblendet werden?
	 */
	if (is_feed() && wp_twitter_get_option('wp_twitter_display_feed') == null) {
		return $content;
	}

	/**
	 * Wurde der Shortcode genutzt
	 */
	if(wp_twitter_get_option($where) == 'shortcode') {
		return str_replace('[wp_twitter]', $button, $content);
	} else {
		/**
		 * Wenn wir den Button abgeschalten haben
		 */
		if(get_post_meta($post->ID, 'wp_twitter') == null) {
			if(wp_twitter_get_option($where) == 'beforeandafter') {
				/**
				 * Vor und nach dem Beitrag einfügen
				 */
				return $button . $content . $button;
			} else if(wp_twitter_get_option($where) == 'before') {
				/**
				 * Vor dem Beitrag einfügen
				 */
				return $button . $content;
			} else {
				/**
				 * Nach dem Beitrag einfügen
				 */
				return $content . $button;
			}
		} else {
			/**
			 * Keinen Button einfügen
			 */
			return $content;
		}
	}
}

/**
 * Manuelle Ausgabe.
 * @since 1.0.0
 */
function wp_twitterbutton() {
	if(wp_twitter_get_option('wp_twitter_where') == 'manual') {
		return wp_twitter_generate_button();
	} else {
		return false;
	}
}

/**
 * Filter durch Vorschau entfernen.
 * @param string $content
 * @since 1.0.0
 */
function wp_twitter_remove_filter($content) {
	if(!is_feed()) {
		remove_action('the_content', 'wp_twitter_update');
	}

	return $content;
}

/**
 * Meta-Tag 'wp_twitter-title' setzen.
 * @since 1.0.0
 */
function wp_twitter_head() {
	/**
	 * Sind wir in einem Artikel?
	 */
	if(is_single()) {
		global $post;
		$title = get_the_title($post->ID);
		echo '<!-- WP-Twitter Retweet Button by H.-Peter Pfeufer -->' . "\n" . '<meta name="wp_twitter-title" content="' . strip_tags($title) . '" />' . "\n";
	}
}

/**
 * JavaScript von twitter in den Footer auslagern.
 * @since 1.7.5
 */
function wp_twitter_footer() {
	if(wp_twitter_get_option('wp_twitter_display_front') == null && is_home()) {
		echo '';
	} else {
		echo '<!-- WP-Twitter Retweet Button by H.-Peter Pfeufer -->' . "\n" . '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
	}
}

/**
 * Optionsseite generieren
 * @since 1.0.0
 */
function wp_twitter_options_page() {
	/**
	 * JavaScript für Flattr einfügen
	 * @since 1.7.0
	 */
	if(!defined('PPFEUFER_FLATTRSCRIPT_IS_LOADED')) {
		echo '<script type="text/javascript" src="' . PPFEUFER_FLATTRSCRIPT . '"></script>';
		define('PPFEUFER_FLATTRSCRIPT_IS_LOADED', true);
	}

	/**
	 * Status von $_POST abfangen.
	 * @since 1.8.0
	 */
	if(!empty($_POST)) {
		/**
		 * Validate the nonce
		 * @since 1.8.0
		 */
		check_admin_referer('wp-twitter-retweet-button-options');

		if($_POST['wp_twitter_settings']['wp_twitter_maintenance_reset']) {
			/**
			 * Resetting options to defaults.
			 */
			wp_twitter_reset_options();

			echo '<div id="message" class="updated fade">';
			echo '<p><strong>';
			_e('Settings resetted.', 'wp-twitter-button');
			echo '</strong></p>';
			echo '</div>';
		} elseif($_POST['wp_twitter_settings']['wp_twitter_maintenance_clear']) {
			/**
			 * Deleting all options from database.
			 */
			wp_twitter_delete_options();

			echo '<div id="message" class="updated fade">';
			echo '<p><strong>';
			_e('Settings deleted.', 'wp-twitter-button');
			echo '</strong></p>';
			echo '</div>';
		} else {
			/**
			 * Writing new options to database.
			 * @var array
			 */
			$array_Options = array(
				'wp_twitter_plugin_version' => (string) WP_TWITTER_RETWEET_BUTTON_VERSION,
				'wp_twitter_where' => (string) (@$_POST['wp_twitter_settings']['wp_twitter_where']),
				'wp_twitter_rss_where' => (string) (@$_POST['wp_twitter_settings']['wp_twitter_rss_where']),
				'wp_twitter_language' => (string) (@$_POST['wp_twitter_settings']['wp_twitter_language']),
				'wp_twitter_source' => wp_twitter_sanitize_username((string) (@$_POST['wp_twitter_settings']['wp_twitter_source'])),
				'wp_twitter_style' => (string) (@$_POST['wp_twitter_settings']['wp_twitter_style']),
				'wp_twitter_display_page' => (int) (!empty($_POST['wp_twitter_settings']['wp_twitter_display_page'])),
				'wp_twitter_display_front' => (int) (!empty($_POST['wp_twitter_settings']['wp_twitter_display_front'])),
				'wp_twitter_display_archive' => (int) (!empty($_POST['wp_twitter_settings']['wp_twitter_display_archive'])),
				'wp_twitter_display_category' => (int) (!empty($_POST['wp_twitter_settings']['wp_twitter_display_category'])),
				'wp_twitter_display_feed' => (int) (!empty($_POST['wp_twitter_settings']['wp_twitter_display_feed'])),
				'wp_twitter_version' => (string) (@$_POST['wp_twitter_settings']['wp_twitter_version']),
				'wp_twitter_tweettext' => (string) (@$_POST['wp_twitter_settings']['wp_twitter_tweettext']),
				'wp_twitter_tweettext_owntext' => (string) (@$_POST['wp_twitter_settings']['wp_twitter_tweettext_owntext']),
				'wp_twitter_hashtags' => (int) (!empty($_POST['wp_twitter_settings']['wp_twitter_hashtags'])),
				'wp_twitter_tweettext_default_as' => (string) (@$_POST['wp_twitter_settings']['wp_twitter_tweettext_default_as'])
			);

			wp_twitter_update_options($array_Options);

			echo '<div id="message" class="updated fade">';
			echo '<p><strong>';
			_e('Settings saved.', 'wp-twitter-button');
			echo '</strong></p>';
			echo '</div>';
		}
	}
	?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br /></div>
		<h2><?php _e('Settings for WP Twitter Button', 'wp-twitter-button'); ?></h2>
		<p><?php _e('This plugin will install the WP Twitter Button widget for each of your blog posts.', 'wp-twitter-button'); ?></p>
		<form method="post" action="" id="wp-twitter-options">
			<?php wp_nonce_field('wp-twitter-retweet-button-options'); ?>
			<table class="form-table">
				<tr>
					<th scope="row" valign="top"><?php _e('Display', 'wp-twitter-button'); ?></th>
					<td>
						<div style="float:right; text-align:center; width:120px;">
							<?php _e('Support me if you like the Plugin', 'wp-twitter-button'); ?><br />
							<a class="FlattrButton" style="display:none;" href="http://blog.ppfeufer.de/wordpress-plugin-wp-twitter-button/"></a>
						</div>
						<div>
							<input type="checkbox" value="1" <?php if(wp_twitter_get_option('wp_twitter_display_page') == '1') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_display_page]" id="wp_twitter_settings[wp_twitter_display_page]" group="wp_twitter_display" />
							<label for="wp_twitter_settings[wp_twitter_display_page]"><?php _e('Display the button on pages', 'wp-twitter-button'); ?></label>
						</div>
						<div>
							<input type="checkbox" value="1" <?php if(wp_twitter_get_option('wp_twitter_display_front') == '1') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_display_front]" id="wp_twitter_settings[wp_twitter_display_front]" group="wp_twitter_display" />
							<label for="wp_twitter_settings[wp_twitter_display_front]"><?php _e('Display the button on front page (home)', 'wp-twitter-button'); ?></label>
						</div>
						<div>
							<input type="checkbox" value="1" <?php if(wp_twitter_get_option('wp_twitter_display_archive') == '1') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_display_archive]" id="wp_twitter_settings[wp_twitter_display_archive]" group="wp_twitter_display" />
							<label for="wp_twitter_settings[wp_twitter_display_archive]"><?php _e('Display the button on archive-view <em>(<strong>Note</strong>: not all themes support this option)</em>', 'wp-twitter-button'); ?></label>
						</div>
						<div>
							<input type="checkbox" value="1" <?php if(wp_twitter_get_option('wp_twitter_display_category') == '1') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_display_category]" id="wp_twitter_settings[wp_twitter_display_category]" group="wp_twitter_display" />
							<label for="wp_twitter_settings[wp_twitter_display_category]"><?php _e('Display the button on category-view <em>(<strong>Note</strong>: not all themes support this option)</em>', 'wp-twitter-button'); ?></label>
						</div>
						<div>
							<input type="checkbox" value="1" <?php if(wp_twitter_get_option('wp_twitter_display_feed') == '1') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_display_feed]" id="wp_twitter_settings[wp_twitter_display_feed]" group="wp_twitter_display" />
							<label for="wp_twitter_settings[wp_twitter_display_feed]"><?php _e('Display the button on rss-feed', 'wp-twitter-button'); ?></label>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row" valign="top"><?php _e('Position', 'wp-twitter-button'); ?></th>
					<td>
						<select name="wp_twitter_settings[wp_twitter_where]">
							<option <?php if(wp_twitter_get_option('wp_twitter_where') == 'before') echo 'selected="selected"'; ?> value="before"><?php _e('Before', 'wp-twitter-button'); ?></option>
							<option <?php if(wp_twitter_get_option('wp_twitter_where') == 'after') echo 'selected="selected"'; ?> value="after"><?php _e('After', 'wp-twitter-button'); ?></option>
							<option <?php if(wp_twitter_get_option('wp_twitter_where') == 'beforeandafter') echo 'selected="selected"'; ?> value="beforeandafter"><?php _e('Before and After', 'wp-twitter-button'); ?></option>
							<option <?php if(wp_twitter_get_option('wp_twitter_where') == 'shortcode') echo 'selected="selected"'; ?> value="shortcode"><?php _e('Shortcode [wp_twitter]', 'wp-twitter-button'); ?></option>
							<option <?php if(wp_twitter_get_option('wp_twitter_where') == 'manual') echo 'selected="selected"'; ?> value="manual"><?php _e('Manual', 'wp-twitter-button'); ?></option>
						</select>
						<?php if(wp_twitter_get_option('wp_twitter_where') == 'manual') : ?>
							<p><?php _e('Add the following code to your template', 'wp-twitter-button'); ?></p>
							<p>
								<code>
									&lt;?php if(function_exists('wp_twitterbutton')) { wp_twitterbutton(); } ?&gt;
								</code>
							</p>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th scope="row" valign="top"><?php _e('RSS Position', 'wp-twitter-button'); ?></th>
					<td>
						<select name="wp_twitter_settings[wp_twitter_rss_where]">
							<option <?php if (wp_twitter_get_option('wp_twitter_rss_where') == 'before') echo 'selected="selected"'; ?> value="before"><?php _e('Before', 'wp-twitter-button'); ?></option>
							<option <?php if (wp_twitter_get_option('wp_twitter_rss_where') == 'after') echo 'selected="selected"'; ?> value="after"><?php _e('After', 'wp-twitter-button'); ?></option>
							<option <?php if (wp_twitter_get_option('wp_twitter_rss_where') == 'beforeandafter') echo 'selected="selected"'; ?> value="beforeandafter"><?php _e('Before and After', 'wp-twitter-button'); ?></option>
							<option <?php if (wp_twitter_get_option('wp_twitter_where') == 'shortcode') echo 'selected="selected"'; ?> value="shortcode"><?php _e('Shortcode [wp_twitter]', 'wp-twitter-button'); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row" valign="top"><?php _e('Type', 'wp-twitter-button'); ?></th>
					<td>
						<div style="float:left; width:32%;">
							<p>
								<input type="radio" value="vertical" <?php if (wp_twitter_get_option('wp_twitter_version') == 'vertical') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_version]" id="wp_twitter_settings[wp_twitter_version_vertical]" group="wp_twitter_version"/>
								<label for="wp_twitter_settings[wp_twitter_version_vertical]"><?php _e('Vertical count', 'wp-twitter-button'); ?></label>
							</p>
							<p><img src="<?php echo plugins_url(basename(dirname(__FILE__))); ?>/img/tweetv.png" /></p>
						</div>
						<div style="float:left; width:32%;">
							<p>
								<input type="radio" value="horizontal" <?php if (wp_twitter_get_option('wp_twitter_version') == 'horizontal') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_version]" id="wp_twitter_settings[wp_twitter_version_horizontal]" group="wp_twitter_version" />
								<label for="wp_twitter_settings[wp_twitter_version_horizontal]"><?php _e('Horizontal count', 'wp-twitter-button'); ?></label>
							</p>
							<p><img src="<?php echo plugins_url(basename(dirname(__FILE__))); ?>/img/tweeth.png" /></p>
						</div>
						<div style="float:left; width:32%;">
							<p>
								<input type="radio" value="none" <?php if (wp_twitter_get_option('wp_twitter_version') == 'none') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_version]" id="wp_twitter_settings[wp_twitter_version_none]" group="wp_twitter_version" />
								<label for="wp_twitter_settings[wp_twitter_version_none]"><?php _e('No count', 'wp-twitter-button'); ?></label>
							</p>
							<p><img src="<?php echo plugins_url(basename(dirname(__FILE__))); ?>/img/tweetn.png" /></p>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row" valign="top"><label for="wp_twitter_settings[wp_twitter_style]"><?php _e('Styling', 'wp-twitter-button'); ?></label></th>
					<td>
						<input type="text" value="<?php echo htmlspecialchars(wp_twitter_get_option('wp_twitter_style')); ?>" name="wp_twitter_settings[wp_twitter_style]" id="wp_twitter_settings[wp_twitter_style]" />
						<span class="description"><?php _e('Add style to the div that surrounds the button E.g. <code>float: left; margin-right: 10px;</code>', 'wp-twitter-button'); ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row" valign="top"><label for="wp_twitter_settings[wp_twitter_source]"><?php _e('Source', 'wp-twitter-button'); ?></label></th>
					<td>
						RT @<input type="text" value="<?php echo wp_twitter_get_option('wp_twitter_source'); ?>" name="wp_twitter_settings[wp_twitter_source]" id="wp_twitter_settings[wp_twitter_source]" class="required" minlength="2" />
						<span class="description"><?php _e('Please use the format of \'yourname\', not \'RT @yourname\'.', 'wp-twitter-button'); ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row" valign="top"><?php _e('Language', 'wp-twitter-button'); ?></th>
					<td>
						<select name="wp_twitter_settings[wp_twitter_language]">
							<option <?php if(wp_twitter_get_option('wp_twitter_language') == '') echo 'selected="selected"'; ?> value=""><?php _e('English', 'wp-twitter-button'); ?></option>
							<option <?php if(wp_twitter_get_option('wp_twitter_language') == 'fr') echo 'selected="selected"'; ?> value="fr"><?php _e('French', 'wp-twitter-button'); ?></option>
							<option <?php if(wp_twitter_get_option('wp_twitter_language') == 'de') echo 'selected="selected"'; ?> value="de"><?php _e('German', 'wp-twitter-button'); ?></option>
							<option <?php if(wp_twitter_get_option('wp_twitter_language') == 'es') echo 'selected="selected"'; ?> value="es"><?php _e('Spanish', 'wp-twitter-button'); ?></option>
							<option <?php if(wp_twitter_get_option('wp_twitter_language') == 'ja') echo 'selected="selected"'; ?> value="ja"><?php _e('Japanese', 'wp-twitter-button'); ?></option>
						</select>
						<span class="description"><?php _e('The language of the button.', 'wp-twitter-button'); ?></span>
					</td>
				</tr>
				<tr>
					<th scope="row" valign="top"><?php _e('Tweet-Text', 'wp-twitter-button'); ?></th>
					<td>
						<div>
							<input type="radio" value="default" <?php if (wp_twitter_get_option('wp_twitter_tweettext') == 'default') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_tweettext]" id="wp_twitter_settings[wp_twitter_tweettext_default]" group="wp_twitter_tweettext" />
							<select name="wp_twitter_settings[wp_twitter_tweettext_default_as]">
								<option <?php if(wp_twitter_get_option('wp_twitter_tweettext_default_as') == 'posttitle-blogtitle') echo 'selected="selected"'; ?> value="posttitle-blogtitle"><?php _e('Posttitle &raquo; Blogtitle', 'wp-twitter-button'); ?></option>
								<option <?php if(wp_twitter_get_option('wp_twitter_tweettext_default_as') == 'posttitle') echo 'selected="selected"'; ?> value="posttitle"><?php _e('Posttitle', 'wp-twitter-button'); ?></option>
							</select>
							<label for="wp_twitter_settings[wp_twitter_tweettext_default]"><?php _e('The title of the page the button is on.', 'wp-twitter-button'); ?></label>
						</div>
						<div>
							<input type="radio" value="own" <?php if (wp_twitter_get_option('wp_twitter_tweettext') == 'own') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_tweettext]" id="wp_twitter_settings[wp_twitter_tweettext_own]" group="wp_twitter_tweettext" />
							<input type="text" value="<?php echo wp_twitter_get_option('wp_twitter_tweettext_owntext'); ?>" name="wp_twitter_settings[wp_twitter_tweettext_owntext]" id="wp_twitter_settings[wp_twitter_tweettext_owntext]" />
							<span class="description"><?php _e('This is the text that people will include in their Tweet when they share from your website.', 'wp-twitter-button'); ?></span>
							<?php if(wp_twitter_get_option('wp_twitter_tweettext') == 'own' && strlen(wp_twitter_get_option('wp_twitter_tweettext_owntext')) == 0) : ?>
							<div class="error">
								<p style="font-weight:bold;">
									<?php _e('Custom tweettext missing !!!', 'wp-twitter-button'); ?>
								</p>
								<p>
									<?php _e('Please enter a custom tweettext. Otherweise the plugin will use default settings for tweetext as &quot;<strong>Posttitle &raquo; Blogtitle</strong>&quot;', 'wp-twitter-button'); ?>
								</p>
							</div>
							<?php endif; ?>
						</div>
						<div>
							<input type="checkbox" value="1" <?php if(wp_twitter_get_option('wp_twitter_hashtags') == '1') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_hashtags]" id="wp_twitter_settings[wp_twitter_hashtags]" group="wp_twitter_tweettext" />
							<label for="wp_twitter_settings[wp_twitter_hashtags]"><?php _e('Use tags as #hashtags', 'wp-twitter-button'); ?></label>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row" valign="top"><?php _e('Maintenance', 'wp-twitter-button'); ?></th>
					<td>
						<div>
							<input type="checkbox" value="1" <?php //if(wp_twitter_get_option('wp_twitter_maintenance_reset') == '1') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_maintenance_reset]" id="wp_twitter_settings[wp_twitter_maintenance_reset]" group="wp_twitter_tweettext" />
							<label for="wp_twitter_settings[wp_twitter_maintenance_reset]"><?php _e('Reset Options', 'wp-twitter-button'); ?></label>
							<span class="description">
								(<?php _e('This will delete all options from database and restore the defaults', 'wp-twitter-button'); ?>)
							</span>
						</div>
						<div>
							<input type="checkbox" value="1" <?php //if(wp_twitter_get_option('wp_twitter_maintenance_clear') == '1') echo 'checked="checked"'; ?> name="wp_twitter_settings[wp_twitter_maintenance_clear]" id="wp_twitter_settings[wp_twitter_maintenance_clear]" group="wp_twitter_tweettext" />
							<label for="wp_twitter_settings[wp_twitter_maintenance_clear]"><?php _e('Clear Options', 'wp-twitter-button'); ?></label>
							<span class="description">
								(<?php _e('This will delete all options from database', 'wp-twitter-button'); ?>)
							</span>
						</div>
					</td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Save Changes', 'wp-twitter-button'); ?>" />
			</p>
		</form>
	</div>
<?php
}

/**
 * Link zur Adminseite in der Pluginübersicht hinzufügen.
 * @since 1.2.0
 */
function wp_twitter_settings_link($links, $file) {
 	if($file == 'wp-twitter-retweet-button/wp-twitter-button.php' && function_exists('admin_url')) {
		$settings_link = '<a href="' . admin_url('options-general.php?page=wp-twitter-retweet-button-options') . '">' . __('Settings') . '</a>';
		array_unshift( $links, $settings_link); // before the other links
	}

	return $links;
}

/**
 * Variablen registrieren.
 * @since 1.0.0
 */
function wp_twitter_init() {
	if(function_exists('register_setting')) {
		register_setting('wp_twitter-options', 'wp_twitter_settings');
	}

	/**
	 * Sprachdatei wählen
	 */
	if(function_exists('load_plugin_textdomain')) {
		load_plugin_textdomain('wp-twitter-button', false, dirname(plugin_basename( __FILE__ )) . '/languages/');
	}
}

/**
 * Twittername angleichen.
 * Nicht erwünschte Zeichen entfernen.
 *
 * @param string $username
 * @since 1.8.0
 */
function wp_twitter_sanitize_username($username) {
	return preg_replace('/[^A-Za-z0-9_]/', '', $username);
}

/**
 * Standardwerte setzen
 * @since 1.0.0
 */
function wp_twitter_activate() {
	if(!is_array(get_option('wp_twitter_settings'))) {
		add_option('wp_twitter_settings', wp_twitter_get_default_options());
	} else {
		$array_OptionsOld = wp_twitter_get_option();

		if($array_OptionsOld['wp_twitter_plugin_version'] != WP_TWITTER_RETWEET_BUTTON_VERSION) {
			$array_OptionsOld['wp_twitter_plugin_version'] = WP_TWITTER_RETWEET_BUTTON_VERSION;

			wp_twitter_update_options($array_OptionsOld);
			return;
		}

		return;
	}
}

/**
 * Array mit den Default-Optionen
 * @since 1.8.0
 */
function wp_twitter_get_default_options() {
	$array_OptionsDefault = array(
		'wp_twitter_plugin_version' => (string) WP_TWITTER_RETWEET_BUTTON_VERSION,
		'wp_twitter_where' => 'before',
		'wp_twitter_rss_where' => 'before',
		'wp_twitter_language' => 'de',
		'wp_twitter_source' => wp_twitter_sanitize_username(''),
		'wp_twitter_style' => 'float: right; margin-left: 10px;',
		'wp_twitter_display_page' => '1',
		'wp_twitter_display_front' => '0',
		'wp_twitter_display_archive' => '0',
		'wp_twitter_display_category' => '0',
		'wp_twitter_display_feed' => '0',
		'wp_twitter_version' => 'vertical',
		'wp_twitter_tweettext' => 'default',
		'wp_twitter_tweettext_owntext' => '',
		'wp_twitter_hashtags' => '1',
		'wp_twitter_tweettext_default_as' => 'posttitle-blogtitle'
	);

	return $array_OptionsDefault;
}

/**
 * Optionen updaten ...
 * @param array $array_Data
 * @since 1.8.0
 */
function wp_twitter_update_options($array_Data) {
	$array_Options = array_merge((array) get_option('wp_twitter_settings'), $array_Data);
	update_option('wp_twitter_settings', $array_Options);
	wp_cache_set('wp_twitter_settings', $array_Options);

	return;
}

/**
 * Hooks abfeuern
 */
/* Plugin aktivieren */
if(function_exists('register_activation_hook')) {
	register_activation_hook(__FILE__, 'wp_twitter_activate');
}

/**
 * Actions abfeuern
 */
/* Header und Footer erweitern erweitern */
add_action('wp_head', 'wp_twitter_head');
add_action('wp_footer', 'wp_twitter_footer');

/* Nur wenn User auch der Admin ist, sind die Adminoptionen zu sehen */
if(is_admin()) {
	add_action('admin_menu', 'wp_twitter_options');
	add_action('admin_init', 'wp_twitter_init');
}

/**
 * Filter zum Blog hinzufügen
 */
add_filter('the_content', 'wp_twitter_update', 8);
add_filter('get_the_excerpt', 'wp_twitter_remove_filter', 9);
add_filter('plugin_action_links', 'wp_twitter_settings_link', 9, 2 );
?>