<?php
/**
 * Default helper functions for Wireframe Theme.
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
 * Wireframe Theme Admin Check.
 *
 * Check if the current user has Admin permmissions.
 *
 * @since 1.0.0 Wireframe
 * @since 1.0.0 Wireframe Theme
 */
function wireframe_theme_admin_check() {
	if ( ! is_admin() ) {
		wp_die( 'You are not authorized to access this page.' );
	}
}

/** ADD YOUR CUSTOM FUNCTIONS BELOW THIS LINE... */
/** ------------------------------------------------------------------------- */
