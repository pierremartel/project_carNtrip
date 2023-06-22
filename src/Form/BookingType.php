<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\User;
use App\Entity\Booking;
use App\Services\ApiCitiesService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', EntityType::class, [
                'label' => 'Choose a client',
                'class' => User::class,
                'choice_label' => 'name',
                'attr' => [
                    'class' => "rounded-md py-2 px-3 ml-2",
                    'style' => 'width: 300px'
                ] 
                    
            ])
            ->add('pickupDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Pick-up Date',
                'attr' => [
                    'class' => "rounded-md py-2 px-3 ml-2",
                    'style' => 'width: 200px'
                ] 
            ] )
            ->add('dropoffDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Drop-off Date',
                'attr' => [
                    'class' => "rounded-md py-2 px-3 ml-2",
                    'style' => 'width: 200px'
                ] 
            ])
            // ->add('pickupLocation')
            // ->add('dropoffLocation')
            ->add('pickupTime' , TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Pick-up Time',
                'attr' => [
                    'class' => "rounded-md py-2 px-3 ml-2",
                    'style' => 'width: 200px'
                ] 
            ] )
            ->add('dropoffTime' , TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Drop-off Time',
                'attr' => [
                    'class' => "rounded-md py-2 px-3 ml-2",
                    'style' => 'width: 200px'
                ] 
                    
            ] )
            ->add('car', EntityType::class, [
                'label' => 'Choose a car',
                'class' => Car::class,
                'choice_label' => 'name',
                'attr' => [
                    'class' => "rounded-md py-2 px-3 ml-2",
                    'style' => 'width: 200px'
                ] 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
