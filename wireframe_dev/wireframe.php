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
 *    § 03. Functions
 *    § 04. Objects
 *    § 05. Container
 *    § 06. Configs
 *    § 07. Service
 *    § 08. Wireframe
 *    § 09. Housekeeping
 *    § 10. Hooks
 *
 * (Constants are in functions.php. New sections are separated by lines.)
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
 * § 03. Functions.
 * =============================================================================
 *
 * Loads helper functions and callbacks. These functions should load before your
 * classes, so they become available to your objects. Once you get the hang of
 * Wireframem Theme, these files can probably be merged to save on file count.
 * We use locate_template() function so child themes can overload.
 *
 * @since 1.0.0 Wireframe_Theme
 */
locate_template( WIREFRAME_THEME_API . 'functions/functions-helpers.php', true, true );
locate_template( WIREFRAME_THEME_API . 'functions/functions-template-tags.php', true, true );
locate_template( WIREFRAME_THEME_API . 'functions/functions-views.php', true, true );
locate_template( WIREFRAME_THEME_API . 'functions/functions-custom-header.php', true, true );
locate_template( WIREFRAME_THEME_API . 'functions/functions-jetpack.php', true, true );
locate_template( WIREFRAME_THEME_API . 'functions/functions-extras.php', true, true );

/**
 * § 04. Objects.
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
	 * § 05. Container.
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
	 * § 06. Configs.
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
	 * § 07. Service: Language.
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
	 * § 07. Service: Notices.
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
	 * § 07. Service: UI.
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
	 * § 07. Service: Navigation.
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
	 * § 07. Service: Widgets.
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
	 * § 07. Service: Features.
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
	 * § 07. Service: Customizer.
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
	 * § 07. Service: Editor.
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
	 * § 07. Service: Admin.
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
	 * § 08. Wireframe is alive!
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
	 * § 09. Housekeeping.
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
		 * § 10. Hooks.
		 * =====================================================================
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
