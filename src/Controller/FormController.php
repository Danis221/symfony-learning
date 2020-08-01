<?php

namespace App\Controller;

use App\Entity\Post;
use App\Event\PostRegistrationTest;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\EventDispatcher\EventDispatcher;

class FormController extends AbstractController
{

    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @Route("/form", name="form")
     */
    public function flush(Request $request)
    {
        $post = new Post();

        $form = $this->createForm(PostType::class, $post/**[
         * 'action' => $this->generateUrl('form')
         * ]*/);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->postRepository->save($post);

            return $this->redirectToRoute('form_list');

        }
        return $this->render('form/index.html.twig', [
            'test_form' => $form->createView(),

        ]);

        $event = new PostRegistrationTest($post);
        $dispatcher->dispatch(PostRegistrationTest::NAME, $event);
    }

    /**
     * @Route("/form/data/list", name="form_list")
     */
    public function list(): Response
    {
        {

        }
        return $this->render('data_change/index.html.twig', [
            'posts' => $this->postRepository->findAll()
        ]);

    }

    /**
     * @Route("/form/update/{id}", name="form_update")
     */
    public function update(Post $post, Request $request): Response
    {
        $form = $this->createForm(PostType::class, $post/**[
         * 'action' => $this->generateUrl('form')
         * ]*/);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->postRepository->update($post);

            return $this->redirectToRoute('form_list');
        }
        return $this->render('form/index.html.twig', [
            'test_form' => $form->createView(),

        ]);
    }


    /**
     * @Route("/form/delete/{id}", name="form_delete")
     */
    public function delete(Post $post, Request $request): Response
    {
        //$form = $this->createForm(PostType::class, $post);

        //$form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
        if ($this->isCsrfTokenValid('delete' . $post->getId(), $request->request->get('_token'))) {
            $this->postRepository->delete($post);

            return $this->redirectToRoute('form_list');
        }
    }

}