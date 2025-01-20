<?php

namespace Wallabag\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Wallabag\Entity\IgnoreOriginInstanceRule;

class IgnoreOriginInstanceRuleFixtures extends Fixture
{
    private array $defaultIgnoreOriginInstanceRules;

    public function __construct(array $defaultIgnoreOriginInstanceRules)
    {
        $this->defaultIgnoreOriginInstanceRules = $defaultIgnoreOriginInstanceRules;
    }

    public function load(ObjectManager $manager): void
    {
        foreach ($this->defaultIgnoreOriginInstanceRules as $ignoreOriginInstanceRule) {
            $newIgnoreOriginInstanceRule = new IgnoreOriginInstanceRule();
            $newIgnoreOriginInstanceRule->setRule($ignoreOriginInstanceRule['rule']);
            $manager->persist($newIgnoreOriginInstanceRule);
        }

        $manager->flush();
    }
}
