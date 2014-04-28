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
	 * @return boolean
 	 */
	public function dir_closedir();

	/**
	 * @param string $path
	 * @param int $options
	 * @return boolean
	 */
	public function dir_opendir($path, $options);

	/**
	 * @return string
	 */
	public function dir_readdir();

	/**
	 * @return boolean
	 */
	public function dir_rewinddir();
}