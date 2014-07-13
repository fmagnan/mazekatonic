<?php

namespace Marvin\MazekatonicBundle\Controller;

use Marvin\MazekatonicBundle\Entity\Edge;
use Marvin\MazekatonicBundle\Entity\Node;
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
        $nodeRepository = $this->getDoctrine()->getRepository('MarvinMazekatonicBundle:Node');
        return ['nodes' => $nodeRepository->findAll()];
    }

    /**
     * @Route("/node/{id}", requirements={"id" = "\d+"}, defaults={"id" = "1"})
     * @Template
     */
    public function nodeAction($id)
    {
        $node = $this->getDoctrine()
            ->getRepository('MarvinMazekatonicBundle:Node')
            ->find($id);

        if (!$node) {
            throw $this->createNotFoundException('No node found for id: ' . $id);
        }

        return ['node' => $node, 'edges' => $node->getEdges()];
    }

    /**
     * @Route("/node/new")
     */
    public function createNodeAction()
    {
        $node = new Node();
        $node->setTitle('Départ');
        $node->setContent('Vous êtes dans la forêt, 2 chemins s\'offrent à vous.');

        $left = new Edge();
        $left->setText('Partir sur la gauche');
        $left->bindTo($node);


        $right = new Edge();
        $right->setText('Partir sur la droite');
        $right->bindTo($node);

        $em = $this->getDoctrine()->getManager();
        $em->persist($node);
        $em->persist($left);
        $em->persist($right);
        $em->flush();

        return new Response('Created node id ' . $node->getId());
    }
}