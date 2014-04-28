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
 * This base interface for all wrappers
 * @package CHStudio\Stream\Wrapper
 */
interface WrapperInterface
{
	/**
	 * Allow the wrapper to define the protocol on which it is attached
	 * @return string
	 */
	public function getProtocol();
}