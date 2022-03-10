<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('email'),
            ChoiceField::new('roles')->allowMultipleChoices()->setChoices([
                'Administrator' => 'ROLE_ADMIN',
                'User' => 'ROLE_USER',
            ]),
            TextField::new('password'),
            TextField::new('name')->hideOnIndex(),
            TextField::new('surname')->hideOnIndex(),
            IntegerField::new('grade'),
            TextField::new('git')->hideOnIndex(),
            BooleanField::new('is_asso'),
            ImageField::new('logo')->setBasePath('uploads/user/')->setUploadDir('public/uploads/user/')->setUploadedFileNamePattern('[randomhash].[extension]'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->remove(Crud::PAGE_INDEX, Action::NEW);
    }
    
}
