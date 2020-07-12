<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    /**
     * @Route("/employee", name="employee_main")
     */
    public function displayMainEmployeePage()
    {
        $repository = $this->getDoctrine()->getRepository(Employee::class);
        $allEmployees =  $repository->findAll();

        return $this->render('employee/employee_main.html.twig', [
            'allEmployees' => $allEmployees,
        ]);
    }

    /**
     * @Route("/employee/create", name="employee_create")
     */
    public function createEmployee(Request $request)
    {
        $createForm = $this->createForm(EmployeeType::class);

        $createForm->handleRequest($request);

        if($createForm->isSubmitted() && $createForm->isValid())
        {
            $employee = $createForm->getData();

            $repository = $this->getDoctrine()->getRepository(Employee::class);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($employee);
            $entityManager->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'A new employee was added successfully!'
            );

            return $this->redirectToRoute('employee_main');
        }

        return $this->render('employee/employee_create.html.twig', [
            'employeeForm' => $createForm->createView(),
        ]);
    }

    /**
     * @param Employee $employee
     * @Route("/employee/remove/{employee}", name="employee_remove")
     */
    public function deleteCar(Request $request, Employee $employee)
    {
        if ($employee === NULL)
        {
            return $this->redirectToRoute("employee_main");
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($employee);
        $entityManager->flush();

        return $this->redirectToRoute("employee_main");
    }

    /**
     * @param Employee $employee
     * @Route("/employee/edit/{employee}", name="employee_edit")
     */
    public function editCar(Request $request, Employee $employee)
    {
        $updateForm = $this->createForm(EmployeeType::class, $employee);

        $updateForm->handleRequest($request);

        if($updateForm->isSubmitted() && $updateForm->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('employee_main');
        }

        return $this->render('employee/employee_edit.html.twig', [
            'editForm' => $updateForm->createView(),
        ]);
    }
}
