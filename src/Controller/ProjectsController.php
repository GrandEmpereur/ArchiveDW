<?php

namespace App\Controller;

use App\Entity\Projects;
use App\Entity\Commentaries;
use App\Form\CommentFormType;
use App\Repository\ProjectsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/projects/{id}', name: 'projects_show')]
    public function show(ProjectsRepository $projectsRepository, $id, Request $request, EntityManagerInterface $manager): Response
    {
        $project = $projectsRepository->find($id);


        // Commentaire Section
        
        $comment = new Commentaries();

        // gestion du commentaire
        $commentForm = $this->createForm(CommentFormType::class, $comment);

        $commentForm->handleRequest($request);

        // traitement du formulaire 
        if($commentForm->isSubmitted() && $commentForm->isValid()){

            //on add l'id de l'annonce 
            $comment->setProject($project);

            // récuperation du parentid 
            $parentid = $commentForm->get('parentid')->getData();

            // on va chercher le com correspondant au parentid
            if($parentid != null){
                $parent = $manager->getRepository(Commentaries::class)->find($parentid);

                 // on défini le parent du commentaire
                $comment->setParent($parent ?? null);
            }

            $manager->persist($comment);
            $manager->flush();

            $this->addFlash('success', 'Votre commentaire a bien été ajouté');
            return $this->redirectToRoute('projects_show', ['id' => $id]);
            
        }


        return $this->render('projects/show.html.twig', [
            'project' => $project,
            'commentForm' => $commentForm->createView()
        ]);
    }   
    
}
