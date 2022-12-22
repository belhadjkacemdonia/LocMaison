<?php

namespace App\Controller;

use App\Entity\Location;
use App\Form\InscriptionType;
use App\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(): Response
    {
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }
    /**
     * @Route("/rentMaison/{id}",  name= "rentMaison" , methods={"GET","POST"})
     */

    public function rent(Request $request): Response
    {
        $reservation = new Location();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $brochureFile */
            $file = $form->get('photo')->getData();

            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $safeFilename = $originalFilename;
            $filename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

            $file->move('./uploads',$filename);
            $reservation->setPhoto($filename);

            $em= $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('app_reservation');
        }

        return $this->render('reservation/addrent.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);

    }
}
