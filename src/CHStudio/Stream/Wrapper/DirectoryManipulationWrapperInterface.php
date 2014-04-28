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
 * This interface define stream wrapper methods used for directory creation/move/remove.
 * @link http://www.php.net/manual/en/class.streamwrapper.php StreamWrapper protocol definition
 * @package CHStudio\Stream\Wrapper
 */
interface DirectoryManipulationWrapperInterface extends WrapperInterface
{
	/**
	 * Create a directory
	 * @link http://www.php.net/manual/en/streamwrapper.mkdir.php PHP official documentation
	 * @param string $path
	 * @param int $mode
	 * @param int $options
	 * @return boolean
	 */
	public function mkdir( $path, $mode, $options );

	/**
	 * Rename a directory
	 * @link http://www.php.net/manual/en/streamwrapper.rename.php PHP official documentation
	 * @param string $path_from
	 * @param string $path_to
	 * @return boolean
	 */
	public function rename( $path_from, $path_to );

	/**
	 * Remove a directory
	 * @link http://www.php.net/manual/en/streamwrapper.rmdir.php PHP official documentation
	 * @param string $path
	 * @param int $options
	 */
	public function rmdir( $path, $options );
}