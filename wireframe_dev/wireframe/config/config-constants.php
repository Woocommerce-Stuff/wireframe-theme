<?php
/**
 * Constants config for themes built with Wireframe Suite for WordPress.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe Theme
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe Theme
 * @copyright 2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this software. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * WordPress Version.
 *
 * The minimum version of WordPress compatible with Wireframe Theme.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_WP', '4.7.5' );

/**
 * Product.
 *
 * Official product name for your theme. This is used in various headings,
 * titles and menus. Your official product name should maintain consistency.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_PRODUCT', 'Wireframe Theme' );

/**
 * Text-domain.
 *
 * Theme text-domain (must match slug) used primarily for translation strings.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_TEXTDOMAIN', 'wireframe-theme' );

/**
 * Version.
 *
 * Tagged version number for this release. This is used throughout many
 * dependencies, especially when you enqueue your styles & scripts.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_VERSION', '1.0.0' );

/**
 * Prefix.
 *
 * A prefix for various strings, handles and helpers. This is primarily used
 * for keeping names short and helps avoid clashes. 3-8 characters preferred.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_PREFIX', 'wireframe_theme' );

/**
 * Directory.
 *
 * Template directory path. Retrieves the absolute path to the directory
 * of the current theme. Returns an absolute server path, for example:
 * `/srv/www/wordpress/htdocs/wp-content/themes/wireframe_theme` (not a URI).
 *
 * @since 1.5.0 WordPress
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_DIR', get_template_directory() );

/**
 * URI.
 *
 * Template URI. Retrieve theme directory URI. Checks for SSL. Does not return
 * a trailing slash following the directory address. This is primarily used for
 * loading your theme assets.
 *
 * @since 1.5.0 WordPress
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_URI', get_template_directory_uri() );

/**
 * Developer path.
 *
 * Absolute path to the `wireframe_dev` directory. This directory is specifically
 * for Developers and contains functions, classes, uncompiled JS/SCSS, etc.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_DEV', trailingslashit( WIREFRAME_THEME_DIR . '/wireframe_dev' ) );

/**
 * Wireframe API.
 *
 * Absolute path to the Wireframe API. This directory holds base classes,
 * module classes, helper functions, utilities, config data, etc. This constant
 * should generally be used in conjunction with locate_template() so child
 * themes can overload any API files. NO leading slash. HAS trailing slash.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_API', trailingslashit( 'wireframe_dev/wireframe' ) );

/**
 * Wireframe API.
 *
 * Absolute path to the Wireframe API for loading class files. This should
 * only be used if you choose to NOT use Composer's autoloading feature.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_OBJECTS', trailingslashit( WIREFRAME_THEME_DIR . '/wireframe_dev/wireframe' ) );

/**
 * Client directory.
 *
 * Relative path to the `wireframe_client` directory. This directory primarily
 * holds front-end assets, such as: images, fonts, scripts, stylesheets, etc.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_CLIENT', trailingslashit( '/wireframe_client' ) );

/**
 * URI for CSS.
 *
 * URI for stylesheets located in the `wireframe_client/css` directory. This is
 * primarily called by the `wp_enqueue_scripts()` function.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_CSS', trailingslashit( WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'css' ) );

/**
 * URI for fonts.
 *
 * URI for fonts located in the `wireframe_client/fonts` directory. This is
 * primarily called by `.scss` files to compile the path to fonts.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_FONTS', trailingslashit( WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'fonts' ) );

/**
 * URI for images.
 *
 * URI for images located in the `wireframe_client/img` directory. This is
 * primarily called by `.scss` files to compile the path to images.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_IMG', trailingslashit( WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'img' ) );

/**
 * URI for JavaScript.
 *
 * URI for JavaScript files located in the `wireframe_client/js` directory. This is
 * primarily called by the `wp_enqueue_scripts()` function.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_JS', trailingslashit( WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'js' ) );

/**
 * Language path.
 *
 * Absolute path to the `wireframe_client/languages` directory. This directory
 * holds any `.mo` or `.po` or `.pot` files you package with your theme.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_LANG', trailingslashit( WIREFRAME_THEME_DIR . WIREFRAME_THEME_CLIENT . 'lang' ) );

/**
 * Templates directory.
 *
 * Relative path to the `wireframe_dev/template-parts` directory (NO leading slash).
 * This directory holds files called by the `get_template_part()` function.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
define( 'WIREFRAME_THEME_TPL', trailingslashit( 'wireframe_client/tpl' ) );
