<?php

namespace Codenom\Filesystem;

/**
 * A Codenom application specific list of directories
 */
class DirectoryList extends Finder\DirectoryList
{
    /**
     * Code base root.
     * 
     * @var string
     */
    const ROOT = 'base';

    /**
     * Most of entrie application.
     * 
     * @var string
     */
    const APP = 'app';

    /**
     * Initial configuration of the application.
     * 
     * @var string
     * 
     */
    const CONFIG = 'etc';

    /**
     * Directory within document root of  a web-server
     * static view files publicy.
     * 
     * @var string
     */
    const PUB = 'public';

    /**
     * Directory within document writable of a web-server
     * cache files.
     * 
     * @var string
     */
    const WRITABLE = 'writable';

    /**
     * {@inheritdoc}
     */
    public static function getDefaultConfig()
    {
        $result = [
            SELF::ROOT => [parent::PATH => ''],
            SELF::APP => [parent::PATH => 'app'],
            SELF::CONFIG => [parent::PATH => 'app/etc'],
            SELF::PUB => [parent::PATH => 'public', parent::URL_PATH => 'public'],
            SELF::WRITABLE => [parent::PATH => 'writable'],
        ];

        return parent::getDefaultConfig() + $result;
    }

    /**
     * {@inheritdoc}
     */
    public function __construct($root, array $config = [])
    {
        parent::__construct($root, [self::ROOT => [self::PATH => $root]] + $config);
    }
}
