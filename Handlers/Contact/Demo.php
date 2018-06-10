<?php

namespace Hanson\MyVbot\Handlers\Contact;

use Hanson\Vbot\Contact\Friends;
use Hanson\Vbot\Contact\Groups;
use Hanson\Vbot\Foundation\Vbot;
use Hanson\Vbot\Message\Message;
use Hanson\Vbot\Message\Text;
use Hanson\Vbot\Message\Image;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Demo
{
    public static function messageHandler(Collection $message, Friends $friends, Groups $groups) {
        //file_put_contents('message.json', $message);
        //file_put_contents('groups.json', $groups);
    }

    public static function customMessageHandler(Friends $friends, Groups $groups) {

        //$diaomao = $friends->getUsername('闲步', 'NickName', $blur = false);
        $diaomao = $groups->getUsernameByNickname('拼多多互拆互摇群');
        Text::send($diaomao, '互！');
        sleep(5);
    }

}
