<?php

namespace AppBundle\Utils;

/**
 * Class ErrorCode
 * @package AppBundle\Utils
 */
class ErrorCode
{
    const NO_ENTRY = 'no_entry';
    const UNKNOWN = 'unknown';

    /**
     * @param array ...$codes error code
     *
     * @return array
     */
    public static function gets(...$codes)
    {
        if (empty($codes)) {
            $codes = array(self::UNKNOWN);
        }
        $errors = array();
        foreach ($codes as $code) {
            $errors[] = self::get($code);
        }
        return $error = array(
            'errors' => $errors
        );
    }

    /**
     * @param string $code error code
     *
     * @return array
     */
    public static function get($code = self::UNKNOWN)
    {
        $error = array(
            'code' => 'undefined',
            'message' => 'undefined'
        );
        switch ($code) {
            case self::NO_ENTRY:
                $error['code'] = self::NO_ENTRY;
                $error['message'] = 'no entry';
                break;
            default:
                $error['code'] = self::UNKNOWN;
                $error['message'] = 'something error occurred.';
        }
        return $error;
    }
}