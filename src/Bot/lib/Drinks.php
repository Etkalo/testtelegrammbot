<?php

namespace Bot;

class Drinks
{
    public function getDrinks()
    {
        return array(
            'Выпей Винчик',
            'Советую выпить Водочку',
            'Советую выпить Коньяк',
            'Выпей Кубу',
            'Советую выпить Текилу',
            'Выпей Светофор',
            'Советую выпить Бехеровку',
            'Советую выпить Бурбон',
            'Советую выпить Граппу',
            'Выпей 4й шот в меню',
            'Советую выпить любой лонг',
            'я думаю с тебя хватит',
            'Выпей Пивка',
        );
    }

    public function getReply()
    {
        $drinks = $this->getDrinks();
        $key = array_rand($drinks, 1);
        return $drinks[$key];
    }
}