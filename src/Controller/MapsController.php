<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Shop;
use App\Entity\Exchange;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class MapsController extends AbstractController
{
    /**
     * @Route("/maps/shops", name="maps_shops")
     */
    public function maps_shops(): Response
    {
        $shops = $this->getDoctrine()
        ->getRepository(Shop::class)
        ->findAll();
        
        if (!$shops) {
            throw $this->createNotFoundException(
                'No shop found'
            );
        }
        
        return $this->render('maps/index.html.twig', [
            'shops' => $shops,
            'controller_name' => 'MapsController',
        ]);
    }

    /**
     * @Route("/maps/exchanges", name="maps_exchanges")
     */
    public function maps_exchanges(): Response
    {
        $shops = $this->getDoctrine()
        ->getRepository(Exchange::class)
        ->findAll();
        
        if (!$shops) {
            throw $this->createNotFoundException(
                'No exchange found'
            );
        }
        
        return $this->render('maps/index.html.twig', [
            'shops' => $shops,
            'controller_name' => 'MapsController',
        ]);
    }
}
