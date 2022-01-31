<?php

namespace App\Controller\Admin;

use App\Entity\Need;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NeedCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Need::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
