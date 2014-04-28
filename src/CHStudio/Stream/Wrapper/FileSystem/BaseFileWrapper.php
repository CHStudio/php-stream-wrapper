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
	abstract public function getProtocol();

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
		$this->resource = fopen($this->parsePath($path), $mode, $options);
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