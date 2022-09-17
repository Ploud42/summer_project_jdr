<?php

namespace App\Controller\Admin;

use App\Entity\Run;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RunCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Run::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('user'),
            AssociationField::new('charac'),
            DateField::new('date'),
            TextField::new('score')
        ];
    }
   
}
