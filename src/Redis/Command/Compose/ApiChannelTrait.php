<?php

namespace Dazzle\Redis\Command\Compose;

use Dazzle\Redis\Command\Builder;
use Dazzle\Redis\Command\Enum;
use Dazzle\Redis\Driver\Request;

trait ApiChannelTrait
{
    /**
     * @param Request $request
     * @return mixed
     */
    abstract function dispatch(Request $request);

    /**
     * @override
     * @inheritDoc
     */
    public function pSubscribe(...$patterns)
    {
        $command = Enum::PSUBSCRIBE;
        $args = $patterns?:[];

        return $this->dispatch(Builder::build($command, $args));
    }

    /**
     * @override
     * @inheritDoc
     */
    public function pubSub($subCommand, ...$args)
    {
        $command = Enum::PUBSUB;
        $args = array_merge([$subCommand], $args);

        return $this->dispatch(Builder::build($command, $args));
    }

    /**
     * @override
     * @inheritDoc
     */
    public function publish($channel, $message)
    {
        $command = Enum::PUBLISH;
        $args = [$channel, $message];

        return $this->dispatch(Builder::build($command, $args));
    }

    /**
     * @override
     * @inheritDoc
     */
    public function pUnSubscribe(...$patterns)
    {
        $command = Enum::PUNSUBSCRIBE;
        $args = $patterns?:[];

        return $this->dispatch(Builder::build($command, $args));
    }

    /**
     * @override
     * @inheritDoc
     */
    public function unSubscribe(...$channels)
    {
        $command = Enum::UNSUBSCRIBE;
        $args = $channels?:[];

        return $this->dispatch(Builder::build($command, $args));
    }

    /**
     * @override
     * @inheritDoc
     */
    public function subscribe($channel, ...$channels)
    {
        $command = Enum::SUBSCRIBE;
        array_unshift($channels, $channel);

        return $this->dispatch(Builder::build($command, $channels));
    }
}