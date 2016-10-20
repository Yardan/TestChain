<?php
// src/AppBundle/DependencyInjection/Compiler/ChainPass.php
namespace ChainCommandBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ChainPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        // always first check if the primary service is defined
        if (!$container->has('chain_command.command_chain')) {
            return;
        }

        $definition = $container->findDefinition('chain_command.command_chain');

        // find all service IDs with the app.mail_transport tag
        $taggedServices = $container->findTaggedServiceIds('chain_command.command');

        foreach ($taggedServices as $id => $tags) {
            // add the transport service to the ChainTransport service
            $definition->addMethodCall('addToChain', array(new Reference($id)));
        }
    }
}