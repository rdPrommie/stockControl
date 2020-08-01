<?php

require_once __DIR__ . '/stockControl.config.php';

$index = new IndexBetolto();
$index->Execute();
unset($index);