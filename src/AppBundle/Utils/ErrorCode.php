<?php

namespace AppBundle\Utils;

/**
 * Class ErrorCode
 * @package AppBundle\Utils
 */
class ErrorCode
{
    const UNDER_CONSTRUCTION = 'under_construction';
    const NO_ENTRY = 'no_entry';
    const UNKNOWN = 'unknown';
    const INVALID_ACCESS = 'invalid access';
    const DIRTY_REQUEST = 'dirty request';
    const CANNOT_CREATE_ENTRY = 'can not create entry';

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
            case self::INVALID_ACCESS:
                $error['code'] = self::INVALID_ACCESS;
                $error['message'] = 'invalid access';
                break;
            case self::DIRTY_REQUEST:
                $error['code'] = self::DIRTY_REQUEST;
                $error['message'] = 'dirty request';
                break;
            case self::CANNOT_CREATE_ENTRY:
                $error['code'] = self::CANNOT_CREATE_ENTRY;
                $error['message'] = 'can not create entry';
                break;
            case self::UNDER_CONSTRUCTION:
                $error['code'] = self::UNDER_CONSTRUCTION;
                $error['message'] = 'under construction';
                break;
            default:
                $error['code'] = self::UNKNOWN;
                $error['message'] = 'something error occurred.';
        }
        return $error;
    }
}