<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;


class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index() : Response
    {
    	$entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();


        return new Response('Saved new product with id '.$product->getId());


       // return $this->render('product/index.html.twig', [
        //    'controller_name' => 'ProductController',
        //]);
    }
}
