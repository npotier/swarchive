<?php

namespace Acseo\Bundle\StartupBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class StartupType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('twitter')
            ->add('facebook')
            ->add('website')
            ->add('logo')
            ->add('pitch')
            ->add('description')
            ->add('event')
            ->add('tags')
        ;
    }

    public function getName()
    {
        return 'acseo_bundle_startupbundle_startuptype';
    }
}
