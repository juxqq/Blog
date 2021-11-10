<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact/{type}", name="contact")
     */
    public function types(Request $request, string $type = ""): Response
    {
        $name = $request->query->get('name');
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'type' => $type,
            'name' => $name
            ]);
    }
}
