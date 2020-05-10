<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Whatever;
use App\Form\WhateverType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class WhateverController extends AbstractController
{
    /**
     * @Route("/whatever", name="whatever")
     */
    public function index()
    {
    	$whatever = new Whatever;
    	$form = $this->createForm(WhateverType::class, $whatever);
    		if ($form->isSubmitted() && $form->isValid()){

    	return $this->redirectToRoute('task_success');
}
        return $this->render('whatever/index.html.twig', [
                'test_form' => $form->createView(),
        ]);
    }
}
