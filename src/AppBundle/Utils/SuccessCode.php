<?php

namespace AppBundle\Utils;

/**
 * Class SuccessCode
 * @package AppBundle\Utils
 */
class SuccessCode
{
    /**
     * @return array
     */
    public static function get()
    {
        return array(
            'code' => 'success',
            'message' => 'success'
        );
    }
}