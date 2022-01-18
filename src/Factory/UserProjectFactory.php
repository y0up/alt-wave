<?php

namespace App\Factory;

use App\Entity\UserProject;
use App\Repository\UserProjectRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<UserProject>
 *
 * @method static UserProject|Proxy createOne(array $attributes = [])
 * @method static UserProject[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static UserProject|Proxy find(object|array|mixed $criteria)
 * @method static UserProject|Proxy findOrCreate(array $attributes)
 * @method static UserProject|Proxy first(string $sortedField = 'id')
 * @method static UserProject|Proxy last(string $sortedField = 'id')
 * @method static UserProject|Proxy random(array $attributes = [])
 * @method static UserProject|Proxy randomOrCreate(array $attributes = [])
 * @method static UserProject[]|Proxy[] all()
 * @method static UserProject[]|Proxy[] findBy(array $attributes)
 * @method static UserProject[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static UserProject[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static UserProjectRepository|RepositoryProxy repository()
 * @method UserProject|Proxy create(array|callable $attributes = [])
 */
final class UserProjectFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'autor' => self::faker()->boolean(25),
            'collaborate' => self::faker()->boolean(50),
            'follow' => self::faker()->boolean(75),
            'project' => ProjectFactory::random(),
            'user' => UserFactory::random(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(UserProject $userProject): void {})
        ;
    }

    protected static function getClass(): string
    {
        return UserProject::class;
    }
}
