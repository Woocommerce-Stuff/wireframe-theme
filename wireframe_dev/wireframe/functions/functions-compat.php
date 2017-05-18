<?php
/**
 * Backwards compatibility helper functions for Wireframe themes.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe_Theme
 * @author    MixaTheme, Tada Burke
 * @copyright 2016 MixaTheme
 * @license   GPL-2.0+
 * @version   1.0.0 Wireframe_Theme
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 * @see       https://developer.wordpress.org/themes/basics/theme-functions
 * @see       https://developer.wordpress.org/themes/functionality/custom-headers
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
 * Wireframe Theme Compatibility: WordPress.
 *
 * This function is hooked via `functions.php` file if the version of
 * WordPress is not compatible with this theme. You need to use a helper function
 * because the Module_Notices class is not available yet.
 *
 * Note: This Admin notice does not use `is-dismissible` because the User
 * should deactivate the theme, then update WordPress.
 *
 * Note: This should be hooked via `admin_notices` function.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe_Theme
 * @see   functions.php
 */
function wireframe_theme_compat_wordpress() {
	$message = sprintf( __( '%1$s requires at least WordPress %2$s. You are running WordPress %3$s. Please upgrade WordPress and re-activate %1$s.', 'wireframe-theme' ), WIREFRAME_THEME_PRODUCT, WIREFRAME_THEME_WP, $GLOBALS['wp_version'] );
	printf( __( '<div class="error"><p>%s</p></div>', 'wireframe-theme' ), $message ); // XSS ok.
}

/**
 * Hides the custom post template for pages on WordPress 4.6 and older
 *
 * @since  4.7.0 WordPress
 * @since  1.0.0 Wireframe_Theme
 * @author Pascal Birchler
 * @author MixaTheme
 * @see    https://make.wordpress.org/core/2016/11/03/post-type-templates-in-4-7/
 * @param  array $post_templates Array of page templates. Keys are filenames, values are translated names.
 * @return array Filtered array of page templates.
 * @todo   Needs work after 4.7+ is released.
 */
function wireframe_theme_exclude_page_templates( $post_templates ) {
	if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
		unset( $post_templates['template-parts/post-tpl-fullwidth.php'] );
	}
	return $post_templates;
}
// add_filter( 'theme_page_templates', 'wireframe_theme_exclude_page_templates' );

/**
 * Prevent switching to Wireframe Theme on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since  1.0.0 Wireframe_Theme
 * @author Automattic
 * @author MixaTheme
 *
 * @internal Thanks: twentyseventeen
 */
function wireframe_theme_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	if ( isset( $_GET['activated'] ) ) { // Input var ok.
		unset( $_GET['activated'] ); // Input var ok.
		add_action( 'admin_notices', 'wireframe_theme_upgrade_notice' );
	}
}
add_action( 'after_switch_theme', 'wireframe_theme_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Wireframe Theme on WordPress versions prior to 4.7.
 *
 * @since  1.0.0 Wireframe_Theme
 * @author Automattic
 * @author MixaTheme
 * @global string $GLOBALS['wp_version'] WordPress version.
 *
 * @internal Thanks: twentyseventeen
 */
function wireframe_theme_upgrade_notice() {
	$message = sprintf( __( '%1$s requires at least WordPress %2$s. You are running WordPress %3$s. Please upgrade WordPress and try again.', 'wireframe-theme' ), WIREFRAME_THEME_PRODUCT, WIREFRAME_THEME_WP, $GLOBALS['wp_version'] );
	printf( __( '<div class="error"><p>%s</p></div>', 'wireframe-theme' ), $message ); // XSS ok.
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since  1.0.0 Wireframe_Theme
 * @author Automattic
 * @author MixaTheme
 * @global string $GLOBALS['wp_version'] WordPress version.
 *
 * @internal Thanks: twentyseventeen
 */
function wireframe_theme_customize() {
	wp_die( sprintf( __( '%1$s requires at least WordPress %2$s. You are running WordPress %3$s. Please upgrade WordPress and try again.', 'wireframe-theme' ), WIREFRAME_THEME_PRODUCT, WIREFRAME_THEME_WP, $GLOBALS['wp_version'] ), '', array( // XSS ok.
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'wireframe_theme_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since  1.0.0 Wireframe_Theme
 * @author Automattic
 * @author MixaTheme
 * @global string $GLOBALS['wp_version'] WordPress version.
 *
 * @internal Thanks: twentyseventeen
 */
function wireframe_theme_preview() {
	if ( isset( $_GET['preview'] ) ) { // Input var ok.
		wp_die( sprintf( __( '%1$s requires at least WordPress %2$s. You are running WordPress %3$s. Please upgrade WordPress and try again.', 'wireframe-theme' ), WIREFRAME_THEME_PRODUCT, WIREFRAME_THEME_WP, $GLOBALS['wp_version'] ) ); // XSS ok.
	}
}
add_action( 'template_redirect', 'wireframe_theme_preview' );
