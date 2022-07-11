<?php

namespace App\Controller\Admin;

use App\Entity\Character;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CharacterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Character::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            IntegerField::new('hp'),
            IntegerField::new('atk'),
            ImageField::new('image')
                ->setBasePath('assets/images/heroesPP')
                ->setUploadDir('public/assets/images/heroesPP')
                ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
        ];
    }
   
}
