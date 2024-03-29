<?php

namespace App\Controller\Admin;

use App\Entity\Level;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class LevelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Level::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('number'),
            ImageField::new('background')
            ->setBasePath('assets/images/backgroundImg')
            ->setUploadDir('public/assets/images/backgroundImg')
            ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]'),
            AssociationField::new('monster'),
            IntegerField::new('multiplier')
        ];
    }
   
}