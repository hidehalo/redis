<?php

namespace Dazzle\Redis\Command\Api;

interface ApiChannelInterface
{
    /**
     * @doc https://redis.io/commands/psubscribe
     * @since 2.0.0
     * @param ...$patterns
     * @return mixed
     */
    public function pSubscribe(...$patterns);

    /**
     * @doc https://redis.io/commands/pubsub
     * @since 2.8.0
     * @param $subCommand
     * @param ...$args
     * @return mixed
     */
    public function pubSub($subCommand, ...$args);

    /**
     * @doc https://redis.io/commands/publish
     * @since 2.0.0
     * @param $channel
     * @param $message
     * @return mixed
     */
    public function publish($channel, $message);

    /**
     * @doc https://redis.io/commands/punsubscribe
     * @since 2.0.0
     * @param ...$patterns
     * @return mixed
     */
    public function pUnSubscribe(...$patterns);

    /**
     * @doc https://redis.io/commands/unsubscribe
     * @since 2.0.0
     * @param ...$channels
     * @return mixed
     */
    public function unSubscribe(...$channels);

    /**
     * @doc https://redis.io/commands/subscribe
     * @since 2.0.0
     * @param $channel
     * @param ...$channels
     * @return mixed
     */
    public function subscribe($channel, ...$channels);
}
