<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoreBundle:Default:index.html.twig');
    }

    public function redirectAction()
    {
        $prefLang = $this->getRequest()->getPreferredLanguage(array("en", "fr"));
        return $this->redirect($this->generateUrl("public_homepage", array("_locale" => $prefLang ? $prefLang : "en")));
    }
}
