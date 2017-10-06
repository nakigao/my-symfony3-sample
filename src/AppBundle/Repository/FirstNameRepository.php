<?php

namespace AppBundle\Repository;

use AppBundle\Entity\FirstName;

/**
 * FirstNameRepository
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FirstNameRepository extends BaseRepository
{
    /**
     * @return int 追加されたレコードの数
     */
    public function refresh()
    {
        $em = $this->getEntityManager();
        // STEP1: クリアテーブル
        $em->getConnection()->exec("TRUNCATE TABLE first_name");
        // STEP2: データ取得して全件追加
        $characterBaseRepository = $em->getRepository('AppBundle:CharacterBase');
        $names = $characterBaseRepository->getFirstNames();
        if (empty($names)) {
            return 0;
        }
        foreach ($names as $record) {
            $entity = new FirstName();
            $entity->setName($record['name']);
            $entity->setNameKana($record['nameKana']);
            $entity->setGender($record['gender']);
            $entity->setDuplicateCount($record['duplicateCount']);
            $em->persist($entity);
        }
        $em->flush();
        $em->clear();
        return count($names);
    }

    /**
     * @param int $pk
     *
     * @return array
     */
    public function get($pk = 0)
    {
        if (empty($pk)) {
            return array();
        }
        $entity = $this->findOneBy(array(
            'id' => $pk
        ));
        if (empty($entity)) {
            return array();
        }
        $entity = $this->convertEntityToAssoc($entity, 'id');
        return $entity[$pk];
    }

}