<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => "rounded-md py-2 px-3",
                    'style' => 'width: 300px'
                ] 
            ])
            ->add('type', TextType::class,[
                'label' => false,
                'attr' => [
                    'placeholder' => 'Type',
                    'class' => "rounded-md py-2 px-3",
                    'style' => 'width: 300px'
                ] 
            ] )
            ->add('price', MoneyType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Prix',
                    'class' => "rounded-md py-2 px-3",
                    'style' => 'width: 300px'
                ] 
            ] )
            ->add('ageRestriction', NumberType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Restriction d\'âge',
                    'class' => "rounded-md py-2 px-3",
                    'style' => 'width: 300px'
                ] 
            ])
            // ->add('arrivalAt', DateTimeType::class, [
            //     'label' => 'Date d`\'arrivée',
            //     'attr' => [
            //         'class' => "rounded-md py-2 px-3",
            //         'style' => 'width: 300px'
            //     ] 
            // ])
            ->add('limitKilometre', IntegerType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Kilomètre limite',
                    'class' => "rounded-md py-2 px-3",
                    'style' => 'width: 300px'
                ] 
            ])
            ->add('additionalKilometre', MoneyType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Coût kilométrique supplémentaire',
                    'class' => "rounded-md py-2 px-3",
                    'style' => 'width: 300px'
                ] 
            ])
            ->add('passengers', NumberType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nombre de passagers',
                    'class' => "rounded-md py-2 px-3",
                    'style' => 'width: 300px'
                ] 
            ])
            ->add('door', NumberType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nombre de portes',
                    'class' => "rounded-md py-2 px-3",
                    'style' => 'width: 300px'
                ] 
            ])
            ->add('transmission', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'manuelle' => 'manuelle',
                    'automatique' => 'automatique'
                ],
                'attr' => [
                    'placeholder' => 'Transmision',
                    'class' => "rounded-md py-2 px-3",
                    'style' => 'width: 300px'
                ] 
            ])
            ->add('description', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Description',
                    'class' => "rounded-md py-2 px-3",
                    'style' => 'width: 300px'
                ] 
            ])
            // ->add('status', ChoiceType::class, [
            //     'label' => false,
            //     'choices' => [
            //         'Active' => 1,
            //         'Inactive' => 0
            //     ],
            //     'attr' => [
            //         'placeholder' => 'Status',
            //         'class' => "rounded-md py-2 px-3",
            //         'style' => 'width: 300px'
            //     ] 
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
