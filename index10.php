<?php
require_once('./lib/BladeOne/BladeOne.php');
require_once('./db.php');
require_once('./Room.php');

use eftec\bladeone\BladeOne;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);

Room::setConnection($conn);

$result = Room::getAllRooms();

echo $blade->run('rooms', ['rooms' => $result]);

$conn->close();
