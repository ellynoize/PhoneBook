<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Node;
use App\Repository\NodeRepository;

class DrawController extends AbstractController
{
   

    #[Route('/phones', name: 'app_get', methods:['GET'])]

    public function getPage(NodeRepository $doc): Response {

    $data = $doc->findAll();
    

    return $this->render('draw/index.html.twig', ['number' => $data]);

    }


}
