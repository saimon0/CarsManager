<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Employee;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mark', ChoiceType::class, [
                'choices' => [
                    'Alfa Romeo' => "Alfa Romeo",
                    'Audi' => "Audi",
                    'BMW' => "BMW",
                    'Chevrolet' => "Chevrolet",
                    'Chrysler' => "Chrysler",
                    'Citroen' => "Citroen",
                    'Dacia' => "Dacia",
                    'Dodge' => "Dodge",
                    'Fiat' => "Fiat",
                    'Ford' => "Ford",
                    'Hyundai' => "Hyundai",
                    'Jeep' => "Jeep",
                    'Kia' => "Kia",
                    'Land Rover' => "Land Rover",
                    'Mazda' => "Mazda",
                    'Mercedes' => "Mercedes",
                    'Opel' => "Opel",
                    'Peugeot' => "Peugeot",
                    'Porsche' => "Porsche",
                    'Renault' => "Porsche",
                    'Seat' => "Porsche",
                    'Skoda' => "Porsche",
                    'Tesla' => "Porsche",
                    'Toyota' => "Porsche",
                    'Volkswagen' => "Volkswagen",
                    'Volvo' => "Volvo",
                ],
            ])
            ->add('model')
            ->add('yearProd', ChoiceType::class, [
                'choices' => [
                    '2000' => 2000, '2001' => 2001,
                    '2002' => 2002, '2003' => 2003,
                    '2004' => 2004, '2005' => 2005,
                    '2006' => 2006, '2007' => 2007,
                    '2008' => 2008, '2009' => 2009,
                    '2010' => 2010, '2011' => 2011,
                    '2012' => 2012, '2013' => 2013,
                    '2014' => 2014, '2015' => 2015,
                    '2016' => 2016, '2017' => 2017,
                    '2018' => 2018, '2019' => 2019,
                    '2020' => 2020,
                ],
            ])
            ->add('engineType', ChoiceType::class, [
                'choices' => [
                    'Gasoline' => "Gasoline",
                    'Diesel' => "Diesel",
                    'Hybrid' => "Hybrid",
                    "Electric" => "Electric",
                    ],
            ])
            ->add('engineCapacity', TextType::class,
                [
                'constraints' => [
                    new Length(['min' => 1, 'max' => 3]),
                    new Positive(['message' => 'Engine Capacity must be positive number']),
                    new Regex(['pattern' => '/[0-9][.][0-9]/', 'message' => 'Engine Capacity must be 2-digit decimal number (e.g. "1.5")'])]
            ])
            ->add('mileage', TextType::class, [
                'constraints' => [new Length(['min' => 1, 'max' => 6]), new Positive()]
            ])
            ->add('vin', TextType::class, [
                'constraints' => [new Length(['min' => 16, 'max' => 16])]
            ])
            ->add('user', EntityType::class, [
                'class' => Employee::class,
                'choice_label' => 'id',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
            'csrf_protection' => false,
        ]);
    }
}
