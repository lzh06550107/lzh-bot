<?php

namespace Hanson\MyVbot\Handlers\Contact;

use Gdali\Tuling123SDK\Tuling123;
use Hanson\Vbot\Contact\Friends;
use Hanson\Vbot\Contact\Groups;
use Hanson\Vbot\Message\Card;
use Hanson\Vbot\Message\Emoticon;
use Hanson\Vbot\Message\File;
use Hanson\Vbot\Message\Image;
use Hanson\Vbot\Message\Text;
use Hanson\Vbot\Message\Video;
use Hanson\Vbot\Message\Voice;
use Illuminate\Support\Collection;

class DiaoMao
{
    public static function messageHandler(Collection $message, Friends $friends, Groups $groups)
    {
        if ($message['from']['NickName'] === '闲步') {

            $selfInfo = [
                'location' => [
                    'city' => '广州'
                ]
            ];
            $appID= '068b044b271a4e25bac87114cb8fd5e8';
            $appKey = '93fcc3fc21a718bf';
            $userID = '12345678';
            $tuling = new Tuling123($appID,$appKey,$userID,$selfInfo);

            if ($message['type'] === 'text' && $message['fromType'] !== 'Self') {

                    $result = $tuling->tuling($message['message']);
                    Text::send($message['from']['UserName'], $result);
            }

            if ($message['type'] === 'location') {
                Text::send($message['from']['UserName'], $message['content']);
                Text::send($message['from']['UserName'], $message['url']);
            }

            if ($message['type'] === 'new_friend') {
                Text::send($message['from']['UserName'], $message['content']);
            }

            if ($message['type'] === 'image') {
               // Image::download($message);
                Image::download($message, function ($resource) {
                    file_put_contents(__DIR__.'/test1.jpg', $resource);
                });
               // Image::send($message['from']['UserName'], $message);
               Image::send($message['from']['UserName'], __DIR__.'../images/weixin.jpg');
            }

            if ($message['type'] === 'voice') {
                //                Voice::download($message);
//                Voice::download($message, function ($resource) {
//                    file_put_contents(__DIR__.'/test1.mp3', $resource);
//                });
                Voice::send($message['from']['UserName'], $message);
//                Voice::send($message['from']['UserName'], __DIR__.'/test1.mp3');
            }

            if ($message['type'] === 'video') {
                //                Video::download($message);
//                Video::download($message, function($resource){
//                    file_put_contents(__DIR__.'/test1.mp4', $resource);
//                });
                Video::send($message['from']['UserName'], $message);
//                Video::send($message['from']['UserName'], __DIR__.'/test1.mp4');
            }

            if ($message['type'] === 'emoticon') {
                //                Emoticon::download($message);
//                Video::download($message, function($resource){
//                    file_put_contents(__DIR__.'/test1.mp4', $resource);
//                });
                Emoticon::send($message['from']['UserName'], $message);
                Emoticon::sendRandom($message['from']['UserName']);
            }

            if ($message['type'] === 'recall') {
                Text::send($message['from']['UserName'], $message['origin']['content']);
                Text::send($message['from']['UserName'], $message['content']);
            }

            if ($message['type'] === 'red_packet') {
                Text::send($message['from']['UserName'], $message['content']);
            }

            if ($message['type'] === 'transfer') {
                Text::send($message['from']['UserName'], $message['content'].' 转账金额： '.$message['fee'].
                    ' 转账流水号：'.$message['transaction_id'].' 备注：'.$message['memo']);
            }

            if ($message['type'] === 'file') {
                File::send($message['from']['UserName'], $message);
                Text::send($message['from']['UserName'], '收到文件：'.$message['title']);
            }

            if ($message['type'] === 'mina') {
                Text::send($message['from']['UserName'], '收到小程序：'.$message['title'].$message['url']);
            }

            if ($message['type'] === 'share') {
                Text::send($message['from']['UserName'], '收到分享:'.$message['title'].$message['description'].
                    $message['app'].$message['url']);
            }

            if ($message['type'] === 'card') {
                Text::send($message['from']['UserName'], '收到名片:'.$message['avatar'].$message['province'].
                    $message['city'].$message['description']);
            }
        }
    }
}
