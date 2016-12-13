<?php
/**
 * Functions file for Wireframe themes.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe_Theme
 * @author    MixaTheme() Tada Burke
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
 */

/**
 * Wireframe API.
 *
 * Checks WordPress version, then initializes wireframe.php. In this example,
 * Wireframe Theme only works with WordPress 4.7 or later. If the version is
 * incompatible, load any backwards compatibility helpers; else continue setup.
 *
 * @since 1.0.0 Wireframe_Theme
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/wireframe_dev/wireframe/functions/functions-compat.php';
	return;
} else {
	require_once 'wireframe_dev/wireframe.php';
}

/** Your custom functions below this line... */
/** ------------------------------------------------------------------------- */
