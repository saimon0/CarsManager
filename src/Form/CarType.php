<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('engineType')
            ->add('engineCapacity')
            ->add('mileage')
            ->add('vin')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
