<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @Route("/")
     * @return Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $heroPool = array();
        $heroinePool = array();
        for ($i = 0; $i < 1; $i++) {
            $firstName = $em->getRepository('AppBundle:FirstNameMale')->choiceAtRandom();
            $middleName = $em->getRepository('AppBundle:MiddleName')->choiceAtRandom();
            $familyName = $em->getRepository('AppBundle:FamilyName')->choiceAtRandom();
            if (preg_match("/^[ァ-ヶー]+$/u", $firstName['name']) || preg_match("/^[ァ-ヶー]+$/u", $familyName['name'])) {
                $isJpName = false;
            } else {
                $isJpName = true;
            }
            $heroPool[] = array(
                'firstName' => $firstName,
                'middleName' => $middleName,
                'familyName' => $familyName,
                'isJpName' => $isJpName
            );
        }
        for ($i = 0; $i < 4; $i++) {
            $firstName = $em->getRepository('AppBundle:FirstNameFemale')->choiceAtRandom();
            $middleName = $em->getRepository('AppBundle:MiddleName')->choiceAtRandom();
            $familyName = $em->getRepository('AppBundle:FamilyName')->choiceAtRandom();
            if (preg_match("/^[ァ-ヶー]+$/u", $firstName['name']) || preg_match("/^[ァ-ヶー]+$/u", $familyName['name'])) {
                $isJpName = false;
            } else {
                $isJpName = true;
            }
            $heroinePool[] = array(
                'firstName' => $firstName,
                'middleName' => $middleName,
                'familyName' => $familyName,
                'isJpName' => $isJpName
            );
        }
        $a = $em->getRepository('AppBundle:FamilyName')->countNumberOfRows();
        $b1 = $em->getRepository('AppBundle:FirstNameMale')->countNumberOfRows();
        $b2 = $em->getRepository('AppBundle:FirstNameFemale')->countNumberOfRows();
        return $this->render('index/index.html.twig', array(
            'heroPool' => $heroPool,
            'heroinePool' => $heroinePool,
            'heroPoolNumberOfPattern' => $a * $b1,
            'heroinePoolNumberOfPattern' => $a * $b2
        ));
    }

}