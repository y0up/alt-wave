<?php

namespace App\Controller\Admin;

use App\Entity\NeedContent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NeedContentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NeedContent::class;
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
