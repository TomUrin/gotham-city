<?php

namespace Bankas;

use Bankas\Safe;
use Bankas\Messages as M;

class Validations
{

    public static function nameValid(string $name)
    {
        if ((strlen($name) < 4)) {
            M::add('First and last name must be longer than 3 characters!', 'alert');
            return 0;
        } else {
            return 1;
        }
    }
    public static function idValid(string $ak)
    {
        if (strlen($ak) !== 11) {
            M::add('Invalid personal id format', 'alert');
            return  0;
        }
        foreach (Safe::get()->showAll() as $key => $val) {
            if ($val['personId'] == $ak) {
                M::add('User with this personal id already exist', 'alert');
                return  0;
            }
        }

        return 1;
    }
}
