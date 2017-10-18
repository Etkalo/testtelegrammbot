<?php

namespace Bot;

use Telegram\Bot\Api;

class Bot
{
    public $telegram;
    public $result;
    public $text;
    public $chat_id;
    public $name;
    public $firstName;

    public function init()
    {
        $this->telegram = new Api('461680920:AAFb2wrg9kHoFiDUjhwbIHHSeWjAHO5HtTY');

        $this->result = $this->telegram->getWebhookUpdates(); //Передаем в переменную $result полную информацию о сообщении пользователя

        $this->text = $this->result["message"]["text"]; //Текст сообщения
        $this->chat_id = $this->result["message"]["chat"]["id"]; //Уникальный идентификатор пользователя
        $this->name = $this->result["message"]["from"]["username"];
        $this->name = $this->result["message"]["from"]["first_name"];
    }
}