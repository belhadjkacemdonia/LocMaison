<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'attr' =>[
                    'placeholder'=>"Username...",
                    'class'=> 'form-control'
                ]
            ])


            ->add('email',EmailType::class, [
                'attr' =>[
                    'placeholder'=>"Email...",
                    'class'=> 'form-control'
                ]
            ])
            ->add('password', PasswordType::class, [
                'attr' =>[
                    'placeholder'=>"Password...",
                    'class'=> 'form-control'
                ]
            ])
            ->add('confirm_password', PasswordType::class, [
                'attr' =>[
                    'placeholder'=>"Confirm_password...",
                    'class'=> 'form-control'
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
