<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CharacterBase;
use AppBundle\Utils\ErrorCode;
use AppBundle\Utils\SuccessCode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Characterbase controller.
 * @Route("admin/character_base")
 */
class CharacterBaseController extends Controller
{
    /**
     * Lists all characterBase entities.
     * @Route("/", name="admin_character_base_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $characterBases = $em->getRepository('AppBundle:CharacterBase')->findAll();

        return $this->render('characterbase/index.html.twig', array(
            'characterBases' => $characterBases,
        ));
    }

    /**
     * Creates a new characterBase entity.
     * @Route("/new", name="admin_character_base_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $characterBase = new Characterbase();
        $form = $this->createForm('AppBundle\Form\CharacterBaseType', $characterBase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($characterBase);
            $em->flush();

            return $this->redirectToRoute('admin_character_base_show', array('id' => $characterBase->getId()));
        }

        return $this->render('characterbase/new.html.twig', array(
            'characterBase' => $characterBase,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a characterBase entity.
     * @Route("/{id}", name="admin_character_base_show")
     * @Method("GET")
     */
    public function showAction(CharacterBase $characterBase)
    {
        $deleteForm = $this->createDeleteForm($characterBase);

        return $this->render('characterbase/show.html.twig', array(
            'characterBase' => $characterBase,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing characterBase entity.
     * @Route("/{id}/edit", name="admin_character_base_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CharacterBase $characterBase)
    {
        $deleteForm = $this->createDeleteForm($characterBase);
        $editForm = $this->createForm('AppBundle\Form\CharacterBaseType', $characterBase);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_character_base_edit', array('id' => $characterBase->getId()));
        }

        return $this->render('characterbase/edit.html.twig', array(
            'characterBase' => $characterBase,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a characterBase entity.
     * @Route("/{id}", name="admin_character_base_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CharacterBase $characterBase)
    {
        $form = $this->createDeleteForm($characterBase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($characterBase);
            $em->flush();
        }

        return $this->redirectToRoute('admin_character_base_index');
    }

    /**
     * Creates a form to delete a characterBase entity.
     *
     * @param CharacterBase $characterBase The characterBase entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CharacterBase $characterBase)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_character_base_delete', array('id' => $characterBase->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * キャラクターベースの簡易フォーム取得
     * @Route("/get_short_form/{gameId}", name="admin_character_base_get_short_form")
     * @Method("GET")
     *
     * @param int $gameId Game.id
     *
     * @return Response
     */
    public function getCharacterBaseShortFormAction($gameId = 0)
    {
        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository('AppBundle:Game')->get($gameId);
        if (empty($game)) {
            return new Response($this->renderView('error.html.twig', ErrorCode::gets(ErrorCode::NO_ENTRY)), 500);
        }
        $gender = $em->getRepository('AppBundle:Gender')->getList();
        $renderView = $this->renderView('characterbase/new-short-form.html.twig', array(
            'gender' => $gender,
            'game' => $game
        ));
        return new Response($renderView, 200);
    }

    /**
     * キャラクターベースの簡易フォームから、新規作成
     * @Route("/create_short/", name="admin_character_base_create_short")
     * @Method("POST")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function createCharacterBaseShortFormAction(Request $request)
    {
        $characterBase = new Characterbase();
        $form = $this->createForm('AppBundle\Form\CharacterBaseType', $characterBase);
        $form->handleRequest($request);
//        $validationErrors = $this->get('validator')->validate($characterBase);
//        $validationErrorStrings = (string)$validationErrors;
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $characterBaseRepository = $em->getRepository('AppBundle:CharacterBase');
            $newCharacterBase = $characterBaseRepository->create($characterBase);
            if (empty($newCharacterBase)) {
                return new Response($this->renderView('error.html.twig', ErrorCode::gets(ErrorCode::CANNOT_CREATE_ENTRY)), 500);
            }
            $gender = $em->getRepository('AppBundle:Gender')->getList();
            $renderView = $this->renderView('characterbase/edit-short-form.html.twig', array(
                'gender' => $gender,
                'characterBase' => $newCharacterBase
            ));
            return new Response($renderView, 200);
        } else {
            // TODO: validation check and error handling
            return new Response($this->renderView('error.html.twig', ErrorCode::gets(ErrorCode::DIRTY_REQUEST)), 500);
        }
    }

    /**
     * キャラクターベースの簡易フォームから、更新
     * @Route("/update_short/{id}", name="admin_character_base_update_short")
     * @Method("PUT")
     *
     * @param Request $request
     * @param CharacterBase $characterBase
     *
     * @return Response
     */
    public function updateCharacterBaseShortFormAction(Request $request, CharacterBase $characterBase)
    {
        $form = $this->createForm('AppBundle\Form\CharacterBaseType', $characterBase, array(
            'method' => 'put'
        ));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $characterBaseRepository = $em->getRepository('AppBundle:CharacterBase');
            $newCharacterBase = $characterBaseRepository->update($characterBase);
            if (empty($newCharacterBase)) {
                return new Response($this->renderView('error.html.twig', ErrorCode::gets(ErrorCode::CANNOT_CREATE_ENTRY)), 500);
            }
            $gender = $em->getRepository('AppBundle:Gender')->getList();
            $renderView = $this->renderView('characterbase/edit-short-form.html.twig', array(
                'gender' => $gender,
                'characterBase' => $newCharacterBase
            ));
            return new Response($renderView, 200);
        } else {
            // TODO: validation check and error handling
            return new Response($this->renderView('error.html.twig', ErrorCode::gets(ErrorCode::DIRTY_REQUEST)), 500);
        }
    }

}
