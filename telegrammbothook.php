<?php

ini_set('display_errors', 1);
error_reporting(E_ERROR);

include('vendor/autoload.php');

$bot = new \Bot\Bot();
$bot->init();

$telegram = $bot->telegram;
$text = $bot->text;
$chat_id = $bot->chat_id;
$name = $bot->name;

if ($text) {
    if ($text == "/start") {
        $reply = "Привет, спроси у меня что тебе выпить";

    } elseif (strpos($text, 'бух') || strpos($text, 'пить')) {
        $drinks = new \Bot\Drinks();
        $reply = $drinks->getReply();
    } else {
        $reply = 'Спроси у меня что выпить, я другого не умею';
    }
    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply]);
} else {
    $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение." ]);
}



