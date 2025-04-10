<?php

namespace App\Enums;

enum ContactType: string {

    case Home = 'Home';
    case Work = 'Work';

    public static function toArray() : array {
        return [
            self::Home->value => self::Home->name,
            self::Work->value => self::Work->name
        ];
    }
}
