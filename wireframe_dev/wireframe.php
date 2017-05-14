<?php
/**
 * The main `wireframe.php` file for bootstrapping Wireframe Theme. Don't let any
 * of this scare you. Wireframe is pretty smart and does most of the heavy lifting
 * for you. To get up-and-running quickly, you just need to modify config files.
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
 *
 * Table of Contents:
 *
 *    § 01. Namespaces
 *    § 02. Access
 *    § 03. Constants
 *    § 04. Functions
 *    § 05. Objects
 *    § 06. Container
 *    § 07. Configs
 *    § 08. Service
 *    § 09. Wireframe
 *    § 10. Housekeeping
 *    § 11. Hooks
 *
 * (New sections are separated by lines.)
 */

/**
 * § 01. Namespaces.
 * =============================================================================
 *
 * @since 5.3.0 PHP
 * @since 1.0.0 Wireframe_Theme
 */
namespace MixaTheme\Wireframe\Theme;

/**
 * § 02. Access.
 * =============================================================================
 *
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe_Theme
 */
defined( 'ABSPATH' ) or die();

/**
 * § 03. Constant: Theme text-domain (must match slug).
 * =============================================================================
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_TEXTDOMAIN', 'wireframe-theme' );

/**
 * § 03. Constant: Product.
 *
 * Official product name for your theme. This is used in various headings,
 * titles and menus. Your official product name should maintain consistency.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_PRODUCT', 'Wireframe Theme' );

/**
 * § 03. Constant: Prefix.
 *
 * A prefix for various strings, handles and helpers. This is primarily used
 * for keeping names short and helps avoid clashes. 3-8 characters preferred.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_PREFIX', 'wireframe_theme' );

/**
 * § 03. Constant: Version.
 *
 * Tagged version number for this release. This is used throughout many
 * dependencies, especially when you enqueue your styles & scripts.
 * This can also be used for version checking backwards compatibility.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_VERSION', '1.0.0' );

/**
 * § 03. Constant: Directory.
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
 * § 03. Constant: URI.
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
 * § 03. Constant: Developer path.
 *
 * Absolute path to the `wireframe_dev` directory. This directory is specifically
 * for Developers and contains functions, classes, uncompiled JS/SCSS, etc.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_DEV', WIREFRAME_THEME_DIR . '/wireframe_dev/' );

/**
 * § 03. Constant: Wireframe API.
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
 * § 03. Constant: Wireframe API.
 *
 * Absolute path to the Wireframe API for loading class files. This should
 * only be used if you choose to NOT use Composer's autoloading feature.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_OBJECTS', WIREFRAME_THEME_DIR . '/wireframe_dev/wireframe/' );

/**
 * § 03. Constant: Client directory.
 *
 * Relative path to the `wireframe_client` directory. This directory primarily
 * holds front-end assets, such as: images, fonts, scripts, stylesheets, etc.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_CLIENT', '/wireframe_client/' );

/**
 * § 03. Constant: URI for CSS.
 *
 * URI for stylesheets located in the `wireframe_client/css` directory. This is
 * primarily called by the `wp_enqueue_scripts()` function.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_CSS', WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'css/' );

/**
 * § 03. Constant: URI for fonts.
 *
 * URI for fonts located in the `wireframe_client/fonts` directory. This is
 * primarily called by `.scss` files to compile the path to fonts.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_FONTS', WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'fonts/' );

/**
 * § 03. Constant: URI for images.
 *
 * URI for images located in the `wireframe_client/img` directory. This is
 * primarily called by `.scss` files to compile the path to images.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_IMG', WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'img/' );

/**
 * § 03. Constant: URI for JavaScript.
 *
 * URI for JavaScript files located in the `wireframe_client/js` directory. This is
 * primarily called by the `wp_enqueue_scripts()` function.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_JS', WIREFRAME_THEME_URI . WIREFRAME_THEME_CLIENT . 'js/' );

/**
 * § 03. Constant: Language path.
 *
 * Absolute path to the `wireframe_client/languages` directory. This directory
 * holds any `.mo` or `.po` or `.pot` files you package with your theme.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_LANG', WIREFRAME_THEME_DIR . WIREFRAME_THEME_CLIENT . 'languages/' );

/**
 * § 03. Constant: Templates directory.
 *
 * Relative path to the `wireframe_dev/template-parts` directory (NO leading slash).
 * This directory holds files called by the `get_template_part()` function.
 *
 * @since 1.0.0 Wireframe_Theme
 */
