<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blog::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('title'),
            TextField::new('text'),
            ImageField::new('img')->setBasePath('uploads/blog/')->setUploadDir('public/uploads/blog/')->setUploadedFileNamePattern('[randomhash].[extension]'),
            DateTimeField::new('createdAt'),
            DateTimeField::new('updatedAt'),
            TextField::new('link'),
            
        ];
    }
    
}
