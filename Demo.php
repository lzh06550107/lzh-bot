<?php

namespace Hanson\MyVbot;

use Hanson\Vbot\Foundation\Vbot as Bot;
use Vbot\Blacklist\Blacklist;
use Vbot\GuessNumber\GuessNumber;
use Vbot\HotGirl\HotGirl;

class Demo
{
    private $config;

    public function __construct($session = null)
    {
        $this->config = require_once __DIR__.'/config.php'; // 加载配置文件

        if ($session) {
            $this->config['session'] = $session;
        }
    }

    public function run()
    {
        $robot = new Bot($this->config); // 初始化容器

        // 传入消息处理器
        $robot->messageHandler->setHandler([DemoMessageHandler::class, 'messageHandler']);
        $robot->messageHandler->setCustomHandler([DemoMessageHandler::class, 'customMessageHandler']);

        $robot->observer->setQrCodeObserver([Observer::class, 'setQrCodeObserver']);

        $robot->observer->setLoginSuccessObserver([Observer::class, 'setLoginSuccessObserver']);

        $robot->observer->setReLoginSuccessObserver([Observer::class, 'setReLoginSuccessObserver']);

        $robot->observer->setExitObserver([Observer::class, 'setExitObserver']);

        $robot->observer->setFetchContactObserver([Observer::class, 'setFetchContactObserver']);

        $robot->observer->setBeforeMessageObserver([Observer::class, 'setBeforeMessageObserver']);

        $robot->observer->setNeedActivateObserver([Observer::class, 'setNeedActivateObserver']);

        $robot->server->serve();
    }
}
