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

use CHStudio\Stream\Wrapper\WrapperInterface;

/**
 * This base implementation for all wrappers
 * Just used to add Tools methods
 * @package CHStudio\Stream\Wrapper
 */
abstract class AbstractStreamWrapper implements WrapperInterface
{
	/**
	 * @link http://www.php.net/manual/en/class.streamwrapper.php#streamwrapper.props.context
	 * @var resource
	 */
	public $context;

	/**
	 * @inheritedDoc
	 */
	abstract public function getProtocol();

	/**
	 * @param string $path
	 * @return string
	 */
	protected function parsePath($path) {
		$matches = array();
		if( preg_match('/^'.$this->getProtocol().':\/\/(.*)$/', $path, $matches) === false ) {
			throw new \RuntimeException();
		}

		return $matches[1];
	}
}