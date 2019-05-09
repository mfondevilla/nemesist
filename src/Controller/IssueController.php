<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IssueController extends AbstractController
{
    /**
     * @Route("/issue", name="issue")
     */
    public function index()
    {
        return $this->render('issue/index.html.twig', [
            'controller_name' => 'IssueController',
        ]);
    }
}
