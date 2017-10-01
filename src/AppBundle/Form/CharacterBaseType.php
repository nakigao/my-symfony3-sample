<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CharacterBaseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gameId')
            ->add('name')
            ->add('middleName')
            ->add('familyName')
            ->add('nameKana')
            ->add('middleNameKana')
            ->add('familyNameKana')
            ->add('gender')
            ->add('trueGender')
            ->add('bloodType')
            ->add('height')
            ->add('weight')
            ->add('cup')
            ->add('bust')
            ->add('waist')
            ->add('hip')
            ->add('birthMonth')
            ->add('birthDay')
            ->add('race')
            ->add('introductionPriority');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CharacterBase'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_characterbase';
    }


}
