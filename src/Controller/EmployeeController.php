<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    /**
     * @Route("/employee", name="employee_main")
     */
    public function displayEmployeePage()
    {
        return $this->render('employee/employee_main.html.twig', [
            'controller_name' => 'EmployeeController',
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
