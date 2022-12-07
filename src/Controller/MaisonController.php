<?php

namespace App\Controller;

use App\Entity\Maison;
use App\Form\MaisonForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class MaisonController extends AbstractController
{
    /**
     * @Route("/maison", name="maison")
     */
    public function index()
    {
        $repo= $this->getDoctrine()->getRepository(Maison::class);

        $Maisons = $repo->findAll();

        return $this->render('maison/index.html.twig', [
            'controller_name' => 'MaisonController',
            'Maisons'=>$Maisons
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        return $this->render('maison/home.html.twig');
    }


    /**
     * @Route("/maison/liste", name= "listmaison")
     */
    public function listMaison(): Response
    {
        $em= $this->getDoctrine()->getManager();
        $maisons = $em->getRepository( "App\Entity\Maison" )->findAll();
        return $this->render('maison/listMaison.html.twig', [
            "ListeMaison"=>$maisons

        ]);
    }

    /**
     * @Route("/addMaison", name= "addmaison")
     */
    public function addMaison(Request $request): Response
    {
        $maison= new Maison();
        $form = $this->createForm( MaisonForm::class, $maison);

        $form->handleRequest($request);
        if($form->isSubmitted()and $form->isValid()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($maison);
            $em->flush();
            return $this->redirectToRoute( 'listmaison');
        }
        return $this->render( 'maison/addMaison.html.twig',[
         'FormMaison'=>$form->createView()
        ]);
    }
    /**
     * @Route("/maisonDelete/{id}", name= "maisonDelete")
     */
    public function deleteMaison($id): Response
    {
        $em=$this->getDoctrine()->getManager();
        $maison =$em->getRepository( "App\Entity\Maison")->find($id);

        if($maison!== null){
            $em->remove($maison);
            $em->flush();
        }else{
            throw new NotFoundHttpException( "La maison d'id ".$id."n'existe pas");
        }
        return $this->redirectToRoute( 'listmaison');

    }
    /**
     * @Route("/updateMaison/{id}", name= "maisonUpdate")
     */
    public function updateMaison(Request $request, $id): Response
    {
        $em= $this->getDoctrine()->getManager();
        $maison =$em->getRepository( "App\Entity\Maison")->find($id);

        $editform = $this->createForm( MaisonForm::class, $maison);
        $editform->handleRequest($request);
        if ($editform->isSubmitted()and $editform->isValid()){
            $em->persist($maison);
            $em->flush();
            return $this->redirectToRoute( 'listmaison');
        }
        return $this->render( 'maison/updateMaison.html.twig',[
            'editFormMaison'=>$editform->createView()
        ]);

    }
    /**
     * @Route("/detailMaison/12", name= "detMaison")
     */
    public function detailmaison(): Response
    {
        $em= $this->getDoctrine()->getManager();
        $maisons = $em->getRepository( "App\Entity\Maison" )->findAll();
        return $this->render('maison/detMaison.html.twig', [
            "detailMaison"=>$maisons

        ]);
    }

    /**
     * @Route("/searchMaison", name= "searchMaison")
     */
    public function searchMaison(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $maisons = null;

        if($request->isMethod( 'POST')){
            $adresse = $request->request->get( "input_adresse");
            $query = $em->createQuery(
                "SELECT m FROM App\Entity\Maison m where m.adresse LIKE '".$adresse."'");
            $maisons = $query->getResult();
        }
        return $this->render( 'maison/searchMaison.html.twig',[
            'maisons'=>$maisons]);

    }

}
