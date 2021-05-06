<?php

namespace App\Controller;

use App\Entity\HistoricalSearch;
use App\Form\HistoricalSearchType;
use App\Repository\HistoricalCompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/historical")
 */
class HistoricalController extends AbstractController
{
    /**
     * @var HistoricalCompanyRepository
    */
    private $historicalCompanyRepository;

    public function __construct(HistoricalCompanyRepository $historicalCompanyRepository)
    {
        $this->historicalCompanyRepository = $historicalCompanyRepository;
    }

    /**
     * @Route("/{id}", name="historical_show", methods={"GET"})
     */
    public function show(Request $request, $id): Response
    {
        $search = new HistoricalSearch();

        $form = $this->createForm(HistoricalSearchType::class, $search);
        $form->handleRequest($request);

        $companyInfos = $this->historicalCompanyRepository->findByCompanyAndDate($id, $search);

        return $this->render('historical/show.html.twig', [
            'companyInfos'   => $companyInfos,
            'form' => $form->createView()
        ]);
    }
}
