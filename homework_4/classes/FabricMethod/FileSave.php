<?php

namespace FabricMethod;

class FileSave implements ISave
{
    private string $filepath;

    public function __construct($filepath)
    {
        $this->filepath = $filepath;
    }

    public function save(string $message)
    {
        file_put_contents($this->filepath, $message);
    }
}
