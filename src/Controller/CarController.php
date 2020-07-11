<?php

namespace App\Controller;

use App\Entity\Car;
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
    public function displayMainCarPage(Request $request)
    {
        $createForm = $this->createForm(CarType::class);
        $removeForm = $this->createForm(RemoveCarType::class);

        $createForm->handleRequest($request);

        if($createForm->isSubmitted())
        {
            $car = $createForm->getData();

            $vinNumber = $car->getVin();

            $repository = $this->getDoctrine()->getRepository(Car::class);
            $allCars = $repository->findAll();

            foreach ($allCars as $element)
            {
                if ($element->getVin() == $vinNumber)
                {
                    return $this->redirectToRoute('creation_failed_vin');
                }
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();
            //var_dump($car);
            //var_dump("gites dodano do bazy");
            return $this->redirectToRoute('success');
        }

        $removeForm->handleRequest($request);

        if ($removeForm->isSubmitted())
        {
            $car = $removeForm->getData();

            $carId = $car["id"];

            $searchedCar = $this->getDoctrine()->getRepository(Car::class)->find($carId);

            if(!$searchedCar)
            {
                return $this->redirectToRoute('remove_failed', [
                ]);
            }
            else
            {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($searchedCar);
                $entityManager->flush();

                return $this->redirectToRoute('remove_successed');
            }
        }

        return $this->render('car/car_main.html.twig', [
            'form' => $createForm->createView(),
            'removeForm' => $removeForm->createView(),
        ]);
    }

    /**
     * @Route("/display/cars", name="car_display")
     */
    public function displayCars()
    {
        $repository = $this->getDoctrine()->getRepository(Car::class);
        $allCars =  $repository->findAll();

        return $this->render('car/car_display.html.twig', [
            'allCars' => $allCars,
        ]);
    }
}
