<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Jurisdiction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('siren_number')
            ->add('city_registration')
            ->add('share_social')
            ->add('jurisdiction', EntityType::class, [
                'class'    => Jurisdiction::class,
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
            'translation_domain' => 'forms'
        ]);
    }
}
