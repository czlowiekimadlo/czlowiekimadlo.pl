<?php
require_once __DIR__ . '/erusev/parsedown.php';
require_once __DIR__ . '/imadlo/http/request.php';
require_once __DIR__ . '/imadlo/http/response.php';
require_once __DIR__ . '/imadlo/router.php';
require_once __DIR__ . '/imadlo/content.php';
require_once __DIR__ . '/imadlo/template.php';
require_once __DIR__ . '/imadlo/app.php';
require_once __DIR__ . '/imadlo/bag.php';

require_once __DIR__ . '/imadlo/action/abstractAction.php';
require_once __DIR__ . '/imadlo/action/homepage.php';
require_once __DIR__ . '/imadlo/action/article.php';

$bag = new Bag();
