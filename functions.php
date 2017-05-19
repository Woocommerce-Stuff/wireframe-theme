<?php
/**
 * Functions file for Wireframe Theme.
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
 * @see       https://codex.wordpress.org/Functions_File_Explained
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
 * Compatibility: Checker.
 * =============================================================================
 *
 * If WordPress version is incompatible, load backwards compatibility helpers;
 * else continue bootstrapping Wireframe.
 *
 * Note: Whenever WordPress releases a new update, we will always sync this
 * file on GitHub to reflect the latest WordPress version ;-)
 *
 * @since 1.0.0 Wireframe Theme
 */
if ( version_compare( $GLOBALS['wp_version'], '4.9.5', '<' ) ) {

	// Incompatible WP: Load backwards compatibility handlers.
	require_once get_template_directory() . '/wireframe_dev/wireframe/functions/functions-compat.php';

	// Incompatible WP: Get language translation file.
	do_action( 'wireframe_theme_hook_language_loader', '/wireframe_client/lang' );

	// Incompatible WP: Display update notice to Admins.
	do_action( 'wireframe_theme_hook_update_wordpress', 'Wireframe Theme', '4.9.5' );

} else {

	// Compatible WP: Continue bootstrapping Wireframe.
	require_once get_template_directory() . '/wireframe_dev/wireframe.php';

}

/** ADD YOUR CUSTOM FUNCTIONS BELOW THIS LINE... */
/** ------------------------------------------------------------------------- */
