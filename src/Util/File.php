<?php

declare(strict_types=1);

namespace GrumPHP\Util;

use Gitonomy\Git\Diff\File as DiffFile;
use Symfony\Component\Finder\SplFileInfo;

class File extends SplFileInfo
{
    /**
     * @var DiffFile
     */
    protected $diffFile;

    public function getDiffFile(): DiffFile
    {
        return $this->diffFile;
    }

    public function setDiffFile(DiffFile $diffFile): void
    {
        $this->diffFile = $diffFile;
    }
}
