<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EgsGame;
use AppBundle\Entity\Game;
use AppBundle\Utils\ErrorCode;
use AppBundle\Utils\SuccessCode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Error\Error;

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
        $year = $request->get('year', date('Y'));
        $month = $request->get('month', date('m'));
        $includeDeleted = $request->get('include_deleted', 0);
        $page = $request->get('page', 1);
        $sort = $request->get('sort', null);
        $order = $request->get('order', 'asc');
        $keyword = $request->get('keyword', null);
        $em = $this->getDoctrine()->getManager();
        $games = $em->getRepository('AppBundle:Game')->getList($year, $month, $page, $sort, $order, $includeDeleted, $keyword);
        $egsGameYears = $em->getRepository('AppBundle:EgsGameYear')->getList($year, $month, $page, $sort, $order, $includeDeleted, $keyword);
        $egsGameMonths = $em->getRepository('AppBundle:EgsGameMonth')->getList($year, $month, $page, $sort, $order, $includeDeleted, $keyword);
        $logicalTypes = $em->getRepository('AppBundle:LogicalType')->getList($includeDeleted);
        return $this->render('game/index.html.twig', array(
            'games' => $games,
            'egsGameYears' => $egsGameYears,
            'egsGameMonths' => $egsGameMonths,
            'logicalTypes' => $logicalTypes,
        ));
    }

    /**
     * Finds and displays a Game entity.
     * @Route("/{id}", name="admin_game_show")
     * @Method("GET")
     * @return Response
     */
    public function showAction()
    {
        $egsGame = json_decode($this->container->get('serializer')->serialize(array(), 'json'), true);
        if (empty($egsGame)) {
            return new Response($this->renderView('error.html.twig', ErrorCode::gets(ErrorCode::NO_ENTRY)), 500);
        }
        $renderView = $this->renderView('game/show.html.twig', array(
            'egsGame' => $egsGame
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
     * EgsGameからのマスターデータを新規挿入または更新する(最新の更新を反映する)
     * @Route("/toggle_game_is_done/{egsGameId}", name="admin_game_toggle_game_is_done")
     * @Method("PUT")
     *
     * @param $egsGameId Game.egsGameId
     *
     * @return JsonResponse
     */
    public function toggleGameIsDoneAction($egsGameId)
    {
        $newState = $this->getDoctrine()->getManager()->getRepository('AppBundle:Game')->toggleIsDone($egsGameId);
        return new JsonResponse($newState, 200);
    }

    /**
     * EgsGameからのマスターデータを新規挿入または更新する(最新の更新を反映する)
     * @Route("/toggle_game_is_deleted/{egsGameId}", name="admin_game_toggle_game_is_deleted")
     * @Method("PUT")
     *
     * @param $egsGameId Game.egsGameId
     *
     * @return JsonResponse
     */
    public function toggleGameIsDeletedAction($egsGameId)
    {
        $newState = $this->getDoctrine()->getManager()->getRepository('AppBundle:Game')->toggleIsDeleted($egsGameId);
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
