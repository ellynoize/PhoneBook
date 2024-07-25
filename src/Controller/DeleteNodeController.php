<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Node;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\NodeRepository;

class DeleteNodeController extends AbstractController
{
    #[Route('/delete', name: 'app_delete_node', methods: ['POST'])]
    public function index(NodeRepository $node, ManagerRegistry $mng, Request $req): Response
    {

        $entManager = $mng->getManager();

        $fordelete = $req->get('namedel');

       
        $data = $node->findOneBy(['Name' => $fordelete]);

        $entManager->remove($data);
        $entManager->flush();

        

        return $this->redirectToRoute('app_get');
    }
}
