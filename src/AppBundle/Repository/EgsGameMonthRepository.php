<?php

namespace AppBundle\Repository;

/**
 * EgsGameMonthRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EgsGameMonthRepository extends BaseRepository
{
    /**
     * @param string $year
     * @param string $month
     * @param int $page TODO:実装
     * @param string $sort TODO:実装
     * @param string $order
     * @param int $includeDeleted TODO:実装
     * @param string $keyword TODO:実装
     *
     * @return array
     */
    public function getList($year = '', $month = '', $page = 0, $sort = '', $order = 'asc', $includeDeleted = 0, $keyword = '')
    {
        if (empty($year)) {
            // 全件取得してる場合
            return $this->mergeWhichSelected(array(), null);
        }
        $needle = $month;
        if (empty($month)) {
            // 月が指定されていない場合は、年で取得してるということなので、needleはnullでOK
            $needle = null;
        }
        $em = $this->getEntityManager();
        $dql = "SELECT o FROM AppBundle:EgsGameMonth o WHERE o.year = :year ORDER BY o.month {$order}";
        $query = $em->createQuery($dql)->setParameter('year', $year);
        $records = $query->getArrayResult();
        if (empty($records)) {
            return array();
        }
        // 選択情報を付与
        $results = $this->mergeWhichSelected($records, $needle);
        return $results;
    }
}