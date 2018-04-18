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
       // $args = $this->getDoctrine()->getRepository()->findOneBy(News::getCategory());
        // replace this example code with whatever you need
        return $this->render('default/category.html.twig', array('category' => $this->getDoctrine()->getRepository('AppBundle\Entity\Category')->findAll() )); //add category object here
    }

    /*
    /**
     * @Route("/news/")

    public function newsIndexAction(Request $request)
    {
        // $args = $this->getDoctrine()->getRepository()->findOneBy(News::getCategory()); //News::getCategory() is incorrect
        // replace this example code with whatever you need
        return $this->render('default/news.html.twig', array('category' => $this->getDoctrine()->getRepository('AppBundle\Entity\News')->findAll() )); //add category object here
        // you can connect whichever twig you want. so line above is correct but you would have to make a new.html.twig in default folder becauses there isn't one currently
     * }
    */
}
