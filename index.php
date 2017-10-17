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
    'Винчик',
    'Водочку',
    'Коньяк',
    'Кубу',
);

if($text) {
    if ($text == "/start") {
        $reply = "Привет, Я Люботинский бот";
    } elseif (strpos($text, 'бух') || strpos($text, 'выпит')) {
        $key = array_rand($drinks, 1)
        $reply = 'Советую выпить ' . $drinks[$key];
    }else {
        $reply = 'Я еще маленький и не знаю таких слов';
    }

}else{
    $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => "Отправьте текстовое сообщение." ]);
}

$telegram->sendMessage(['chat_id' => $chat_id, 'text' => $reply]);

