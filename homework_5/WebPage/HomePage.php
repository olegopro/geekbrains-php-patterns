<?php

namespace WebPage;

class HomePage extends PageDecorator
{
    public function getTitle(): string
    {
        return $this->page->getTitle() . '| Home Page';
    }

    public function render(): string
    {
        return $this->page->render() . '| Content Home Page';
    }
}
