<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends Controller
{
    /**
     * @return Response
     * @Route(path="/blog",name="blog_index")
     */
    public function indexAction(): Response
    {
        $articles = $this->get('doctrine')->getRepository('App:Article')->findBy([], ['createDate' => 'DESC']);
        return $this->render('blog/index.html.twig', ['articles' => $articles]);
    }

    /**
     * @param $slug
     * @return Response
     * @Route(path="/blog/{slug}",name="blog_single")
     */
    public function singleAction($slug): Response
    {
        $article = $this->get('doctrine')->getRepository('App:Article')->findOneBy(['slug' => $slug]);
        return $this->render('blog/single.html.twig', ['article' => $article]);
    }
}