define( 'WIREFRAME_THEME_TPL', 'wireframe_client/template-parts/' );

/**
 * § 04. Functions.
 * =============================================================================
 *
 * Loads helper functions and callbacks. These functions should load before your
 * classes, so they become available to your objects. Once you get the hang of
 * Wireframem Theme, these files can probably be merged to save on file count.
 * We use locate_template() function so child themes can overload.
 *
 * @since 1.0.0 Wireframe_Theme
 */
locate_template( WIREFRAME_THEME_API . 'functions/functions-custom-header.php', true, true );
locate_template( WIREFRAME_THEME_API . 'functions/functions-template-tags.php', true, true );
locate_template( WIREFRAME_THEME_API . 'functions/functions-extras.php', true, true );
locate_template( WIREFRAME_THEME_API . 'functions/functions-jetpack.php', true, true );
locate_template( WIREFRAME_THEME_API . 'functions/functions-theme-admin.php', true, true );

/**
 * § 05. Objects.
 * =============================================================================
 *
 * Option #1: Use `require_once()` to load your class dependencies 1-by-1.
 *            This is the default option because some Developers don't use Composer.
 *
 * Option #2: Autoload class dependencies via Composer's `composer.json` file.
 *            If you add new class files, you must re-compile `composer.json`.
 *            This is the preferred option for loading your objects.
 *
 * Autoload Example:
 *
 *            require_once WIREFRAME_THEME_DEV . 'vendor/autoload.php';
 *
 * PRO-TIP: To re-compile the autoloader in CLI, replace all the require_once()
 * lines below with the `Autoload Example` above, `cd` to the directory where the
 * `composer.json` file is located, then execute: composer dump-autoload -o
 *
 * @since 1.0.0 Wireframe_Theme
 * @since 1.1.2 Composer
 * @see   composer.json
 * @see   https://getcomposer.org
 *
 * @internal CLI: composer update
 * @internal CLI: composer dump-autoload -o
 * @internal WPCS expects a lowercase filename (PSR-2, PSR-4 invalid).
 */
require_once WIREFRAME_THEME_OBJECTS . 'core/core-module-abstract.php';
require_once WIREFRAME_THEME_OBJECTS . 'core/core-container-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'core/core-container.php';
require_once WIREFRAME_THEME_OBJECTS . 'core/core-enqueue-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'core/core-enqueue.php';
require_once WIREFRAME_THEME_OBJECTS . 'core/core-language-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'core/core-language.php';
require_once WIREFRAME_THEME_OBJECTS . 'core/core-theme-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'core/core-theme.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/admin/module-admin-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/admin/module-admin.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/customizer/module-customizer-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/customizer/module-customizer.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/editor/module-editor-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/editor/module-editor.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/features/module-features-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/features/module-features.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/navigation/module-navigation-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/navigation/module-navigation.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/notices/module-notices-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/notices/module-notices.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/ui/module-ui-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/ui/module-ui.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/widgets/module-widgets-interface.php';
require_once WIREFRAME_THEME_OBJECTS . 'module/widgets/module-widgets.php';

/**
 * Check if the `Core_Theme` class exists then configure defaults.
 *
 * @since 1.0.0 Wireframe_Theme
 */
