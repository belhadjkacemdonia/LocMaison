<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ClientForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Cin', TextType::class, [
            'attr' =>[
                'placeholder'=>"Saisir Cin",
                'class'=> 'form-control'
            ]
        ])
            ->add( 'nom', TextType::class, [
                'attr' =>[
                    'placeholder'=>"Saisir nom",
                    'class'=> 'form-control'
                ]
            ])
            ->add( 'prenom', TextType::class, [
                'attr' =>[
                    'placeholder'=>"Saisir prenom",
                    'class'=> 'form-control'
                ]
            ])
         ->add( 'adresse', TextType::class, [
        'attr' =>[
            'placeholder'=>"Saisir adresse",
            'class'=> 'form-control'
        ]
    ]);


    }
    public function getName(){
        return "Maison";
    }
}
{

}