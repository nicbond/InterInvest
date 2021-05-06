<?php

namespace App\Controller;

use App\Entity\HistoricalSearch;
use App\Form\HistoricalSearchType;
use App\Repository\HistoricalCompanyRepository;
use App\Repository\HistoricalAddressRepository;
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

    /**
     * @var HistoricalAddressRepository
    */
    private $historicalAddressRepository;

    public function __construct(HistoricalCompanyRepository $historicalCompanyRepository, HistoricalAddressRepository $historicalAddressRepository)
    {
        $this->historicalCompanyRepository = $historicalCompanyRepository;
        $this->historicalAddressRepository = $historicalAddressRepository;
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
        $addressInfos = $this->historicalAddressRepository->findByCompanyAndDate($id, $search);

        return $this->render('historical/show.html.twig', [
            'companyInfos'   => $companyInfos,
            'addressInfos'   => $addressInfos,
            'form' => $form->createView()
        ]);
    }
}
