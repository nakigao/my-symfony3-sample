<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EgsGame;
use AppBundle\Utils\ErrorCode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Error\Error;

/**
 * Egsgame controller.
 * @Route("admin/egsgame")
 */
class EgsGameController extends Controller
{
    /**
     * @Route("/", name="admin_egsgame_index")
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
        $egsGames = $em->getRepository('AppBundle:EgsGame')->getList($year, $month, $page, $sort, $order, $includeDeleted, $keyword);
        $egsGameYears = $em->getRepository('AppBundle:EgsGameYear')->getList($year, $month, $page, $sort, $order, $includeDeleted, $keyword);
        $egsGameMonths = $em->getRepository('AppBundle:EgsGameMonth')->getList($year, $month, $page, $sort, $order, $includeDeleted, $keyword);
        $logicalTypes = $em->getRepository('AppBundle:LogicalType')->getList($includeDeleted);
        return $this->render('egsgame/index.html.twig', array(
            'egsGames' => $egsGames,
            'egsGameYears' => $egsGameYears,
            'egsGameMonths' => $egsGameMonths,
            'logicalTypes' => $logicalTypes,
        ));
    }

//    /**
//     * Creates a new egsGame entity.
//     * @Route("/new", name="admin_egsgame_new")
//     * @Method({"GET", "POST"})
//     */
//    public function newAction(Request $request)
//    {
//        $egsGame = new Egsgame();
//        $form = $this->createForm('AppBundle\Form\EgsGameType', $egsGame);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($egsGame);
//            $em->flush();
//
//            return $this->redirectToRoute('admin_egsgame_show', array('id' => $egsGame->getId()));
//        }
//
//        return $this->render('egsgame/new.html.twig', array(
//            'egsGame' => $egsGame,
//            'form' => $form->createView(),
//        ));
//    }

    /**
     * Finds and displays a egsGame entity.
     * @Route("/{id}", name="admin_egsgame_show")
     * @Method("GET")
     *
     * @param EgsGame $egsGame
     *
     * @return Response
     */
    public function showAction(EgsGame $egsGame)
    {
        $egsGame = json_decode($this->container->get('serializer')->serialize($egsGame, 'json'), true);
        if (empty($egsGame)) {
            return new Response($this->renderView('error.html.twig', ErrorCode::gets(ErrorCode::NO_ENTRY)), 500);
        }
        $renderView = $this->renderView('egsgame/show.html.twig', array(
            'egsGame' => $egsGame
        ));
        return new Response($renderView, 200);
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
    /**
     * Deletes a egsGame entity.
     * @Route("/{id}", name="admin_egsgame_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EgsGame $egsGame)
    {
//        $form = $this->createDeleteForm($egsGame);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($egsGame);
//            $em->flush();
//        }

        return $this->redirectToRoute('admin_egsgame_index');
    }

    /**
     * Creates a form to delete a egsGame entity.
     *
     * @param EgsGame $egsGame The egsGame entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EgsGame $egsGame)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_egsgame_delete', array('id' => $egsGame->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
