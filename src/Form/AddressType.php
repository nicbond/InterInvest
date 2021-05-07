<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\Company;
use App\Repository\CompanyRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number')
            ->add('way')
            ->add('street_name')
            ->add('city')
            ->add('postal_code', TextType::class, [
                  'required' => true,
                  'constraints' => [
                      new Length([
                          'min' => 5,
                          'minMessage' => "Le code postal doit contenir 5 chiffres",
                      ]),
                  ]
            ])
            ->add('company', EntityType::class, [
                'class'    => Company::class,
                'choice_label' => 'name',
                'query_builder' => function(CompanyRepository $repo) {
                 return $repo->createQueryBuilder('c')
                ->orderBy('c.name', 'ASC');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
            'translation_domain' => 'forms'
        ]);
    }
}
