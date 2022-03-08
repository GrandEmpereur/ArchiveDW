<?php

namespace App\Controller;

use App\Entity\Projects;
use App\Repository\ProjectsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectsController extends AbstractController
{
    /** @var ProjectsRepository */
    private $projectsRepository;

    public function __construct(EntityManagerInterface $objectManager)
    {
        $this->projectsRepository = $objectManager->getRepository(Projects::class);
    }

    #[Route('/projects', name: 'projects')]
    public function index(): Response
    {
        $project = $this->projectsRepository->findAll();
        return $this->render('projects/index.html.twig', [
            'projects' => $project,
        ]);
    }
}
