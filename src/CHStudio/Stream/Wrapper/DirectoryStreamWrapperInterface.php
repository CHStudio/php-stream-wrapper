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
 * http://www.php.net/manual/en/class.streamwrapper.php
 * @package CHStudio\Stream\Wrapper
 */
interface DirectoryStreamWrapperInterface extends WrapperInterface
{
	/**
	 * Close directory handle
	 * @link http://www.php.net/manual/en/streamwrapper.dir-closedir.php
	 * @return boolean
 	 */
	public function dir_closedir();

	/**
	 * Open directory handle
	 * @link http://www.php.net/manual/en/streamwrapper.dir-opendir.php
	 * @param string $path
	 * @param int $options
	 * @return boolean
	 */
	public function dir_opendir($path, $options);

	/**
	 * Read entry from directory handle
	 * @link http://www.php.net/manual/en/streamwrapper.dir-readdir.php
	 * @return string
	 */
	public function dir_readdir();

	/**
	 * Rewind directory handle
	 * @link http://www.php.net/manual/en/streamwrapper.dir-rewinddir.php
	 * @return boolean
	 */
	public function dir_rewinddir();
}