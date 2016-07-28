<?php

namespace aos\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('aos_user');

        $rootNode
            ->children()
                ->arrayNode('register')
                ->children()
                    ->booleanNode('firstname')->defaultFalse()->isRequired() ->cannotBeEmpty()->end()
                    ->booleanNode('lastname')->defaultFalse()->isRequired() ->cannotBeEmpty()->end()
                    ->booleanNode('phonenumber')->defaultFalse()->isRequired() ->cannotBeEmpty()->end()
                    ->booleanNode('carte_Identite')->defaultFalse()->isRequired() ->cannotBeEmpty()->end()
                    ->booleanNode('birthday')->defaultFalse()->isRequired() ->cannotBeEmpty()->end()
                    ->booleanNode('gender')->defaultFalse()->isRequired() ->cannotBeEmpty()->end()
                    ->booleanNode('country')->defaultFalse()->isRequired() ->cannotBeEmpty()->end()
                    ->end()
                ->end() //
            ->end()
            ->children()
                ->arrayNode('network')
                    ->children()
                    ->booleanNode('visible')->defaultFalse()->isRequired() ->cannotBeEmpty()->end()
                    ->booleanNode('facebook')->defaultFalse()->isRequired() ->cannotBeEmpty()->end()
                    ->booleanNode('github')->defaultFalse()->isRequired() ->cannotBeEmpty()->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
