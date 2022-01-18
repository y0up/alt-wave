<?php

namespace App\Factory;

use App\Entity\Step;
use App\Repository\StepRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Step>
 *
 * @method static Step|Proxy createOne(array $attributes = [])
 * @method static Step[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Step|Proxy find(object|array|mixed $criteria)
 * @method static Step|Proxy findOrCreate(array $attributes)
 * @method static Step|Proxy first(string $sortedField = 'id')
 * @method static Step|Proxy last(string $sortedField = 'id')
 * @method static Step|Proxy random(array $attributes = [])
 * @method static Step|Proxy randomOrCreate(array $attributes = [])
 * @method static Step[]|Proxy[] all()
 * @method static Step[]|Proxy[] findBy(array $attributes)
 * @method static Step[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Step[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static StepRepository|RepositoryProxy repository()
 * @method Step|Proxy create(array|callable $attributes = [])
 */
final class StepFactory extends ModelFactory
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
            'descritpion' => self::faker()->realText(120),
            'resolved' => self::faker()->boolean(),
            'createdAt' => self::faker()->dateTimeBetween('-1000 days', '-100 days'), // TODO add DATETIME ORM type manually
            'updatedAt' => self::faker()->dateTimeBetween('-100 days', '-1 days'), // TODO add DATETIME ORM type manually
            'project' => ProjectFactory::random(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Step $step): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Step::class;
    }
}
