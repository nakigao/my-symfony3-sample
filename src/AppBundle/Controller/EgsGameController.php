<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EgsGame;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Egsgame controller.
 *
 * @Route("admin/egsgame")
 */
class EgsGameController extends Controller
{
    /**
     * Lists all egsGame entities.
     *
     * @Route("/", name="admin_egsgame_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $egsGames = $em->getRepository('AppBundle:EgsGame')->findAll();

        return $this->render('egsgame/index.html.twig', array(
            'egsGames' => $egsGames,
        ));
    }

    /**
     * Creates a new egsGame entity.
     *
     * @Route("/new", name="admin_egsgame_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $egsGame = new Egsgame();
        $form = $this->createForm('AppBundle\Form\EgsGameType', $egsGame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($egsGame);
            $em->flush();

            return $this->redirectToRoute('admin_egsgame_show', array('id' => $egsGame->getId()));
        }

        return $this->render('egsgame/new.html.twig', array(
            'egsGame' => $egsGame,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a egsGame entity.
     *
     * @Route("/{id}", name="admin_egsgame_show")
     * @Method("GET")
     */
    public function showAction(EgsGame $egsGame)
    {
        $deleteForm = $this->createDeleteForm($egsGame);

        return $this->render('egsgame/show.html.twig', array(
            'egsGame' => $egsGame,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing egsGame entity.
     *
     * @Route("/{id}/edit", name="admin_egsgame_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EgsGame $egsGame)
    {
        $deleteForm = $this->createDeleteForm($egsGame);
        $editForm = $this->createForm('AppBundle\Form\EgsGameType', $egsGame);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_egsgame_edit', array('id' => $egsGame->getId()));
        }

        return $this->render('egsgame/edit.html.twig', array(
            'egsGame' => $egsGame,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a egsGame entity.
     *
     * @Route("/{id}", name="admin_egsgame_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EgsGame $egsGame)
    {
        $form = $this->createDeleteForm($egsGame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($egsGame);
            $em->flush();
        }

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
            ->getForm()
        ;
    }
}
