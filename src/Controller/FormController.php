<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use App\Form\PostType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PostRepository;



class FormController extends AbstractController
{

	private  PostRepository $postRepository;

	public function __construct(PostRepository $postRepository)
	{
$this->postRepository = $postRepository;
	}

    /**
     * @Route("/form", name="form")
     */
    public function index(Request $request) 
    {
    	$post = new Post();


    	$form = $this->createForm(PostType::class, $post/**[
    		'action' => $this->generateUrl('form')
    	]*/);
    	  
        $form->handleRequest($request);

    	if ($form-> isSubmitted() && $form->isValid()){


    		
$this->postRepository->save($post);
    		return $this->redirectToRoute('task_success');
    	}
        return  $this->render('form/index.html.twig', [
            'test_form' => $form->createView(),

        ]);
    }
}
