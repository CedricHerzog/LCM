<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Stripe\Stripe;

class PaymentController extends AbstractController
{
    /**
    * @Route("/payment", name="payment")
    */
    public function index(): Response
    {
        return $this->render('payment/index.html.twig', [
            'controller_name' => 'PaymentController',
            ]
        );
    }

    /**
    * @Route("/payment/session", name="payment_session")
    */
    public function session(): Response
    {
        \Stripe\Stripe::setApiKey('sk_test_51ID6CzESwLyqwl2LvmCRBdXWCRySxQW3zBBTTaCa1kmcwi6VICU9penie92F2ZjWlJOQII5k5GyIjp5grs1O9IoY00nTMrmcgy');
        header('Content-Type: application/json');

        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => 2000,
                    'product_data' => [
                        'name' => 'Adhésion la cigogne',
                        'images' => ["https://lacigogne-alsace.fr/wp-content/uploads/2020/05/LOGO-Cigogne-copie-e1588798425596.png"],
                    ],
                ],
                'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => 'http://localhost:8000' . '/',
            'cancel_url' => 'http://localhost:8000' . '/payment',
            ]
        );

        $response = new Response(json_encode(array('id' => $checkout_session->id)));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
        
    }
    
}