if ( class_exists( 'MixaTheme\Wireframe\Theme\Core_Theme' ) ) :
	/**
	 * § 06. Container.
	 * =========================================================================
	 *
	 * Wireframe Theme needs to wire objects to the Core_Container $_storage array.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   object   Core_Container
	 * @var   callable $wireframe_theme_container
	 */
	$wireframe_theme_container = new Core_Container();

	/**
	 * § 07. Configs.
	 * =========================================================================
	 *
	 * Option #1: Load config data for passing array args into theme objects.
	 *
	 * Option #2: You can set args/properties for objects inside an object closure
	 *            (see `Closure` section below). If you wish to set your config
	 *            data inside closures, then you don't need to require files.
	 *            We also use locate_template() so child themes can overload.
	 *
	 * Data files are located in: `wireframe_dev/wireframe/config/`
	 *
	 * @since 1.0.0 Wireframe_Theme
	 */
	locate_template( WIREFRAME_THEME_API . 'config/config-language.php', true, true );
	locate_template( WIREFRAME_THEME_API . 'config/config-notices.php', true, true );
	locate_template( WIREFRAME_THEME_API . 'config/config-ui.php', true, true );
	locate_template( WIREFRAME_THEME_API . 'config/config-navigation.php', true, true );
	locate_template( WIREFRAME_THEME_API . 'config/config-widgets.php', true, true );
	locate_template( WIREFRAME_THEME_API . 'config/config-features.php', true, true );
	locate_template( WIREFRAME_THEME_API . 'config/config-customizer.php', true, true );
	locate_template( WIREFRAME_THEME_API . 'config/config-editor.php', true, true );
	locate_template( WIREFRAME_THEME_API . 'config/config-admin.php', true, true );

	/**
	 * § 08. Service: Language.
	 * =========================================================================
	 *
	 * This closure registers a service with the Core_Container::$storage array,
	 * and instantiates a new Core_Language object with config data passed-in.
	 *
	 * @since  1.0.0 Wireframe_Theme
	 * @see    wireframe_theme_config_language()
	 * @return object Core_Language( @param array Object args. )
	 */
	$wireframe_theme_container->language = function () {
		return new Core_Language( wireframe_theme_config_language() );
	};

	/**
	 * § 08. Service: Notices.
	 * =========================================================================
	 *
	 * This closure registers a service with the Core_Container::$storage array,
	 * and instantiates a new Module_Notices object with config data passed-in.
	 *
	 * @since  1.0.0 Wireframe_Theme
	 * @see    wireframe_theme_config_notices()
	 * @return object Module_Notices( @param array Object args. )
	 */
	$wireframe_theme_container->notices = function () {
		return new Module_Notices( wireframe_theme_config_notices() );
	};

	/**
	 * § 08. Service: UI.
	 *
	 * This closure registers a service with the Core_Container::$storage array,
	 * and instantiates a new Module_UI object with config data passed-in.
	 *
	 * @since  1.0.0 Wireframe_Theme
	 * @see    wireframe_theme_config_ui()
	 * @return object Module_UI( @param array Object args. )
	 */
	$wireframe_theme_container->ui = function () {
		return new Module_UI( wireframe_theme_config_ui() );
	};

	/**
	 * § 08. Service: Navigation.
	 *
	 * This closure registers a service with the Core_Container::$storage array,
	 * and instantiates a new Module_Navigation object with config data passed-in.
	 *
	 * @since  1.0.0 Wireframe_Theme
	 * @see    wireframe_theme_config_navigation()
	 * @return object Module_Navigation( @param array Object args. )
	 */
	$wireframe_theme_container->mainmenu = function () {
		return new Module_Navigation( wireframe_theme_config_navigation() );
	};

	/**
	 * § 08. Service: Widgets.
	 *
	 * This closure registers a service with the Core_Container::$storage array,
	 * and instantiates a new Module_Widgets object with config data passed-in.
	 *
	 * @since  1.0.0 Wireframe_Theme
	 * @see    wireframe_theme_config_widgets()
	 * @return object Module_Widgets( @param array Object args. )
	 */
	$wireframe_theme_container->widgets = function () {
		return new Module_Widgets( wireframe_theme_config_widgets() );
	};

	/**
	 * § 08. Service: Features.
	 *
	 * This closure registers a service with the Core_Container::$storage array,
	 * and instantiates a new Module_Features object with config data passed-in.
	 *
	 * @since  1.0.0 Wireframe_Theme
	 * @see    wireframe_theme_config_features()
	 * @return object Module_Features( @param array Object args. )
	 */
	$wireframe_theme_container->features = function () {
		return new Module_Features( wireframe_theme_config_features() );
	};

	/**
	 * § 08. Service: Customizer.
	 *
	 * This closure registers a service with the Core_Container::$storage array,
	 * and instantiates a new Module_Customizer object with config data passed-in.
	 *
	 * @since  1.0.0 Wireframe_Theme
	 * @see    wireframe_theme_config_customizer()
	 * @return object Module_Customizer( @param array Object args. )
	 */
	$wireframe_theme_container->customizer = function () {
		return new Module_Customizer( wireframe_theme_config_customizer() );
	};

	/**
	 * § 08. Service: Editor.
	 *
	 * This closure registers a service with the Core_Container::$storage array,
	 * and instantiates a new Module_Editor object with config data passed-in.
	 *
	 * @since  1.0.0 Wireframe_Theme
	 * @see    wireframe_theme_config_editor()
	 * @return object Module_Editor( @param array Object args. )
	 */
	$wireframe_theme_container->editor = function () {
		return new Module_Editor( wireframe_theme_config_editor() );
	};

	/**
	 * § 08. Service: Admin.
	 *
	 * This closure registers a service with the Core_Container::$storage array,
	 * and instantiates a new Module_Admin object with config data passed-in.
	 *
	 * @since  1.0.0 Wireframe_Theme
	 * @see    wireframe_theme_config_admin()
	 * @return object Module_Admin( @param array Object args. )
	 */
	$wireframe_theme_container->admin = function () {
		return new Module_Admin( wireframe_theme_config_admin() );
	};

	/**
	 * § 09. Wireframe is alive!
	 * =========================================================================
	 *
	 * Instantiates the base `Core_Theme` object, then wires together the default
	 * services you added to the `$wireframe_theme_container` object (above).
	 *
	 * Option #1: You can re-declare which objects your theme wires via the
	 *            _construct() method in the `Core_Theme` class. Then, DI only
	 *            the objects you need. We started you off with common objects.
	 *
	 * Option #2: You can entirely swap-out the `Core_Theme` class with your
	 *            own custom class, or make the `Core_Theme` class abstract,
	 *            then extend it.
	 *
	 * Option #3: You can also use a Controller class to control your objects.
	 *            If you use a Controller class, you only need to DI 1 (Controller)
	 *            object. Too complex? Don't worry. Checkout our Wireframe_Plugin
	 *            example: @see https://github.com/mixatheme/wireframe-plugin
	 *
	 * @since  1.0.0 Wireframe_Theme
	 * @var    object $wireframe_theme
	 * @return object Core_Theme(
	 *         @param object Core_Language    DI the default language.
	 *         @param object Module_Notices    DI the default Notices.
	 *         @param object Module_UI         DI the default UI.
	 *         @param object Module_Mainmenu   DI the default Mainmenu.
	 *         @param object Module_Widgets    DI the default widgets.
	 *         @param object Module_Features   DI the default Theme Features.
	 *         @param object Module_Customizer DI the default Customizer.
	 *         @param object Module_Editor     DI the default Editor.
	 *         @param object Module_Admin      DI the default Admin area.
	 * )
	 */
	$wireframe_theme = new Core_Theme(
		$wireframe_theme_container->language,
		$wireframe_theme_container->notices,
		$wireframe_theme_container->ui,
		$wireframe_theme_container->mainmenu,
		$wireframe_theme_container->widgets,
		$wireframe_theme_container->features,
		$wireframe_theme_container->customizer,
		$wireframe_theme_container->editor,
		$wireframe_theme_container->admin
	);

	/**
	 * § 10. Housekeeping.
	 * =========================================================================
	 *
	 * Check if Wireframe Theme is properly initialized. You can perform any
	 * clean-up tasks here, or simply output a warning if `$wireframe_theme`
	 * fails. Your template files now have access to objects beyond this point.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @var   object $wireframe_theme
	 * @var   object $wireframe_theme->language()
	 * @var   object $wireframe_theme->notices()
	 * @var   object $wireframe_theme->ui()
	 * @var   object $wireframe_theme->mainmenu()
	 * @var   object $wireframe_theme->widgets()
	 * @var   object $wireframe_theme->features()
	 * @var   object $wireframe_theme->customizer()
	 * @var   object $wireframe_theme->editor()
	 * @var   object $wireframe_theme->admin()
	 */
	if ( ! isset( $wireframe_theme ) ) {

		// Init failed. Stop processing. Hook a failure notice.
		add_action( 'admin_notices', array( $wireframe_theme_container->notices, 'error_init' ), 10, 0 );

	} else {

		/**
		 * § 11. Hooks.
		 * =========================================================================
		 *
		 * Init success! Continue processing. Run any hooks you need.
		 *
		 * Note: Many objects are not required to be wired (hooked) when instantiated.
		 * In your config data file(s), you can set the `$wired` value to true or false.
		 * If false, you can de-couple any hooks and declare them here (below).
		 * If $wired = true, then those objects will fire hooks onload.
		 *
		 * Data files are located in: `wireframe_dev/wireframe/config/`
		 *
		 * @since 1.0.0 Wireframe_Theme
		 * @see   object $wireframe_theme Instance of Core_Theme.
		 */
		add_action( 'after_switch_theme', array( $wireframe_theme_container->notices, 'warn_activated' ), 10, 0 );
	}

endif; // Thanks for using MixaTheme products!
