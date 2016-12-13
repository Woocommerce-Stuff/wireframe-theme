<?php
/**
 * Theme_Notices config data file for Wireframe themes.
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
 * Namespaces.
 *
 * @since 5.3.0 PHP
 * @since 1.0.0 Wireframe_Theme
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe_Theme
 */
defined( 'ABSPATH' ) or die();

/**
 * Stores array of default config data for passing into objects.
 *
 * Option #1: We use a function so the config data can be called and reused
 *            easily when you neeed it.
 *
 * Option #2: Put your array data inside a Service closure (see wireframe.php).
 *            Another alternative is putting all your object configs into one
 *            single config file to minimize your file count.
 *
 * @since  1.0.0 Wireframe_Theme
 * @see    object Theme_Notices
 * @return array  Default configuration values.
 */
function wireframe_theme_config_notices() {
	/**
	 * Wired.
	 *
	 * Most objects can be wired to hook actions & filters when an object is
	 * instantiated. This is optional, because some objects do not need any
	 * actions or filters. Default: false
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @var   bool $wired Wire hooks via __construct().
	 */
	$wired = true;

	/**
	 * Prefix.
	 *
	 * Many objects use a prefix for various strings, handles, scripts, etc.
	 * Generally, you should use a constant defined in wireframe.php. However,
	 * you can change it here if needed. Default: WIREFRAME_THEME_PREFIX
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @var   string $prefix Prefix for handles.
	 */
	$prefix = WIREFRAME_THEME_PREFIX;

	/**
	 * Actions.
	 *
	 * Most objects will usually need actions to be hooked at some point.
	 * You can set your actions in a multi-dimensional array and remember
	 * to set the property $wired = true (above).
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @var   array $actions Actions to hook.
	 */
	$actions = array(
		'parent_theme' => array(
			'tag'      => 'after_switch_theme',
			'function' => 'parent_theme',
			'priority' => null,
			'args'     => null,
		),
	);

	/**
	 * Filters.
	 *
	 * Objects don't generally need filters here, but you have the option.
	 * You can set your filters in a multi-dimensional array and remember
	 * to set the property $wired = true (above).
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @var   array $filters Filters to hook.
	 * @todo  WIP.
	 */
	$filters = array();

	/**
	 * Notices.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @var   array.
	 */
	$notices = array(
		'parent_theme' => array(
			'selectors' => 'notice notice-warning is-dismissible',
			'subject'   => '<strong>Wireframe parent theme activated.</strong>',
			'message'   => 'This parent theme is intended for <em>Theme Developers</em> and <strong>does not have any styling</strong>. Did you know Wireframe also has a <a href="https://github.com/mixatheme/wireframe-child">child theme</a> with default styling? We recommend only Developers modify the parent theme. In most cases, creating unique and inspiring <a href="https://github.com/mixatheme/wireframe-child">child themes</a> is best practice.',
		),
	);

	/**
	 * Option #1: Return (array) of config data for passing into objects.
	 *
	 * Option #2: Cast array as an (object) and use object/property sytnax
	 *            vs array syntax. If you choose to cast this array as an (object),
	 *            then you will need to modify the syntax in your class files.
	 *
	 * PRO-TIP: Most of Wireframe's object properties are protected or private
	 * and should not be set outside of this config file. However, you may wish
	 * to use `apply_filters` or `wp_json_encode` or `add_setting` or `add_option`
	 * whenever appropriate. Consider Admin pages for modifying settings & options.
	 *
	 * @since  1.0.0 Wireframe_Theme
	 * @return array|object
	 */
	return array(
		'wired'   => $wired,
		'prefix'  => $prefix,
		'actions' => $actions,
		'filters' => $filters,
		'notices' => $notices,
	);

} // Thanks for using MixaTheme products!
