<?php

namespace Codenom\Filesystem\Exception;

use Exception;

class FilesystemException extends Exception implements ExceptionInterface
{
    /**
     * Statistic error.
     * 
     * @throws Exception
     */
    public static function StatisticError()
    {
        return new self(
            \sprintf('Cannot gather stats! "%s"', parent::getMessage())
        );
    }

    /**
     * File is writable.
     * 
     * @param string $path
     * @throws Exception
     */
    public static function FileNotWritable(string $path)
    {
        return new self(
            \sprintf('File "%s" cannot be writable', $path)
        );
    }

    /**
     * Wrong CSV handle.
     * 
     * @throws Exception
     */
    public static function WrongCSVHandle()
    {
        return new self(
            \sprintf('Wrong CSV Handle. "%s"', parent::getMessage())
        );
    }

    /**
     * File tell.
     * 
     * @throws Exception
     */
    public static function FileTellError()
    {
        return new self(
            \sprintf('Error occurred during execution. "%s"', parent::getMessage())
        );
    }

    /**
     * File seek error.
     * 
     * @throws Exception
     */
    public static function FileSeekError()
    {
        return new self(
            \sprintf('Error occurred during execution of fileSeek. "%s"', parent::getMessage())
        );
    }

    /**
     * File close.
     * 
     * @throws Exception
     */
    public static function FileCloseError()
    {
        return new self(
            \sprintf('Error occurred during execution of fileClose "%s"', parent::getMessage())
        );
    }

    /**
     * File is readable.
     * 
     * @throws Exception
     */
    public static function FileNotReadable()
    {
        return new self(
            \sprintf('File cannot be readable. "%s"', parent::getMessage())
        );
    }

    /**
     * Folder not found.
     * 
     * @param string $path
     * @throws Exception
     */
    public static function FolderNotFound(string $path)
    {
        return new self(
            \sprintf('Folder does not exist at path: "%s"', $path)
        );
    }

    /**
     * File not found.
     * 
     * @param string $path
     * @throws Exception
     */
    public static function FileNotFoud(string $path)
    {
        return new self(sprintf('File does not exist at path: "%s"', $path));
    }

    /**
     * Unable to create lockable file.
     * 
     * @param string $path
     * @throws Exception
     */
    public static function UnableToCreate(string $path)
    {
        return new self(
            sprintf(
                'Unable to create lockable file: "%s". Please ensure you have permission to create files in this location.',
                $path
            )
        );
    }

    /**
     * Lock time out exception.
     * 
     * @param string $path
     * @throws Exception
     */
    public static function LockTimeout(string $path)
    {
        return new self(
            sprintf('Unable to acquire file lock at path [%s].', $path)
        );
    }

    /**
     * Directory type exception.
     * 
     * @param string $type
     * @throws Exception
     */
    public static function typeDirectory(string $type)
    {
        return new self(
            \sprintf('Unknown directory type: \'%1\'', $type)
        );
    }
}
