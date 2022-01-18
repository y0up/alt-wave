<?php

namespace App\Factory;

use App\Entity\NeedContent;
use App\Repository\NeedContentRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<NeedContent>
 *
 * @method static NeedContent|Proxy createOne(array $attributes = [])
 * @method static NeedContent[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static NeedContent|Proxy find(object|array|mixed $criteria)
 * @method static NeedContent|Proxy findOrCreate(array $attributes)
 * @method static NeedContent|Proxy first(string $sortedField = 'id')
 * @method static NeedContent|Proxy last(string $sortedField = 'id')
 * @method static NeedContent|Proxy random(array $attributes = [])
 * @method static NeedContent|Proxy randomOrCreate(array $attributes = [])
 * @method static NeedContent[]|Proxy[] all()
 * @method static NeedContent[]|Proxy[] findBy(array $attributes)
 * @method static NeedContent[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static NeedContent[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static NeedContentRepository|RepositoryProxy repository()
 * @method NeedContent|Proxy create(array|callable $attributes = [])
 */
final class NeedContentFactory extends ModelFactory
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
            'resolved' => self::faker()->boolean(50),
            'project' => ProjectFactory::random(),
            'need' => NeedFactory::random(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(NeedContent $needContent): void {})
        ;
    }

    protected static function getClass(): string
    {
        return NeedContent::class;
    }
}
