<?php

namespace Hanson\MyVbot\Handlers\Contact;

use Hanson\Vbot\Contact\Friends;
use Hanson\Vbot\Contact\Groups;
use Hanson\Vbot\Foundation\Vbot;
use Hanson\Vbot\Message\Message;
use Hanson\Vbot\Message\Text;
use Hanson\Vbot\Message\Image;
use Hanson\Vbot\Message\Voice;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Demo
{
    public static function messageHandler(Collection $message, Friends $friends, Groups $groups) {
        //file_put_contents('message.json', $message);
        //file_put_contents('groups.json', $groups);
    }

    public static function customMessageHandler(Friends $friends, Groups $groups) {
        // 获取消息目的地址
        //$diaomao = $groups->getUsernameByNickname('拼多多互拆互摇群');
        $diaomao = $friends->getUsernameByNickname('闲步');
        // 主动发送文本消息
        // Text::send($diaomao, '互！');
        // 主动发送语音消息
        $result = Voice::send($diaomao, __DIR__.'/../voice/过客.mp3' );
        print_r($result);
        sleep(1);
    }


}
