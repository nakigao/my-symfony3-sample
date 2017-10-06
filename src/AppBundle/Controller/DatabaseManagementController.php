<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use AppBundle\Utils\ErrorCode;
use AppBundle\Utils\SuccessCode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DatabaseManagementController extends Controller
{
    /**
     * データ管理用のページ
     * @Route("/admin/databasemanagement/", name="admin_database_management")
     *
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('databasemanagement/index.html.twig', []);
    }

    /**
     * EgsGameからのマスターデータを新規挿入または更新する(最新の更新を反映する)
     * @Route("/admin/databasemanagement/upsert_from_egs_game/", name="admin_database_management_upsert_from_egs_game")
     * @Method("GET")
     */
    public function upsertFromEgsGameAction()
    {
        $em = $this->getDoctrine()->getManager();
        $gameRepository = $em->getRepository('AppBundle:Game');
        $egsGameRepository = $em->getRepository('AppBundle:EgsGame');
        $egsGameTotalCount = $egsGameRepository->getTotalCount();
        $batchLimit = 200;
        for ($i = 0; $i < $egsGameTotalCount; $i += $batchLimit) {
            // 200件ずつ
            $egsGames = $egsGameRepository->findBy(array(), null, $batchLimit, $i);
            $egsGames = json_decode($this->container->get('serializer')->serialize($egsGames, 'json'), true);
            $gameRepository->upsertFromEgsGame($egsGames);
        }
        return new JsonResponse(SuccessCode::get(), 200);
    }

    /**
     * 検索マスターテーブルの生成
     * @Route("/admin/databasemanagement/generate_search_master/", name="admin_database_management_generate_search_master")
     * @Method("GET")
     */
    public function generateSearchMasterAction()
    {
        $em = $this->getDoctrine()->getManager();
        // ファーストネーム
        $em->getRepository('AppBundle:FirstName')->refresh();
        // ミドルネーム
        $em->getRepository('AppBundle:MiddleName')->refresh();
        // ラストネーム
        $em->getRepository('AppBundle:FamilyName')->refresh();
        return new JsonResponse(SuccessCode::get(), 200);
    }

    /**
     * 検索マスターテーブルの生成
     * @Route("/admin/databasemanagement/generate_statistic_master/", name="admin_database_management_generate_statistic_master")
     * @Method("GET")
     */
    public function generateStatisticMasterAction()
    {
        return new JsonResponse(ErrorCode::get(ErrorCode::UNDER_CONSTRUCTION), 500);
    }
}
