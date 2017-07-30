<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dazzle\Loop\Loop;
use Dazzle\Loop\Model\SelectLoop;
use Dazzle\Redis\Redis;

$loop = new Loop(new SelectLoop());
$endpoint = @$argv[1]?:'tcp://127.0.0.1:6379';
$redis = new Redis($endpoint, $loop);

$time1 = microtime(true);

$redis->on('start', function (Redis $redis) {
    for ($i=0 ;$i<10000; $i++) {
        $redis->set('t_key', 'benchmark:'.$i);
        $redis->get('t_key');
    }
    $redis->end();
});

$time2 = microtime(true);

$redis->on('stop', function () use ($loop) {
    $loop->stop();
});

$loop->onStart(function () use ($redis) {
    $redis->start();
});

$loop->start();

printf("%s\n", str_repeat('-', 64));
echo 'Time used: '.(round(($time2-$time1)*1e6)/1e3).'s'.PHP_EOL;
echo 'Mem used: '.round(memory_get_usage(true) / 1024 / 1024, 3).'MB'.PHP_EOL;
printf("%s\n", str_repeat('-', 64));
