<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EgsBrand;
use AppBundle\Utils\ErrorCode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Egsbrand controller.
 * @Route("admin/egsbrand")
 */
class EgsBrandController extends Controller
{
    /**
     * Lists all egsBrand entities.
     * @Route("/", name="admin_egsbrand_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $egsBrands = $em->getRepository('AppBundle:EgsBrand')->findAll();
        return $this->render('egsbrand/index.html.twig', array(
            'egsBrands' => $egsBrands,
        ));
    }

//    /**
//     * Creates a new egsBrand entity.
//     *
//     * @Route("/new", name="admin_egsbrand_new")
//     * @Method({"GET", "POST"})
//     */
//    public function newAction(Request $request)
//    {
//        $egsBrand = new Egsbrand();
//        $form = $this->createForm('AppBundle\Form\EgsBrandType', $egsBrand);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($egsBrand);
//            $em->flush();
//
//            return $this->redirectToRoute('admin_egsbrand_show', array('id' => $egsBrand->getId()));
//        }
//
//        return $this->render('egsbrand/new.html.twig', array(
//            'egsBrand' => $egsBrand,
//            'form' => $form->createView(),
//        ));
//    }

    /**
     * Finds and displays a egsBrand entity.
     * @Route("/{id}", name="admin_egsbrand_show")
     * @Method("GET")
     *
     * @param EgsBrand $egsBrand
     *
     * @return Response
     */
    public function showAction(EgsBrand $egsBrand)
    {
        $egsBrand = json_decode($this->container->get('serializer')->serialize($egsBrand, 'json'), true);
        if (empty($egsBrand)) {
            return new Response($this->renderView('error.html.twig', ErrorCode::gets(ErrorCode::NO_ENTRY)), 500);
        }
        $renderView = $this->renderView('egsbrand/show.html.twig', array(
            'egsBrand' => $egsBrand
        ));
        return new Response($renderView, 200);
    }

//    /**
//     * Displays a form to edit an existing egsBrand entity.
//     * @Route("/{id}/edit", name="admin_egsbrand_edit")
//     * @Method({"GET", "POST"})
//     */
//    public function editAction(Request $request, EgsBrand $egsBrand)
//    {
//        $deleteForm = $this->createDeleteForm($egsBrand);
//        $editForm = $this->createForm('AppBundle\Form\EgsBrandType', $egsBrand);
//        $editForm->handleRequest($request);
//
//        if ($editForm->isSubmitted() && $editForm->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('admin_egsbrand_edit', array('id' => $egsBrand->getId()));
//        }
//
//        return $this->render('egsbrand/edit.html.twig', array(
//            'egsBrand' => $egsBrand,
//            'edit_form' => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }
//
//    /**
//     * Deletes a egsBrand entity.
//     * @Route("/{id}", name="admin_egsbrand_delete")
//     * @Method("DELETE")
//     */
//    public function deleteAction(Request $request, EgsBrand $egsBrand)
//    {
//        $form = $this->createDeleteForm($egsBrand);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($egsBrand);
//            $em->flush();
//        }
//        return $this->redirectToRoute('admin_egsbrand_index');
//    }
//
//    /**
//     * Creates a form to delete a egsBrand entity.
//     *
//     * @param EgsBrand $egsBrand The egsBrand entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm(EgsBrand $egsBrand)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('admin_egsbrand_delete', array('id' => $egsBrand->getId())))
//            ->setMethod('DELETE')
//            ->getForm();
//    }
}
