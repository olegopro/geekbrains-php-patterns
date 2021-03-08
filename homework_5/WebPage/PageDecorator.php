<?php

namespace WebPage;

abstract class PageDecorator implements IPage
{
    protected IPage $page;

    public function __construct(IPage $page)
    {
        $this->page = $page;
    }
}
