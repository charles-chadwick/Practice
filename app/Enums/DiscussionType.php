<?php

namespace App\Enums;

enum DiscussionType: string {

    case PrivateMessage = 'Private Message';

    public static function toArray() : array {
        return [
            self::PrivateMessage->value => self::PrivateMessage->name,
        ];
    }
}
