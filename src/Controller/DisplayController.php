<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Employee;
use App\Form\RemoveCarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class DisplayController extends AbstractController
{
    /**
     * @Route("/display/cars", name="display_cars")
     */
    public function displayCars()
    {
        $repository = $this->getDoctrine()->getRepository(Car::class);
        $allCars =  $repository->findAll();

        return $this->render('display/display_cars.html.twig', [
            'allCars' => $allCars,
        ]);
    }

    /**
     * @Route("/display/employees", name="display_employees")
     */
    public function displayEmployees()
    {
        $repository = $this->getDoctrine()->getRepository(Employee::class);
        $allEmployees =  $repository->findAll();

        return $this->render('display/display_employees.html.twig', [
            'allEmployees' => $allEmployees,
        ]);
    }
}