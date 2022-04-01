<?php

namespace App\Controller\Admin;


use App\Entity\Projects;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

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
            UrlField::new('urltype', 'Urltype'),
            TextareaField::new('description')->hideOnIndex(),
            ImageField::new('imageFile')
                ->setFormType(VichImageType::class)->onlyOnDetail(),
            ImageField::new('img')
                ->setBasePath('uploads/images/')
                ->setUploadDir('public/uploads/images/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/jpg, image/jpeg, image/png, image/webp,'
                    ]
                    ]),
            ChoiceField::new('technos')->allowMultipleChoices()->setChoices([
                    'PHP' => 'PHP',
                    'JAVASCRIPT' => 'JAVASCRIPT',
                    'VUE JS' => 'VUE JS',
                    'CSS' => 'CSS',
                    'RUBY' => 'RUBY',
                    'JAVA' => 'JAVA',
                    'SWIFT' => 'SWIFT',
                    'PYTHON' => 'PYTHON',
                    'TAILWIND CSS' => 'TAILWIND CSS',
                    'REACT' => 'REACT',
                    'HTML' => 'HTML',
                    'LARAVEL' => 'LARAVEL',
                    'SYMFONY' => 'SYMFONY',
                ]),
            
            
        ];
    }
    
}
