<?php

namespace Dazzle\Redis\Test\TModule\Command;

use Dazzle\Promise\Promise;
use Dazzle\Redis\RedisInterface;
use Dazzle\Redis\Test\TModule;
use Dazzle\Redis\Test\TModule\_Support\RedisTrait;

class RedisChannelApiTest extends TModule
{
    use RedisTrait;

    /**
     * @group incomplete
     * @dataProvider redisProvider
     * @param RedisInterface $redis
     */
    public function testRedis_pSubscribe(RedisInterface $redis)
    {
        //TODO: Implementation
        $this->markTestSkipped();
        $this->checkRedisVersionedCommand($redis, '2.0.0', function(RedisInterface $redis) {
            $params = [];

            return Promise::doResolve()->then(function () use ($redis, $params) {
            });
        });
    }

    /**
     * @group incomplete
     * @dataProvider redisProvider
     * @param RedisInterface $redis
     */
    public function testRedis_pubSub(RedisInterface $redis)
    {
        //TODO: Implementation
        $this->markTestSkipped();
        $this->checkRedisVersionedCommand($redis, '2.8.0', function(RedisInterface $redis) {
            $params = [];

            return Promise::doResolve()->then(function () use ($redis, $params) {
            });
        });
    }

    /**
     * @group incomplete
     * @dataProvider redisProvider
     * @param RedisInterface $redis
     */
    public function testRedis_publish(RedisInterface $redis)
    {
        $this->markTestSkipped();
        $this->checkRedisVersionedCommand($redis, '2.0.0', function(RedisInterface $redis) {
            $params = [
                'CH' => 'TEST_CHAN',
                'MSG' => 'TEST_HELLO',
            ];

//            return Promise::doResolve()->then(function () use ($redis, $params) {
//                $subRedis = $this->createRedis($redis->getLoop());
//                $redis->getLoop()->onStop(function () use ($subRedis) {
//                    $subRedis->stop();
//                });
//                $redis->getLoop()->onStart(function () use ($subRedis) {
//                   $subRedis->start();
//                });
//                $subRedis->on('start',function () use ($subRedis, $params) {
//                    $subRedis->subscribe($params['CH'])->then(function ($value) {
//                        echo $value.PHP_EOL;die;
//                    });
//                });
//
//                return $subRedis->start();
//            })->then(function () use ($redis, $params){
//
//                return $redis->publish($params['CH'], $params['MSG']);
//            })
//            ->then(function ($value) {
//                $this->assertSame(1, $value);
//            });
        });
    }

    /**
     * @group incomplete
     * @dataProvider redisProvider
     * @param RedisInterface $redis
     */
    public function testRedis_pUnSubscribe(RedisInterface $redis)
    {
        $this->markTestSkipped();
        $this->checkRedisVersionedCommand($redis, '2.0.0', function(RedisInterface $redis) {
            $params = [
                'CH' => 'TEST_CHAN',
                'MSG' => 'TEST_HELLO',
            ];

            return Promise::doResolve()->then(function () use ($redis, $params) {
                return $redis->subscribe($params['CH']);
            })
            ->then(function () {

            });
        });
    }

    /**
     * @group incomplete
     * @dataProvider redisProvider
     * @param RedisInterface $redis
     */
    public function testRedis_unSubscribe(RedisInterface $redis)
    {
        //TODO: Implementation
        $this->markTestSkipped();
        $this->checkRedisVersionedCommand($redis, '2.0.0', function(RedisInterface $redis) {
            $params = [];

            return Promise::doResolve()->then(function () use ($redis, $params) {
            });
        });
    }

    /**
     * @group incomplete
     * @dataProvider redisProvider
     * @param RedisInterface $redis
     */
    public function testRedis_subscribe(RedisInterface $redis)
    {
        //TODO: Implementation
        $this->markTestSkipped();
        $this->checkRedisVersionedCommand($redis, '2.0.0', function(RedisInterface $redis) {
            $params = [];

            return Promise::doResolve()->then(function () use ($redis, $params) {
            });
        });
    }
}