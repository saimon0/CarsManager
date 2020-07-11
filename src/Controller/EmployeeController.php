<?php

namespace App\Controller;

use App\Form\CarType;
use App\Form\EmployeeType;
use App\Form\RemoveCarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    /**
     * @Route("/employee", name="employee_main")
     */
    public function displayEmployeePage()
    {
        $createForm = $this->createForm(EmployeeType::class);

        return $this->render('employee/employee_main.html.twig', [
            'form' => $createForm->createView(),
        ]);
    }

    /**
     * @Route("/employee/create", name="employee_create")
     */
    public function createEmployee()
    {
        return $this->render('employee/employee_create.html.twig', [
            'controller_name' => 'EmployeeController',
        ]);
    }
}
