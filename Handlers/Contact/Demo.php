<?php

namespace Hanson\MyVbot\Handlers\Contact;

use Hanson\Vbot\Contact\Friends;
use Hanson\Vbot\Contact\Groups;
use Hanson\Vbot\Message\Message;
use Hanson\Vbot\Message\Text;
use Hanson\Vbot\Message\Image;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Demo
{
    public static function messageHandler(Collection $message, Friends $friends, Groups $groups) {

        Storage::disk('local')->put('contract.txt', $friends);
    }

    public static function customMessageHandler(Collection $message, Friends $friends) {
        //Text::send();
    }
}
