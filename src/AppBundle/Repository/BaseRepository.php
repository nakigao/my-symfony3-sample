<?php

namespace AppBundle\Repository;

/**
 * BaseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BaseRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * レコード群を走査して、value == needle のものに selected = true を付与する
     *
     * @param array $records
     * @param string $needle
     *
     * @return array
     * @note SelectBox関係の時に利用してる
     */
    protected function mergeWhichSelected ($records = array(), $needle = '')
    {
        if (empty($records)) {
            return $records;
        }
        $results = array();
        // 最初に何も選択されていない場合の値を差し込む
        $results[] = array(
            'value' => null,
            'htmlText' => '-',
            'selected' => true
        );
        foreach ($records as $record) {
            if ($record['value'] == $needle) {
                $record['selected'] = true;
                $results[0]['selected'] = false;
            } else {
                $record['selected'] = false;
            }
            $results[] = $record;
        }
        return $results;
    }
}