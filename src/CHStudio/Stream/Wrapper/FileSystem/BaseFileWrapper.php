<?php
/**
 * This file is part of the CHStudio Stream Wrapper package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright CHStudio <http://chstudio.fr> 2014
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   CHStudio\Stream\Wrapper\FileSystem
 */

namespace CHStudio\Stream\Wrapper\FileSystem;

use CHStudio\Stream\Wrapper\SimpleStreamWrapperInterface;
use CHStudio\Stream\Wrapper\AbstractStreamWrapper;

/**
 * This base interface for all wrappers
 * @package CHStudio\Stream\Wrapper\FileSystem
 */
abstract class BaseFileWrapper extends AbstractStreamWrapper implements SimpleStreamWrapperInterface
{
	/**
	 * The loaded file pointer
	 * @var resource
	 */
	protected $resource;

	/**
	 * @inheritedDoc
	 */
	public function stream_close() {
		fclose($this->resource);
	}

	/**
	 * @inheritedDoc
	 */
	public function stream_eof() {
		return feof($this->resource);
	}

	/**
	 * @inheritedDoc
	 */
	public function stream_open( $path, $mode, $options, &$opened_path ) {
		$path = realpath($this->parsePath($path));
		$this->resource = fopen($path, $mode);

		if( $this->resource === false ) {
			if( $options & STREAM_REPORT_ERRORS ) {
				trigger_error("Resource can't be loaded!");
			}

			return false;
		}

		if( $options & STREAM_USE_PATH ) {
			$opened_path = $path;
		}

		return $this->resource;
	}

	/**
	 * @inheritedDoc
	 */
	abstract public function stream_read( $count );

	/**
	 * @inheritedDoc
	 */
	abstract public function stream_seek( $offset, $whence = SEEK_SET );

	/**
	 * @inheritedDoc
	 */
	abstract public function stream_tell();

	/**
	 * @inheritedDoc
	 */
	abstract public function stream_write ( $data );
}