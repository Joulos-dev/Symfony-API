<?php

namespace App\Controller;

use App\Entity\Country;
use App\Form\CountryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CountryController extends AbstractController
{
    #[Route('/country', name: 'app_country')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $country = new Country();


        $form = $this -> createForm(CountryType::class, $country);

        // écoute tout ce qui se passe dans $_GET $_POST etc
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $entityManager->persist($country);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('country/index.html.twig', [
            'controller_name' => 'CountryController',
            'countryForm' => $form->createView()
        ]);
    }
}
