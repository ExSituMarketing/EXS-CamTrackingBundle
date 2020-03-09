<?php

namespace Exs\CamTrackingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('cam_tracking');

        $rootNode
            ->children()
                ->scalarNode('read_parameter')->defaultValue('')->end()
                ->scalarNode('write_parameter')->defaultValue('CMP')->end()
                ->scalarNode('overwrite_storage')->defaultFalse()->end()
                ->scalarNode('persistance_layer')->defaultValue('cookies')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
