<?php

namespace App\Factory;

use App\Entity\Social;
use App\Repository\SocialRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Social>
 *
 * @method static Social|Proxy createOne(array $attributes = [])
 * @method static Social[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Social|Proxy find(object|array|mixed $criteria)
 * @method static Social|Proxy findOrCreate(array $attributes)
 * @method static Social|Proxy first(string $sortedField = 'id')
 * @method static Social|Proxy last(string $sortedField = 'id')
 * @method static Social|Proxy random(array $attributes = [])
 * @method static Social|Proxy randomOrCreate(array $attributes = [])
 * @method static Social[]|Proxy[] all()
 * @method static Social[]|Proxy[] findBy(array $attributes)
 * @method static Social[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Social[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static SocialRepository|RepositoryProxy repository()
 * @method Social|Proxy create(array|callable $attributes = [])
 */
final class SocialFactory extends ModelFactory
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
            'name' => self::faker()->word(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Social $social): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Social::class;
    }
}
