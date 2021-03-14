<?php

namespace WebPage;

interface IPage
{
    public function getTitle();

    public function render();
}
