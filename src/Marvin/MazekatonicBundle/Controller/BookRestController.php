<?php

namespace Marvin\MazekatonicBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookRestController extends Controller
{
    /**
     * @View
     */
    public function getBookAction($id)
    {
        $book = $this->getDoctrine()->getRepository('MarvinMazekatonicBundle:Book')->findOneById($id);
        if (!is_object($book)) {
            throw $this->createNotFoundException();
        }
        return $book;
    }
}