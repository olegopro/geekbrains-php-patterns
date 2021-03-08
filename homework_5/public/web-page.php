<?php

use WebPage\BasicPage;
use WebPage\HomePage;

$basicPage = new BasicPage('Title');
echo $basicPage->getTitle();
echo $basicPage->render();

echo '<br><br>';

$homePage = new HomePage($basicPage);
echo $homePage->getTitle();
echo $homePage->render();

