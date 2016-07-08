<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackEndController extends Controller
{
    public function indexAction()
    {
        $currentUser = $this->get('security.context')->getToken()->getUser();

        return $this->render('AdminBundle:BackEnd:index.html.twig', array(
            'currentUser' => $currentUser
        ));
    }
}
