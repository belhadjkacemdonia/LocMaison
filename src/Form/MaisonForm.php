<?php

namespace App\Form;


use App\Entity\Model;
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
        ])
        ->add( 'surface', IntegerType::class, [
            'attr' =>[
                'placeholder'=>"surface",
                'class'=> 'form-control'
            ]
        ])
        ->add( 'price', IntegerType::class, [
            'attr' =>[
                'placeholder'=>"price",
                'class'=> 'form-control'
            ]
        ])

        ->add( 'Modele', EntityType::class, [
            'class'=>Model::class,
            'choice_label'=>'libelle'
        ])
        ->add( 'photo', FileType::class,
            array('attr'=> ['class'=>'form-control'],'label'=>'photo(png, jpg, jpeg, gif)'))
    ;





}
public function getName(){
    return "Maison";
}
}