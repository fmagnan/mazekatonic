<?php

namespace Marvin\MazekatonicBundle\Controller;

use Marvin\MazekatonicBundle\Entity\Chapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $chapterRepository = $this->getDoctrine()->getRepository('MarvinMazekatonicBundle:Chapter');
        return ['chapters' => $chapterRepository->findAll()];
    }

    /**
     * @Route("/chapter/{id}", requirements={"id" = "\d+"}, defaults={"id" = "1"})
     * @Template
     */
    public function chapterAction($id)
    {
        $chapter = $this->getDoctrine()
            ->getRepository('MarvinMazekatonicBundle:Chapter')
            ->find($id);

        if (!$chapter) {
            throw $this->createNotFoundException('No chapter found for id: ' . $id);
        }

        return ['chapter' => $chapter];
    }

    /**
     * @Route("/chapter/new")
     */
    public function createChapterAction()
    {
        $chapter = new Chapter();
        $chapter->setTitle('Départ');
        $chapter->setContent('Vous êtes dans la forêt, 2 chemins s\'offrent à vous.');



        $em = $this->getDoctrine()->getManager();
        $em->persist($chapter);

        $em->flush();

        return new Response('Created chapter id ' . $chapter->getId());
    }
}