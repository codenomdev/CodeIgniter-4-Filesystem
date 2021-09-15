<?php

namespace Codenom\Framework\Filesystem\File;

use Codenom\Framework\Filesystem\Exception\FilesystemException;
use Codenom\Framework\Filesystem\Filesystem;

class Read implements ReadInterface
{
    /**
     * Full path to file
     *
     * @var string
     */
    protected $path;

    /**
     * Mode to open the file
     *
     * @var string
     */
    protected $mode = 'r';

    /**
     * Opened file resource
     *
     * @var resource
     */
    protected $resource;

    /**
     * Filesystem.
     * 
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * Constructor Class.
     * 
     * @param string $path
     * @param Filesystem $filesystem
     */
    public function __construct($path, Filesystem $filesystem)
    {
        $this->path = $path;
        $this->filesystem = $filesystem;
        $this->open();
    }

    /**
     * Open file
     *
     * @return $this
     */
    protected function open()
    {
        $this->assertValid();
        $this->resource = $this->filesystem->fileOpen($this->path, $this->mode);
        return $this;
    }
    /**
     * Reads the specified number of bytes from the current position.
     *
     * @param int $length The number of bytes to read
     * @return string
     */
    public function read($length)
    {
        return $this->filesystem->fileRead($this->resource, $length);
    }

    /**
     * Return file content
     *
     * @param string|null $flag
     * @param resource|null $context
     * @return string
     */
    public function readAll($flag = null, $context = null)
    {
        return $this->filesystem->get($this->path, $flag, $context);
    }

    /**
     * Reads the line with specified number of bytes from the current position.
     *
     * @param int $length The number of bytes to read
     * @param string $ending [optional]
     * @return string
     */
    public function readLine($length, $ending = null)
    {
        return $this->filesystem->fileReadLine($this->resource, $length, $ending);
    }

    /**
     * Reads one CSV row from the file
     *
     * @param int $length [optional]
     * @param string $delimiter [optional]
     * @param string $enclosure [optional]
     * @param string $escape [optional]
     * @return array|bool|null
     */
    public function readCsv($length = 0, $delimiter = ',', $enclosure = '"', $escape = '\\')
    {
        return $this->filesystem->fileGetCsv($this->resource, $length, $delimiter, $enclosure, $escape);
    }

    /**
     * Returns the current cursor position
     *
     * @return int
     */
    public function tell()
    {
        return $this->filesystem->fileTell($this->resource);
    }

    /**
     * Seeks to the specified offset
     *
     * @param int $offset
     * @param int $whence
     * @return int
     */
    public function seek($offset, $whence = SEEK_SET)
    {
        return $this->filesystem->fileSeek($this->resource, $offset, $whence);
    }

    /**
     * Checks if the current position is the end-of-file
     *
     * @return bool
     */
    public function eof()
    {
        return $this->filesystem->endOfFile($this->resource);
    }

    /**
     * Closes the file.
     *
     * @return bool
     */
    public function close()
    {
        return $this->filesystem->fileClose($this->resource);
    }

    /**
     * {@inheritDoc}
     *
     * @return array
     */
    public function stat()
    {
        return $this->filesystem->stat($this->path);
    }

    /**
     * Assert file existence.
     * 
     * @return bool
     * @throws \Codenom\Framework\Filesystem\FilesystemException
     */
    protected function assertValid()
    {
        if ($this->filesystem->exists($this->path)) {
            throw FilesystemException::FolderNotFound($this->path);
        }
        return true;
    }

    public function getRelativePath($path)
    {
        return $this->filesystem->getRelativePath($path);
    }

    public function exists($path)
    {
        return $this->filesystem->exists($path);
    }
}
