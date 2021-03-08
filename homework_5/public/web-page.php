<?php

use WebPage\BasicPage;
use WebPage\HomePage;

require_once '../vendor/autoload.php';

$basicPage = new BasicPage('Title');
echo $basicPage->getTitle();
echo $basicPage->render();

echo '<br><br>';

$homePage = new HomePage($basicPage);
echo $homePage->getTitle();
echo $homePage->render();

