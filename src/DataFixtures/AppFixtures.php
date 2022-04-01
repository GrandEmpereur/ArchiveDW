<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use App\Entity\Projects;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 20; $i++)
        {
            $info = new Blog();
            $info->setTitle("The latest Symfony update and the new features.");
            $info->setImg("symfony_logo.webp");
            $info->setText("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore...");
            $manager->persist($info);
        }

        for ($i = 1; $i < 20; $i++)
        {
            $project = new Projects();
            $project->setTitle("Devlab");
            $project->setImg("symfony_logo.webp");
            $project->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore...");
            $manager->persist($project);
        }

        $manager->flush();
    }
}
