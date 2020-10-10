<?php

declare(strict_types=1);

namespace App\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public const CONFIG_NAME = 'setting_client';

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBundle = new TreeBuilder(self::CONFIG_NAME);

        $treeBundle->getRootNode()
            ->children()
                ->scalarNode('rest.url')->isRequired()->end()
                ->scalarNode('http.url')->isRequired()->end()
                ->scalarNode('grpc.url')->isRequired()->end()
            ->end()
        ;

        return $treeBundle;
    }
}
