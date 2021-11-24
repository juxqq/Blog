<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ContactController extends AbstractController
{
    /**
     * @var ContactRepository
     */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @Route("/contactez-moi/{city}", name="contact")
     */
    public function index(Request $request, string $city = ""): Response
    {
        $name = $request->query->get('name');

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'Contrôleur de Contact',
            'city' => $city,
            'name' => $name,
            'contacts' => $this->contactRepository->findAll()
        ]);
    }

    /**
     * @Route("/contact/api", name="contactAPI")
     */
    public function api(): Response
    {
        $contacts = $this->contactRepository->findAll();

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $contacts = $serializer->serialize($contacts, 'json');

        return JsonResponse::fromJsonString($contacts);
    }
}