<?php

namespace Anh\GalaxyManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class GalaxyType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('version')
            ->add('status')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    public function getName()
    {
        return 'anh_galaxymanagerbundle_galaxytype';
    }
}
