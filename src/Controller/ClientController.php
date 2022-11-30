<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name= "client")
     */
    public function index(): Response
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/client/liste", name= "listclient")
     */
    public function listClient(): Response
    {
        $em= $this->getDoctrine()->getManager();
        $clients = $em->getRepository( "App\Entity\Client" )->findAll();
        return $this->render('client/listClient.html.twig', [
            "ListeClient"=>$clients

        ]);
    }
    /**
     * @Route("/addClient", name= "addclient")
     */
    public function addClient(Request $request): Response
    {
        $client= new Client();
        $form = $this->createForm( ClientForm::class, $client);

        $form->handleRequest($request);
        if($form->isSubmitted()and $form->isValid()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            return $this->redirectToRoute( 'listclient');
        }
        return $this->render( 'client/addClient.html.twig',[
            'FormClient'=>$form->createView()
        ]);
    }
    /**
     * @Route("/clientDelete/{id}", name= "clientDelete")
     */
    public function deleteClient($id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $client =$em->getRepository( "App\Entity\Client")->find($id);

        if($client!== null){
            $em->remove($client);
            $em->flush();
        }else{
            throw new NotFoundHttpException( "Le client d'id ".$id."n'existe pas");
        }
        return $this->redirectToRoute( 'listclient');

    }
    /**
     * @Route("/updateClient/{id}", name= "clientUpdate")
     */
    public function updateClient(Request $request, $id): Response
    {
        $em= $this->getDoctrine()->getManager();
        $client =$em->getRepository( "App\Entity\Client")->find($id);

        $editform = $this->createForm( ClientForm::class, $client);
        $editform->handleRequest($request);
        if ($editform->isSubmitted()and $editform->isValid()){
            $em->persist($client);
            $em->flush();
            return $this->redirectToRoute( 'listclient');
        }
        return $this->render( 'client/updateClient.html.twig',[
            'editFormClient'=>$editform->createView()
        ]);

    }
}
