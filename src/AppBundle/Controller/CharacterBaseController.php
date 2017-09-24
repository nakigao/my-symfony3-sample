<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CharacterBase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Characterbase controller.
 *
 * @Route("admin/character_base")
 */
class CharacterBaseController extends Controller
{
    /**
     * Lists all characterBase entities.
     *
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
     *
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
     *
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
     *
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
     *
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
            ->getForm()
        ;
    }
}
