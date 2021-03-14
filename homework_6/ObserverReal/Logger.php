<?php

namespace ObserverReal;

use SplSubject;

class Logger implements \SplObserver
{
    private string $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }

    public function update(SplSubject $subject, string $event = null, $data = null): void
    {
        $entry = date('Y-m-d H:i:s') . ": '$event' with data '" .json_encode($data). "'<br>";
        file_put_contents($this->filename, $entry, FILE_APPEND);

        echo "Логгер: Я записал '$event' в лог файл<br>";
    }
}
