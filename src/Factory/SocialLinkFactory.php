<?php

namespace App\Factory;

use App\Entity\SocialLink;
use App\Repository\SocialLinkRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<SocialLink>
 *
 * @method static SocialLink|Proxy createOne(array $attributes = [])
 * @method static SocialLink[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static SocialLink|Proxy find(object|array|mixed $criteria)
 * @method static SocialLink|Proxy findOrCreate(array $attributes)
 * @method static SocialLink|Proxy first(string $sortedField = 'id')
 * @method static SocialLink|Proxy last(string $sortedField = 'id')
 * @method static SocialLink|Proxy random(array $attributes = [])
 * @method static SocialLink|Proxy randomOrCreate(array $attributes = [])
 * @method static SocialLink[]|Proxy[] all()
 * @method static SocialLink[]|Proxy[] findBy(array $attributes)
 * @method static SocialLink[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static SocialLink[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static SocialLinkRepository|RepositoryProxy repository()
 * @method SocialLink|Proxy create(array|callable $attributes = [])
 */
final class SocialLinkFactory extends ModelFactory
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
            'link' => self::faker()->url(),
            'user' => UserFactory::random(),
            'social' => SocialFactory::random(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(SocialLink $socialLink): void {})
        ;
    }

    protected static function getClass(): string
    {
        return SocialLink::class;
    }
}
