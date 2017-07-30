<?php

require_once __DIR__ . '/vendor/autoload.php';

use Clue\React\Redis\Client;
use Clue\React\Redis\Factory;

$loop = React\EventLoop\Factory::create();
$endpoint = @$argv[1]?:'tcp://127.0.0.1:6379';
$factory = new Factory($loop);


$time1 = microtime(true);

$factory->createClient($endpoint)->then(function (Client $client) use ($loop) {
    for ($i=0 ;$i<10000; $i++) {
        $client->set('t_key', 'benchmark:'.$i);
        $client->get('t_key');
    }
    $client->end();
});

$time2 = microtime(true);

$loop->run();

printf("%s\n", str_repeat('-', 64));
echo 'Time used: '.(round(($time2-$time1)*1e6)/1e3).'s'.PHP_EOL;
echo 'Mem used: '.round(memory_get_usage(true) / 1024 / 1024, 3).'MB'.PHP_EOL;
printf("%s\n", str_repeat('-', 64));