<?php
/**
 * Theme_Widgets config data file for Wireframe Theme.
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
 * Namespaces.
 *
 * @since 5.3.0 PHP
 * @since 1.0.0 Wireframe Theme
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe Theme
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
 * @since  1.0.0 Wireframe Theme
 * @see    object Theme_Widgets
 * @return array  Default configuration values.
 */
function wireframe_theme_config_widgets() {
	/**
	 * Wired.
	 *
	 * Wires the Theme_Wdigets actions & filters at runtime. Since all themes
	 * should have widgets registered, this should always be set to true.
	 *
	 * Note: Most objects can be wired to hook actions & filters when an object
	 * is instantiated. This is optional, because some objects do not need any
	 * actions or filters.
	 *
	 * @since 1.0.0 Wireframe Theme
	 * @var   bool $wired Wire hooks via __construct(). Default: true
	 */
	$wired = true;

	/**
	 * Prefix.
	 *
	 * Many objects use a prefix for various strings, handles, scripts, etc.
	 * Generally, you should use a constant defined in wireframe.php. However,
	 * you can change it here if needed. Default: WIREFRAME_THEME_PREFIX
	 *
	 * @since 1.0.0 Wireframe Theme
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
	 * @since 1.0.0 Wireframe Theme
	 * @var   array $actions Actions to hook.
	 */
	$actions = array(
		'register' => array(
			'tag'      => 'widgets_init',
			'function' => 'register',
			'priority' => 10,
			'args'     => 1,
		),
	);

	/**
	 * Filters.
	 *
	 * Objects don't generally need filters here, but you have the option.
	 * You can set your filters in a multi-dimensional array and remember
	 * to set the property $wired = true (above).
	 *
	 * @since 1.0.0 Wireframe Theme
	 * @var   array $filters Filters to hook.
	 * @todo  WIP.
	 */
	$filters = array();

	/**
	 * Widgets: Register Widgets.
	 *
	 * @since 1.0.0 Wireframe Theme
	 * @var   array $registered Array of registered widgets.
	 */
	$registered = array(
		'primary' => array(
			'name'          => __( 'Primary', 'wireframe-theme' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add important widgets here.', 'wireframe-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
	);

	/**
	 * Widgets: Unregister Widgets.
	 *
	 * @since 1.0.0 Wireframe Theme
	 * @var   array $unregistered Array of widgets to unregister.
	 * @todo  Bake this in or disallow?
	 */
	$unregistered = array();

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
	 * @since  1.0.0 Wireframe Theme
	 * @return array|object
	 */
	return array(
		'wired'        => $wired,
		'prefix'       => $prefix,
		'actions'      => $actions,
		'filters'      => $filters,
		'registered'   => $registered,
		'unregistered' => $unregistered,
	);

} // Thanks for using MixaTheme products!
