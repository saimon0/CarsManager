<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Employee;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('surname')
            ->add('branch', ChoiceType::class, [
                'choices' => [
                    "Accountancy" => "Accountancy",
                    'Administration' => "Administration",
                    'Business' => "Business",
                    'HR' => "HR",
                    'IT' => "IT",
                    'Service' => 'Service',
                ],
            ])
            ->add('stage')
            ->add('user', EntityType::class, [
                'class' => Car::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
            'csrf_protection' => false,
        ]);
    }
}
