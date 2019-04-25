<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PersonaRepository;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(PersonaRepository $service1)
    {
        $service1->createPersona();

        return $this->json([
            'message' => "Persona Ingresada! ;)",
            'path' => 'src/Controller/TestController.php',
        ]);
    }
}
