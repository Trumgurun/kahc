<?php

//Flash
$di->set('kahc', function() use ($di) {
    $flash = new \Anax\Kahc\CKahc();
    $flash->setDI($di);
    return $flash;
});

//flash
$app->router->add('kahc', function() use ($app) {
	$app->theme->setTitle("Flash");
	$app->kahc->Message("warning");
    $app->kahc->Message("success");
	$app->kahc->Message("debug");
    $app->kahc->Message("error");

    $bambo = $app->kahc->getMessages();
    $app->views->add('me/viewFlash', ['bambo' => $bambo]);
});
?>