<?php

namespace App\Form;


use App\Entity\Modele;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class MaisonForm extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder->add('Adresse', TextType::class, [
        'attr' =>[
            'placeholder'=>"Saisir l'adresse",
            'class'=> 'form-control'
        ]
    ])
        ->add( 'nbr_chambre', IntegerType::class, [
            'attr' =>[
                'placeholder'=>"Saisir nombre du chambre",
                'class'=> 'form-control'
            ]
        ])
        ->add( 'sallebain', IntegerType::class, [
            'attr' =>[
                'placeholder'=>"Saisir nombre de salle de bain",
                'class'=> 'form-control'
            ]
        ]);





}
public function getName(){
    return "Maison";
}
}