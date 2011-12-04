<?php

namespace Acseo\Bundle\StartupBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('content')
        ;
    }

    public function getName()
    {
        return 'acseo_bundle_startupbundle_commenttype';
    }
}
