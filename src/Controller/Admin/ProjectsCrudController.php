<?php

namespace App\Controller\Admin;


use App\Entity\Projects;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProjectsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projects::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('title'),
            TextEditorField::new('description')->hideOnIndex(),
            ImageField::new('imageFile')
                ->setFormType(VichImageType::class)->onlyOnDetail(),
            ImageField::new('img')
                ->setBasePath('uploads/images/')
                ->setUploadDir('public/uploads/images'),
        ];
    }
    
}
