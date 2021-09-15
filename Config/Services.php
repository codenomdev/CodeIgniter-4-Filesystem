<?php

namespace Codenom\Filesystem\Config;

use CodeIgniter\Config\BaseServices;
use Codenom\Filesystem\Filesystem;
use Codenom\Filesystem\LockableFile;

/**
 * The filesystem service class.
 */
class Services extends BaseServices
{
    /**
     * Filesystem service.
     * 
     * @param bool $getShared
     * @return \Codenom\Filesystem\Filesystem
     */
    public static function Filesystem(bool $getShared = true)
    {
        if ($getShared) {
            return self::getSharedInstance('Filesystem');
        }

        return new Filesystem();
    }

    /**
     * Lockable file.
     * 
     * @param string $path
     * @param string $mode
     * @param bool $getShared
     * @return \Codenom\Filesystem\LockableFile
     */
    public static function LockableFile(string $path, string $mode, bool $getShared = true)
    {
        if ($getShared) {
            return self::getSharedInstance('Filesystem');
        }

        return new LockableFile($path, $mode);
    }
}
