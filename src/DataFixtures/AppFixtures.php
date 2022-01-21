<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\DomainFactory;
use App\Factory\NeedContentFactory;
use App\Factory\NeedFactory;
use App\Factory\ProjectFactory;
use App\Factory\SocialFactory;
use App\Factory\SocialLinkFactory;
use App\Factory\StepFactory;
use App\Factory\TagFactory;
use App\Factory\UserFactory;
use App\Factory\UserProjectFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CategoryFactory::createMany(10);

        DomainFactory::createMany(10);
        
        NeedFactory::createMany(10);

        SocialFactory::createMany(10);
        
        TagFactory::createMany(100);
        
        UserFactory::createOne([
                'email' => 'admin@example.com',
                'roles' => ['ROLE_ADMIN']
        ]);

        UserFactory::createMany(30);
        
        SocialLinkFactory::createMany(10);
        
        ProjectFactory::createMany(20);

        StepFactory::createMany(10);

        UserProjectFactory::createMany(20);
        
        NeedContentFactory::createMany(10);




    }
}
