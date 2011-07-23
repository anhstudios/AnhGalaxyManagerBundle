# GalaxyManagerBundle

Manages galaxy cluster's and user accounts for ANH based MMO's.

## Installation

Add the following to the deps file (for projects based on the Symfony2 Standard edition).

    [GalaxyManagerBundle]
        git=git://github.com/anhstudios/GalaxyManagerBundle.git
        target=/bundles/Anh/GalaxyManagerBundle

    [FOSUserBundle]
        git=git://github.com/FriendsOfSymfony/FOSUserBundle.git
        target=bundles/FOS/UserBundle
        
Then run the vendors script

    ./bin/vendors install
    [windows]  php bin/vendors install

Add the Anh namespace to your autoloader

    // app/autoload.php
    $loader->registerNamespaces(array(
    'Anh' => __DIR__.'/../vendor/bundles',
	'FOS' => __DIR__.'/../vendor/bundles',
    ));
    
Finally, add the GalaxyManagerBundle to your application kernel

    // app/AppKernel.php

    public function registerBundles()
    {
        return array(
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            // ...
            new FOS\UserBundle\FOSUserBundle(),
            new Anh\GalaxyManagerBundle\AnhGalaxyManagerBundle(),
            // ...
        );
    }
