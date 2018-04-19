<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Category;
use AppBundle\Entity\News;
use Doctrine\ORM\Mapping\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{


    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }


    /**
     * @Route("/category/")
     */
    public function categoryIndexAction(Request $request)
    {
        return $this->render('default/category.html.twig', array('category' => $this->getDoctrine()->getRepository('AppBundle\Entity\Category')->findAll()));
    }

    /**
     * @Route("/news/")
     */
    public function newsIndexAction(Request $request)
    {
        return $this->render('default/new.html.twig', array('news' => $this->getDoctrine()->getRepository('AppBundle\Entity\News')->findAll() ));
    }

    /**
     * @Route("/about/")
     */
    public function aboutIndexAction(Request $request)
    {
        return $this->render('default/about.html.twig');
    }

}
