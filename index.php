<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

include('vendor/autoload.php');

use Telegram\Bot\Api;

$telegram = new Api('329348159:AAHVckKsabjURvYS4ctcS3wVNlOnb6BnyVY');

$result = $telegram->getWebhookUpdates(); //Передаем в переменную $result полную информацию о сообщении пользователя

$text = $result["message"]["text"]; //Текст сообщения
$chat_id = $result["message"]["chat"]["id"]; //Уникальный идентификатор пользователя
$name = $result["message"]["from"]["username"]; //Юзернейм пользователя

$drinks = array(
    'Советую выпить Винчик',
    'Советую выпить Водочку',
    'Советую выпить Коньяк',
    'Советую выпить Кубу',
    'Советую выпить Текилу',
    'Советую выпить Светофор',
    'Советую выпить Бехеровку',
    'Советую выпить Бурбон',
    'Советую выпить Граппу',
    'Советую выпить 4й шот в меню',
    'Советую выпить любой лонг',
    'я думаю с тебя хватит',
);

if($text) {
    if ($text == "/start") {
        $reply = "Привет, спроси у меня что тебе выпить";

    } elseif (strpos($text, 'бух') || strpos($text, 'пить')) {
        $key = array_rand($drinks, 1);
        $reply = $drinks[$key];
    }else {
        $reply = 'Спроси у меня что выпить, я другого не умею';
    }

}else{
    $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение." ]);
}

$telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply]);

