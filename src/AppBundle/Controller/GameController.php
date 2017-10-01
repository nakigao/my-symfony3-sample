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

/**
 * Game controller.
 * @Route("admin/game")
 */
class GameController extends Controller
{
    /**
     * @Route("/", name="admin_game_index")
     * @Method("GET")
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $page = $request->get('page', 1);
        $limit = $request->get('limit', null);
        $sortAndOrders = array(
            'xxxxxAsc' => $request->get('xxxxx_asc', false),
            'xxxxxDesc' => $request->get('xxxxx_desc', false)
        );
        $filters = array(
            'year' => $request->get('year', date('Y')),
            'month' => $request->get('month', date('m')),
            'isNormal' => $request->get('is_normal', null),
            'isDeleted' => $request->get('is_deleted', null),
            'keyword' => $request->get('keyword', null),
        );
        $em = $this->getDoctrine()->getManager();
        $games = $em->getRepository('AppBundle:Game')->getList($page, $limit, $sortAndOrders, $filters);
        $egsGameYears = $em->getRepository('AppBundle:EgsGameYear')->getList($page, $limit, $sortAndOrders, $filters);
        $egsGameMonths = $em->getRepository('AppBundle:EgsGameMonth')->getList($page, $limit, $sortAndOrders, $filters);
        $isNormalLogicalTypes = $em->getRepository('AppBundle:LogicalType')->getList($filters['isNormal']);
        $isDeletedLogicalTypes = $em->getRepository('AppBundle:LogicalType')->getList($filters['isDeleted']);
        return $this->render('game/index.html.twig', array(
            'games' => $games,
            'egsGameYears' => $egsGameYears,
            'egsGameMonths' => $egsGameMonths,
            'isNormalLogicalTypes' => $isNormalLogicalTypes,
            'isDeletedLogicalTypes' => $isDeletedLogicalTypes,
        ));
    }

    /**
     * Finds and displays a Game entity.
     * @Route("/{id}", name="admin_game_show")
     * @Method("GET")
     *
     * @param int $id
     *
     * @return Response
     */
    public function showAction($id = 0)
    {
        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository('AppBundle:Game')->get($id);
        if (empty($game)) {
            return new Response($this->renderView('error.html.twig', ErrorCode::gets(ErrorCode::NO_ENTRY)), 500);
        }
        $characterBases = $em->getRepository('AppBundle:CharacterBase')->findBy(array('gameId' => $id), array('introductionPriority' => 'ASC'));
        $characterBases = $em->getRepository('AppBundle:CharacterBase')->convertEntitiesToAssoc($characterBases);
        $renderView = $this->renderView('game/show.html.twig', array(
            'game' => $game,
            'characterBases' => $characterBases
        ));
        return new Response($renderView, 200);
    }

    /**
     * EgsGameからのマスターデータを新規挿入または更新する(最新の更新を反映する)
     * @Route("/upsert_from_egs_game/", name="admin_game_upsert_from_egs_game")
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
     * 作業完了/作業未完了をトグル
     * @Route("/toggle_game_is_done/{id}", name="admin_game_toggle_game_is_done")
     * @Method("PUT")
     *
     * @param int $id Game.id
     *
     * @return JsonResponse
     */
    public function toggleGameIsDoneAction($id = 0)
    {
        $newState = $this->getDoctrine()->getManager()->getRepository('AppBundle:Game')->toggleIsDone($id);
        return new JsonResponse($newState, 200);
    }

    /**
     * ノーマル/アブノーマルをトグル
     * @Route("/toggle_game_is_normal/{id}", name="admin_game_toggle_game_is_normal")
     * @Method("PUT")
     *
     * @param int $id Game.id
     *
     * @return JsonResponse
     */
    public function toggleGameIsNormalAction($id = 0)
    {
        $newState = $this->getDoctrine()->getManager()->getRepository('AppBundle:Game')->toggleIsNormal($id);
        return new JsonResponse($newState, 200);
    }

    /**
     * 論理削除ON/論理削除OFFをトグル
     * @Route("/toggle_game_is_deleted/{id}", name="admin_game_toggle_game_is_deleted")
     * @Method("PUT")
     *
     * @param int $id Game.id
     *
     * @return JsonResponse
     */
    public function toggleGameIsDeletedAction($id = 0)
    {
        $newState = $this->getDoctrine()->getManager()->getRepository('AppBundle:Game')->toggleIsDeleted($id);
        return new JsonResponse($newState, 200);
    }

//    /**
//     * Displays a form to edit an existing egsGame entity.
//     * @Route("/{id}/edit", name="admin_egsgame_edit")
//     * @Method({"GET", "POST"})
//     */
//    public function editAction(Request $request, EgsGame $egsGame)
//    {
//        $deleteForm = $this->createDeleteForm($egsGame);
//        $editForm = $this->createForm('AppBundle\Form\EgsGameType', $egsGame);
//        $editForm->handleRequest($request);
//
//        if ($editForm->isSubmitted() && $editForm->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('admin_egsgame_edit', array('id' => $egsGame->getId()));
//        }
//
//        return $this->render('egsgame/edit.html.twig', array(
//            'egsGame' => $egsGame,
//            'edit_form' => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }
//
//    /**
//     * Deletes a egsGame entity.
//     * @Route("/{id}", name="admin_egsgame_delete")
//     * @Method("DELETE")
//     */
//    public function deleteAction(Request $request, EgsGame $egsGame)
//    {
////        $form = $this->createDeleteForm($egsGame);
////        $form->handleRequest($request);
////
////        if ($form->isSubmitted() && $form->isValid()) {
////            $em = $this->getDoctrine()->getManager();
////            $em->remove($egsGame);
////            $em->flush();
////        }
//
//        return $this->redirectToRoute('admin_egsgame_index');
//    }

//    /**
//     * Creates a form to delete a egsGame entity.
//     *
//     * @param EgsGame $egsGame The egsGame entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm(EgsGame $egsGame)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('admin_egsgame_delete', array('id' => $egsGame->getId())))
//            ->setMethod('DELETE')
//            ->getForm();
//    }
}
