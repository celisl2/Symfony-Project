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
       // $queryBuilder = $this->getDoctrine()->getRepository('AppBundle\Entity\News;')->
        // replace this example code with whatever you need
        $args = array();
        $lastThree = $this->getDoctrine()->getRepository('AppBundle\Entity\News')->lastThree();
        $args['news'] = $lastThree;
        return $this->render('default/index.html.twig', $args);
        //to ascending order
    }


    /**
     * @Route("/category/")
     */
    public function categoryIndexAction(Request $request)
    {
        return $this->render('default/categories.html.twig', array('categories' => $this->getDoctrine()->getRepository('AppBundle\Entity\Category')->findAll()));
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

    /**
     * @Route("/category/{category}")
     */
    public function categorySortIndexAction(Request $request, Category $category)
    {
        //$cagegory is the category in the db
        return $this->render('default/category.html.twig', array('category' => $category));
    }
}
