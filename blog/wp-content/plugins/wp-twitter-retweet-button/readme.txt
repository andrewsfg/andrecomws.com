=== WP-Twitter Retweet Button ===
Contributors: ppfeufer
Donate link:
Tags: twitter, button, retweet
Requires at least: 3.0.1
Tested up to: 3.1
Stable tag: 1.8.2

This plugin will install the official Twitter Button provided by Twitter to your Wordpress-Blog.

== Description ==

Twitter has provided a twitter and retweet button. This Plugin adds the official twitter button to your blog articles, pages, archives, categories and rss.

**Features**

* Easy install
* Panel for easy configuration
* Config Button Style
* Config Language of Button
* Config Your Twitter Account
* Config Tweet text
* Config display locations (entries, pages, home page, archive, category)
* Config position in content (before, after, both, manual choice)

**Note**

If you choose the position as "manual choice" you have to edit your template-file and add the following code at a position of your choice.
`&lt;?php if(function_exists('wp_twitterbutton')) { wp_twitterbutton(); } ?&gt;`

**Translations**

English
German
French (by: <a href="http://www.frankoli.de/blog/">Frank</a>)
Dutch (by: <a href="http://wpwebshop.com/">Rene</a>)

== Installation ==

You can use the built in installer and upgrader, or you can install the plugin manually.

**Installation via Wordpress**

1. Go to the menu 'Plugins' -> 'Install' and search for 'WP-Twitter Retweet Button'
1. Click 'install'

**Manual Installation**

1. Upload folder `wp-twitter-retweet-button` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure plugin in 'Twitterbutton' menu

== Screenshots ==
1. the settings menu

== Changelog ==

= 1.8.2 (18. 04. 2011) =
* Fix: typo in arraykeys

= 1.8.1 (21. 03. 2011) =
* New: added dutch translation (thanks to <a href="http://wpwebshop.com/">Rene</a>)

= 1.8.0 (04. 03. 2011) =
* Change: Moved link to settings page to settings menu.
* Change: optimized code, removed unused functions.
* Update: German translation file.
* New: sanitizing twitternames.
* New: added a little twitter-icon to settings link.

= 1.7.5 (26.01.2011) =
* Change: moved external JavaScript to the footer to improve performance.

= 1.7.4 (09.01.2011) =
* Fix: corrected loading of JavaScript after saving action.

= 1.7.3 (08.01.2011) =
* Update: german translation
* Update: JavaScript
* Test: ready for WordPress 3.1 (testet on WordPress 3.1-RC2)

= 1.7.2 =
* Optimized loading of javascript in backend. Load only when needed.
* Updated function for tweettext shorting. Now only fired if needed.
* Added Options for default tweettext ("Posttitle » Blogtitle" or "Posttitle")
* Fixed a bug with custom tweettext, which was not shown in backend.
* Added warning if custom tweettext is selected and tweettext is missing.
* Added fallback to default settings for tweetext as "Posttitle » Blogtitle" if custom tweettext is selected and tweettext is missing.

= 1.7.1 =
* JavaScript for Flattr-Button now added, I forgot it in last version :-(

= 1.7.0 =
* Shorten tweettext to fit in 140 characters (requested by <a href="http://kkoepke.de">Kai Köpke</a>)
* Added Flattr-Button in backend

= 1.6.3 =
* Fixed #hashtag-handling in single-posts.

= 1.6.2 =
* Fixed a little trouble I ran into with some themes.

= 1.6.1 =
* Added maintenanceoptions.

= 1.6.0 =
* Reduced the database load.
* Cleaned up old options and removed from database.

= 1.5.2 =
 * Replaced deprecated function for language support with new one

= 1.5.1 =
* Updated french translation (by <a href="http://www.frankoli.de/blog/">Frank</a>)

= 1.5.0 =
* Added Support for #Hashtags

= 1.4.0 =
* Option to display in archive-view added <em>(<strong>Note</strong>: not all themes support this option)</em>
* Option to display in category-view added <em>(<strong>Note</strong>: not all themes support this option)</em>
* Fixed the code for displaying in RSS
* Modified german translation
* Updated screenshot :-)

= 1.3.1 =
* Renamed menu WP-Twitter to Twitterbutton to avoid any confusion with the "WP to Twitter" Plugin
* Added translation in dashboardmenu (Twitterbutton -> Settings)

= 1.3.0 =
* Added german translation
* Added french translation (by <a href="http://www.frankoli.de/blog/">Frank</a>)

= 1.2.1 =
* Fixed a little typo in the rss-settings
* Added options for position in rss

= 1.2.0 =
* Buttonlanguage added
* Option to display button on frontpage added
* Option to display button on rss-feed added
* Option for own tweetext added

= 1.1.1 =
* Codecorrection

= 1.1.0 =
* Added Support for all the three buttons provided by Twitter. Selectable in Settings.

= 1.0.0 =
* Initial Release

== Frequently Asked Questions ==

Please read the FAQ under http://blog.ppfeufer.de/wordpress-plugin-wp-twitter-button/

== Upgrade Notice ==

Just upgrade via Wordpress.
