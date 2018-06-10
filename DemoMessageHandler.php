<?php

namespace Hanson\MyVbot;

use Hanson\MyVbot\Handlers\Contact\ColleagueGroup;
use Hanson\MyVbot\Handlers\Contact\ExperienceGroup;
use Hanson\MyVbot\Handlers\Contact\FeedbackGroup;
use Hanson\MyVbot\Handlers\Contact\Hanson;
use Hanson\MyVbot\Handlers\Contact\DiaoMao;
use Hanson\MyVbot\Handlers\Contact\Demo;
use Hanson\MyVbot\Handlers\Type\RecallType;
use Hanson\MyVbot\Handlers\Type\TextType;
use Hanson\Vbot\Contact\Friends;
use Hanson\Vbot\Contact\Groups;
use Hanson\Vbot\Contact\Members;

use Hanson\Vbot\Message\Emoticon;
use Hanson\Vbot\Message\Text;
use Illuminate\Support\Collection;

class DemoMessageHandler
{
    public static function messageHandler(Collection $message) // 这里只有消息参数
    {
        /** @var Friends $friends */
        $friends = vbot('friends'); // 好友实例

        /** @var Members $members */
        $members = vbot('members'); // 所有群所有成员实例

        /** @var Groups $groups */
        $groups = vbot('groups'); // 群实例

        Demo::messageHandler($message, $friends, $groups);

    }

    public static function customMessageHandler() { // 这里没有参数
        $friends = vbot('friends'); // 好友实例
        $groups = vbot('groups'); // 群实例
        Demo::customMessageHandler($friends, $groups);
    }
}
