<?php

namespace App\Controller;

use App\Entity\Jurisdiction;
use App\Form\JurisdictionType;
use App\Repository\JurisdictionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/jurisdiction")
 */
class JurisdictionController extends AbstractController
{
    /**
     * @Route("/", name="jurisdiction_index", methods={"GET"})
     */
    public function index(JurisdictionRepository $jurisdictionRepository): Response
    {
        return $this->render('jurisdiction/index.html.twig', [
            'jurisdictions' => $jurisdictionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="jurisdiction_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $jurisdiction = new Jurisdiction();
        $form = $this->createForm(JurisdictionType::class, $jurisdiction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jurisdiction);
            $entityManager->flush();

            return $this->redirectToRoute('jurisdiction_index');
        }

        return $this->render('jurisdiction/new.html.twig', [
            'jurisdiction' => $jurisdiction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="jurisdiction_show", methods={"GET"})
     */
    public function show(Jurisdiction $jurisdiction): Response
    {
        return $this->render('jurisdiction/show.html.twig', [
            'jurisdiction' => $jurisdiction,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="jurisdiction_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Jurisdiction $jurisdiction): Response
    {
        $form = $this->createForm(JurisdictionType::class, $jurisdiction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jurisdiction_index');
        }

        return $this->render('jurisdiction/edit.html.twig', [
            'jurisdiction' => $jurisdiction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="jurisdiction_delete", methods={"POST"})
     */
    public function delete(Request $request, Jurisdiction $jurisdiction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jurisdiction->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($jurisdiction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('jurisdiction_index');
    }
}
