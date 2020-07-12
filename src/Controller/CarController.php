<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Employee;
use App\Form\CarType;
use App\Form\RemoveCarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car_main")
     */
    public function displayMainCarPage()
    {
        $repository = $this->getDoctrine()->getRepository(Car::class);
        $allCars = $repository->findAll();

        return $this->render('car/car_main.html.twig', [
            'allCars' => $allCars,
        ]);
    }

    /**
     * @Route("/car/create", name="car_create")
     */
    public function createCar(Request $request)
    {
        $createForm = $this->createForm(CarType::class);

        $createForm->handleRequest($request);

        if ($createForm->isSubmitted() && $createForm->isValid()) {
            $car = $createForm->getData();

            $repository = $this->getDoctrine()->getRepository(Car::class);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();

            $this->get('session')->getFlashBag()->add(
                'notice',
                'A new car was added successfully!'
            );

            return $this->redirectToRoute('car_main');
        }

        return $this->render('car/car_create.html.twig', [
            'form' => $createForm->createView(),
        ]);
    }

    /**
     * @param Car $car
     * @Route("/car/remove/{car}", name="car_remove")
     */
    public function deleteCar(Request $request, Car $car)
    {
        if ($car === NULL)
        {
            return $this->redirectToRoute("car_main");
        }

        $entityManager = $this->getDoctrine()->getManager();
        $car->setUser(NULL);
        $entityManager->remove($car);
        $entityManager->flush();

        return $this->redirectToRoute("car_main");
    }

    /**
     * @param Car $car
     * @Route("/car/edit/{car}", name="car_edit")
     */
    public function editCar(Request $request, Car $car)
    {
        $updateForm = $this->createForm(CarType::class, $car);

        $updateForm->handleRequest($request);

        if ($updateForm->isSubmitted() && $updateForm->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('car_main');
        }

        return $this->render('car/car_edit.html.twig', [
            'editForm' => $updateForm->createView(),
        ]);
    }

    /**
     * @param Car $car
     * @Route("/car/service/{car}", name="car_service")
     */
    public function serviceCar(Request $request, Car $car)
    {


        return $this->render('car/car_service.html.twig', [

        ]);
    }


}