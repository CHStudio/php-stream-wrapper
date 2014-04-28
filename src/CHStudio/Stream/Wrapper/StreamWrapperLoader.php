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
 * Define the specific protocol loader
 * @package CHStudio\Stream\Wrapper
 */
class StreamWrapperLoader
{
	/**
	 * List of built in protocols wrappers
	 * @var array
	 */
	protected $builtIn;

	/**
	 * List of loaded protocols
	 * @var array
	 */
	protected $loaded;

	public function __construct() {
		$this->builtIn = stream_get_wrappers();
		$this->loaded = array();
	}

	/**
	 * Check if the requested protocol exists
	 * @param string $protocol
	 * @return boolean
	 */
	public function has($protocol) {
		if( in_array($protocol, $this->loaded) ) {
			return true;
		}
		if( in_array($protocol, $this->builtIn) ) {
			return true;
		}

		return false;
	}

	/**
	 * Check if the current protocol is a built in one
	 * @param string $protocol
	 * @return boolean
	 */
	public function isBuiltIn($protocol) {
		if( !$this->has($protocol) ) {
			throw new \InvalidArgumentException('Given protocol "'.$protocol.'" does not exists in the current context!');
		}
		if( in_array($protocol, $this->loaded) ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Register a new stream wrapper
	 * @param WrapperInterface $wrapper The wrapper to be added
	 * @param int $options Should be set to STREAM_IS_URL if protocol is a URL protocol. Default is 0, local stream.
	 * @return boolean True on success and False on failure
	 */
	public function register(WrapperInterface $wrapper, $options = 0) {
		return stream_wrapper_register($wrapper->getProtocol(), $wrapper, $options);
	}

	/**
	 * Unregister a new stream wrapper
	 * @param WrapperInterface $wrapper The wrapper to be added
	 * @return boolean True on success and False on failure
	 */
	public function unregister(WrapperInterface $wrapper) {
		$protocol = $wrapper->getProtocol();
		if( !$this->has($protocol) ) {
			return false;
		}

		stream_wrapper_unregister($protocol);
		if( $this->isBuiltIn($protocol) ) {
			$this->restore($protocol);
		}

		return true;
	}

	/**
	 * Restore a built in protocol after the specific one was unregistered
	 * @param string $protocol The protocol to be restored
	 * @return boolean True on success and False on failure
	 */
	protected function restore($protocol) {
		return stream_wrapper_restore($protocol);
	}
}