<?php

namespace WebPage;

class BasicPage implements IPage
{
    public string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function render(): string
    {
        return 'Basic Page';
    }
}
