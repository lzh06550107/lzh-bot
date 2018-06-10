<?php

namespace Hanson\MyVbot\Handlers\Contact;

use Hanson\Vbot\Contact\Friends;
use Hanson\Vbot\Contact\Groups;
use Hanson\Vbot\Message\Message;
use Hanson\Vbot\Message\Text;
use Hanson\Vbot\Message\Image;
use Illuminate\Support\Collection;

class PinDuoDuoGroup
{
    static $number = 0;
    public static function messageHandler(Collection $message, Friends $friends, Groups $groups)
    {

        if ($message['from']['NickName'] === '4' || $message['from']['NickName'] === '互砍233' ) {
            if(self::$number < 5) {
                self::$number++;
                return;
            }
            if ($message['fromType'] !== Message::FROM_TYPE_SELF ) {
                //print_r($message['sender']);
                $name = '@'. $message['sender']['NickName'];
                $answer = '   帮我签个到，签到地址如下：';
                $url = 'http://mobile.yangkeduo.com/mkt_daily055522.html?suid=4060531002';
                Text::send($message['from']['UserName'], $name.$answer.$url);
                //Image::send($message['from']['UserName'], __DIR__.'../images/weixin.jpg');
                self::$number = 0;
            }
        }
    }
}
