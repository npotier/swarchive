<?php

namespace Acseo\Bundle\StartupWeekendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EventType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('eventDate')
            ->add('numberOfParticipant')
        ;
    }

    public function getName()
    {
        return 'acseo_bundle_startupweekendbundle_eventtype';
    }
}
