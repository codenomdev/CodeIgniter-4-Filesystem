<?php

namespace Codenom\Framework\Filesystem\File;

use Codenom\Framework\Filesystem\Filesystem;

class ReadFactory
{
    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * Constructor Class.
     * 
     * @var Filesystem
     */
    public function __construct()
    {
        $this->filesystem = new Filesystem();
    }

    /**
     * Create a readable file
     *
     * @param string $path
     */
    public function create($path)
    {
        return new Read($path, $this->filesystem);
    }
}
