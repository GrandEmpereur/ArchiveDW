<?php

namespace App\Controller;

use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /** @var BlogRepository */
    private $blogRepository;

    public function __construct(EntityManagerInterface $objectManager)
    {
        $this->blogRepository = $objectManager->getRepository(Blog::class);
    }

    #[Route('/blog', name: 'blog')]
    public function index(): Response
    {
        $blog = $this->blogRepository->findAll();
        return $this->render('blog/index.html.twig', [
            'blogs' => $blog,
        ]);
    }
}
