<?php
/**
 * Admin helper functions for Wireframe themes.
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
 * @see       https://developer.wordpress.org/themes/basics/theme-functions
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this software. If not, see <http://www.gnu.org/licenses/>.
 */

if ( ! function_exists( 'wireframe_theme_admin_check' ) ) :
	/**
	 * Wireframe Theme Admin Check.
	 *
	 * Check if the current user has Admin permmissions.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 */
	function wireframe_theme_admin_check() {
		if ( ! is_admin() ) {
			wp_die( 'You are not authorized to access this page.' );
		}
	}
endif;

if ( ! function_exists( 'wireframe_theme_tpl_tabs' ) ) :
	/**
	 * Wireframe Theme Admin Page: Tabs.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   wireframe_theme_admin_check()
	 */
	function wireframe_theme_tpl_tabs() {
		wireframe_theme_admin_check();
		?>
		<h2 class="nav-tab-wrapper wp-clearfix">
			<a href="<?php echo esc_url( 'admin.php?page=' . esc_html( WIREFRAME_THEME_TEXTDOMAIN ) ); ?>" class="nav-tab nav-tab-active"><?php esc_html_e( 'Welcome', 'wireframe-theme' ); ?></a>
		</h2>
		<?php
	}
endif;

if ( ! function_exists( 'wireframe_theme_view_theme_page' ) ) :
	/**
	 * Wireframe Theme Admin Page: Landing.
	 *
	 * @since 1.0.0 Wireframe_Theme
	 * @see   wireframe_theme_admin_check()
	 */
	function wireframe_theme_view_theme_page() {
		wireframe_theme_admin_check();
		?>
		<div class="wrap about-wrap">

			<h1><?php echo esc_html( WIREFRAME_THEME_PRODUCT ); ?> <?php echo esc_html( WIREFRAME_THEME_VERSION ); ?></h1>

			<div class="about-text">
				<?php esc_html_e( 'Wireframe Theme is an OOP parent theme for WordPress. Wireframe Theme enables WordPress Developers to rapidly wire GPL compliant themes for professional client projects or for selling premium themes in any marketplace. Wireframe Theme is part of the Wireframe Suite for WordPress by MixaTheme.', 'wireframe-theme' ); ?>
			</div>
			<div class="wp-badge">
				<?php esc_html_e( 'Version', 'wireframe-theme' ); ?> <?php echo esc_html( WIREFRAME_THEME_VERSION ); ?>
			</div>

			<?php wireframe_theme_tpl_tabs(); ?>

			<h3><?php esc_html_e( 'This is your "theme page" Welcome screen...', 'wireframe-theme' ); ?></h3>

			<p><?php esc_html_e( 'You should put any important theme details here, for example: About Us, Support, FAQ, Changelog, How-To Video, etc. You can also put any relevant Marketing for your products in this very specific designated area. The code for this "theme page" is found in: helpers-theme-admin.php', 'wireframe-theme' ); ?></p>

			<p><strong><?php esc_html_e( 'Do not add upsell Marketing to any other screen. Pushy marketing creates a poor User Experience for your customers.', 'wireframe-theme' ); ?></strong></p>

		</div>
	<?php
	}
endif;
