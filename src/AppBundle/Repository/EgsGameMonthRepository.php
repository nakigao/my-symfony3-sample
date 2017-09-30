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
     * @param int $page
     * @param int $limit
     * @param array $sortAndOrders
     * @param array $filters
     *
     * @return array
     */
    public function getList($page = 1, $limit = 0, $sortAndOrders = array(), $filters = array())
    {
        $year = empty($filters['year']) ? null : $filters['year'];
        $month = empty($filters['month']) ? null : $filters['month'];
        $order = 'ASC';
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
        $dql = "SELECT o FROM {$this->_entityName} o WHERE o.year = :year ORDER BY o.month {$order}";
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
