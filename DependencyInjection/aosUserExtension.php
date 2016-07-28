<?php

namespace aos\UserBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class aosUserExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('register.firstname',$config['register']['firstname']);
        $container->setParameter('register.lastname',$config['register']['lastname']);
        $container->setParameter('register.phonenumber',$config['register']['phonenumber']);
        $container->setParameter('register.carte_Identite',$config['register']['carte_Identite']);
        $container->setParameter('register.birthday',$config['register']['birthday']);
        $container->setParameter('register.gender',$config['register']['gender']);
        $container->setParameter('register.country',$config['register']['country']);

        $container->setParameter('network.visible',$config['network']['visible']);
        $container->setParameter('network.facebook',$config['network']['facebook']);
        $container->setParameter('network.github',$config['network']['github']);


        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
