<?php
/**
 * Functions file for Wireframe themes.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe_Theme
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe_Theme
 * @copyright 2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 * @see       https://codex.wordpress.org/Functions_File_Explained
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this software. If not, see <http://www.gnu.org/licenses/>.
 *
 * Table of Contents:
 *
 *    § 01. Constants
 *    § 02. Compatibility
 *
 * (New sections are separated by lines.)
 */

/**
 * § 01. Constant: WordPress Version.
 * =============================================================================
 *
 * The minimum version of WordPress compatible with Wireframe_Theme.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_WP', '4.7.5' );

/**
 * § 01. Constant: Theme text-domain (must match slug).
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_TEXTDOMAIN', 'wireframe-theme' );

/**
 * § 01. Constant: Product.
 *
 * Official product name for your theme. This is used in various headings,
 * titles and menus. Your official product name should maintain consistency.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_PRODUCT', 'Wireframe Theme' );

/**
 * § 01. Constant: Version.
 *
 * Tagged version number for this release. This is used throughout many
 * dependencies, especially when you enqueue your styles & scripts.
 * This can also be used for version checking backwards compatibility.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_VERSION', '1.0.0' );

/**
 * § 01. Constant: Prefix.
 *
 * A prefix for various strings, handles and helpers. This is primarily used
 * for keeping names short and helps avoid clashes. 3-8 characters preferred.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_PREFIX', 'wireframe_theme' );

/**
 * § 01. Constant: Directory.
 *
 * Template directory path. Retrieves the absolute path to the directory
 * of the current theme. Returns an absolute server path, for example:
 * `/srv/www/wordpress/htdocs/wp-content/themes/wireframe_theme` (not a URI).
 *
 * @since 1.5.0 WordPress
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_DIR', get_template_directory() );

/**
 * § 01. Constant: URI.
 *
 * Template URI. Retrieve theme directory URI. Checks for SSL. Does not return
 * a trailing slash following the directory address. This is primarily used for
 * loading your theme assets.
 *
 * @since 1.5.0 WordPress
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_URI', get_template_directory_uri() );

/**
 * § 01. Constant: Developer path.
 *
 * Absolute path to the `wireframe_dev` directory. This directory is specifically
 * for Developers and contains functions, classes, uncompiled JS/SCSS, etc.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_DEV', WIREFRAME_THEME_DIR . '/wireframe_dev/' );

/**
 * § 01. Constant: Wireframe API.
 *
 * Absolute path to the Wireframe API. This directory holds base classes,
 * module classes, helper functions, utilities, config data, etc. This constant
 * should generally be used in conjunction with locate_template() so child
 * themes can overload any API files. NO leading slash. HAS trailing slash.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_API', 'wireframe_dev/wireframe/' );

/**
 * § 01. Constant: Wireframe API.
 *
 * Absolute path to the Wireframe API for loading class files. This should
 * only be used if you choose to NOT use Composer's autoloading feature.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_OBJECTS', WIREFRAME_THEME_DIR . '/wireframe_dev/wireframe/' );

/**
 * § 01. Constant: Client directory.
 *
 * Relative path to the `wireframe_client` directory. This directory primarily
 * holds front-end assets, such as: images, fonts, scripts, stylesheets, etc.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_CLIENT', '/wireframe_client/' );

/**
 * § 01. Constant: URI for CSS.
 *
 * URI for stylesheets located in the `wireframe_client/css` directory. This is
 * primarily called by the `wp_enqueue_scripts()` function.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_CSS', WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'css/' );

/**
 * § 01. Constant: URI for fonts.
 *
 * URI for fonts located in the `wireframe_client/fonts` directory. This is
 * primarily called by `.scss` files to compile the path to fonts.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_FONTS', WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'fonts/' );

/**
 * § 01. Constant: URI for images.
 *
 * URI for images located in the `wireframe_client/img` directory. This is
 * primarily called by `.scss` files to compile the path to images.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_IMG', WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'img/' );

/**
 * § 01. Constant: URI for JavaScript.
 *
 * URI for JavaScript files located in the `wireframe_client/js` directory. This is
 * primarily called by the `wp_enqueue_scripts()` function.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_JS', WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'js/' );

/**
 * § 01. Constant: Language path.
 *
 * Absolute path to the `wireframe_client/languages` directory. This directory
 * holds any `.mo` or `.po` or `.pot` files you package with your theme.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_LANG', WIREFRAME_THEME_DIR . WIREFRAME_THEME_CLIENT . 'languages/' );

/**
 * § 01. Constant: Templates directory.
 *
 * Relative path to the `wireframe_dev/template-parts` directory (NO leading slash).
 * This directory holds files called by the `get_template_part()` function.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_TPL', 'wireframe_client/template-parts/' );

/**
 * § 02. Compatibility: Checker.
 * =============================================================================
 *
 * In this example, Wireframe_Theme only works with WordPress 4.7.4 or later.
 * If the version is incompatible, load any backwards compatibility helpers;
 * else continue bootstrapping wireframe.php.
 *
 * Note: Whenever WordPress releases a new update, we will always sync this
 * file on GitHub to reflect the latest WordPress version ;-)
 *
 * @since 1.0.0 Wireframe_Theme
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7.5', '<' ) ) {

	// Incompatible version, but you still need the translation file.
	load_theme_textdomain( WIREFRAME_THEME_TEXTDOMAIN, WIREFRAME_THEME_LANG );

	// Load any backwards compatibility handlers.
	require WIREFRAME_THEME_API . 'functions/functions-compat.php';

	// Finally, hook any Admin notices to alert your customers.
	add_action( 'admin_notices', 'wireframe_theme_compat_wordpress' );

} else {

	// Version looks good! Bootstrap your Wireframe_Theme...
	require_once WIREFRAME_THEME_DEV . 'wireframe.php';

}

/** ADD YOUR CUSTOM FUNCTIONS BELOW THIS LINE... */
/** ------------------------------------------------------------------------- */
