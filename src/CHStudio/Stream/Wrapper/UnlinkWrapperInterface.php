<?php
/**
 * This file is part of the CHStudio Stream Wrapper package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright CHStudio <http://chstudio.fr> 2014
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   CHStudio\Stream\Wrapper
 */

namespace CHStudio\Stream\Wrapper;

/**
 * This interface follow the streamWrapper prototype given by PHP Documentation
 * http://www.php.net/manual/en/streamwrapper.unlink.php
 * @package CHStudio\Stream\Wrapper
 */
interface UnlinkWrapperInterface extends WrapperInterface
{
	/**
	 * Delete a file
	 * @link http://www.php.net/manual/en/streamwrapper.unlink.php
	 * @param string $path
	 * @return boolean
	 */
	public function unlink( $path );
}