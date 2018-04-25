<?php

declare(strict_types=1);

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return Response
     * @Route(path="/",name="default_index")
     */
    public function indexAction(): Response
    {

        return 200;
        //return $this->render('default/index.html.twig');
    }
}