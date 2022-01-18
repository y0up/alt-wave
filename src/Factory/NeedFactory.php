<?php

namespace App\Factory;

use App\Entity\Need;
use App\Repository\NeedRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Need>
 *
 * @method static Need|Proxy createOne(array $attributes = [])
 * @method static Need[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Need|Proxy find(object|array|mixed $criteria)
 * @method static Need|Proxy findOrCreate(array $attributes)
 * @method static Need|Proxy first(string $sortedField = 'id')
 * @method static Need|Proxy last(string $sortedField = 'id')
 * @method static Need|Proxy random(array $attributes = [])
 * @method static Need|Proxy randomOrCreate(array $attributes = [])
 * @method static Need[]|Proxy[] all()
 * @method static Need[]|Proxy[] findBy(array $attributes)
 * @method static Need[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Need[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static NeedRepository|RepositoryProxy repository()
 * @method Need|Proxy create(array|callable $attributes = [])
 */
final class NeedFactory extends ModelFactory
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
            'description' => self::faker()->realText(50),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Need $need): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Need::class;
    }
}
