<?php
/**
 * Functions file for themes built with Wireframe Suite for WordPress.
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
 * Load constants.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
require_once get_template_directory() . '/wireframe_dev/wireframe/config/config-constants.php';

/**
 * Backwards compatibility.
 *
 * If WordPress version is incompatible, load backwards compatibility helpers;
 * else continue bootstrapping Wireframe.
 *
 * Note: Whenever WordPress releases a new update, we will always sync this
 * file on GitHub to reflect the latest WordPress version ;-)
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
if ( version_compare( $GLOBALS['wp_version'], WIREFRAME_THEME_WP, '<' ) ) {

	// Incompatible WP: Load backwards compatibility handlers.
	require_once WIREFRAME_THEME_API . 'functions/functions-compat.php';

} else {

	// Compatible WP: Continue bootstrapping Wireframe.
	require_once WIREFRAME_THEME_DEV . 'wireframe.php';

}

/** ADD YOUR CUSTOM FUNCTIONS BELOW THIS LINE... */
/** ------------------------------------------------------------------------- */
