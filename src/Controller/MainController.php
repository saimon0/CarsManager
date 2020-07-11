<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Form\RemoveCarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/remove/success", name="remove_succesed")
     */
    public function removeSuccessPage()
    {
        return $this->render('main/remove_successed.html.twig');
    }

    /**
     * @Route("/remove/failed", name="remove_failed")
     */
    public function removeFailPage()
    {
        return $this->render('main/remove_failed.html.twig');
    }

    /**
     * @Route("/create/success", name="create_success")
     */
    public function successPage()
    {
        return $this->render('main/create_success.html.twig');
    }

    /**
     * @Route("/creation/failed/vin", name="creation_failed_vin")
     */
    public function creationFailedVinPage()
    {
        return $this->render('main/creation_failed_vin.html.twig');
    }

    /**
     * @Route("/main", name="main")
     */
    public function index(Request $request)
    {
        return $this->render('main/main_page.html.twig', [
        ]);
    }
}