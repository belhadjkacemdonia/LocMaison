<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' =>[
                    'placeholder'=>"firstname",
                    'class'=> 'form-control'
                ]
            ])
            ->add('lastname', TextType::class, [
                'attr' =>[
                    'placeholder'=>"lastname",
                    'class'=> 'form-control'
                ]
            ])
            ->add('cin', TextType::class, [
                'attr' =>[
                    'placeholder'=>"Cin",
                    'class'=> 'form-control'
                ]
            ])
            ->add('date_debut',DateType::class,[
            'attr' =>[
        'placeholder'=>"Saisir date debut",
        'class'=> 'form-control'
    ]
    ])
            ->add('date_retour',DateType::class,[
                'attr' =>[
                    'placeholder'=>"Saisir date retour",
                    'class'=> 'form-control'
                ]
            ])



        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
