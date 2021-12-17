<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;

class ContactController extends AbstractController
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function types(Request $request, string $type = ""): Response
    {
        $name = $request->query->get('name');

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        dump($form->getViewData());

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();

            dump("ok en base !");
        }
        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'type' => $type,
            'name' => $name,
            'contacts' => $this->contactRepository->findAll(),
            'form' => $form
            ]);
    }
    /**
     * @Route("contact/{id}", name="contactId")
     */
    public function login(Request $request, string $id): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();

            dump("ok en base!");
        }


        return $this->renderForm('contact/index.html.twig', [
            'contacts' => $this->contactRepository->findAll(),
            'contactNow' => $this->contactRepository->find($id),
            'form' => $form,
            'controller_name' => 'ContactController'
        ]);
    }
}
