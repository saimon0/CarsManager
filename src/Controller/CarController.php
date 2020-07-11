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
        return $this->render('car/car_main.html.twig', [
        ]);
    }

    /**
     * @Route("/car/create", name="car_create")
     */
    public function createCarPage(Request $request)
    {
        $createForm = $this->createForm(CarType::class);

        $createForm->handleRequest($request);

        if($createForm->isSubmitted() && $createForm->isValid())
        {
            $car = $createForm->getData();

            $vinNumber = $car->getVin();

            $repository = $this->getDoctrine()->getRepository(Car::class);
            $allCars = $repository->findAll();

            foreach ($allCars as $element)
            {
                if ($element->getVin() == $vinNumber)
                {
                    return $this->redirectToRoute('car_create_failed_vin');
                }
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();
            //var_dump($car);
            //var_dump("gites dodano do bazy");
            return $this->redirectToRoute('car_create_success');
        }

        $repository = $this->getDoctrine()->getRepository(Car::class);
        $allCars =  $repository->findAll();

        return $this->render('car/car_create.html.twig', [
            'form' => $createForm->createView(),
        ]);
    }

    /**
     * @Route("/car/remove", name="car_remove")
     */
    public function removeCarPage(Request $request)
    {
        $removeForm = $this->createForm(RemoveCarType::class);

        $removeForm->handleRequest($request);

        if ($removeForm->isSubmitted())
        {
            $car = $removeForm->getData();

            $carId = $car["id"];

            $searchedCar = $this->getDoctrine()->getRepository(Car::class)->find($carId);

            if(!$searchedCar)
            {
                return $this->redirectToRoute('car_remove_failed', [
                ]);
            }
            else
            {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($searchedCar);
                $entityManager->flush();

                return $this->redirectToRoute('car_remove_successed');
            }
        }
        return $this->render('car/car_remove.html.twig', [
            'removeForm' => $removeForm->createView(),
        ]);
    }

    /**
     * @Route("/car/update", name="car_update")
     */
    public function updateCarPage()
    {
        $updateForm = $this->createForm(CarType::class);
        return $this->render('car/car_update.html.twig', [
            'form' => $updateForm->createView(),
        ]);
    }

    /**
     * @Route("/car/display", name="car_display")
     */
    public function displayCarsPage()
    {
        $repository = $this->getDoctrine()->getRepository(Car::class);
        $allCars =  $repository->findAll();

        return $this->render('car/car_display.html.twig', [
            'allCars' => $allCars,
        ]);
    }

    /**
     * @Route("/car/create/success", name="car_create_success")
     */
    public function successPage()
    {
        return $this->render('car/car_create_successed.html.twig');
    }

    /**
     * @Route("car/create/failed/vin", name="car_create_failed_vin")
     */
    public function creationFailedVinPage()
    {
        return $this->render('car/car_create_failed_vin.html.twig');
    }

    /**
     * @Route("car/remove/success", name="car_remove_successed")
     */
    public function removeSuccessPage()
    {
        return $this->render('car/car_remove_successed.html.twig');
    }

    /**
     * @Route("car/remove/failed", name="car_remove_failed")
     */
    public function removeFailPage()
    {
        return $this->render('car/car_remove_failed.html.twig');
    }
}
