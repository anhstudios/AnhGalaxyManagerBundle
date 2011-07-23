<?php

namespace Anh\GalaxyManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('type')
            ->add('address')
            ->add('tcpPort')
            ->add('udpPort')
            ->add('pingPort')
            ->add('version')
            ->add('status')
            ->add('lastPulse')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('galaxy')
        ;
    }

    public function getName()
    {
        return 'anh_galaxymanagerbundle_servicetype';
    }
}
