<?php

namespace Config\Constants;

class Messages
{
    static function getMessage($code, $options = [], $length = [])
    {
        return isset(self::messages($options, $length)[$code]) ? self::messages($options, $length)[$code] : '';
    }

    static function messages($options)
    {
        $params = $options[0] ?? 'Field';
        return [
            'ECL001' => "{$params} It is a required field.",
            'ECL002' => "Please enter your e-mail address correctly.",
            'ECL003' => "Email or password incorrect"
        ];
    }
}
