<?php

namespace App\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MaisonForm extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder->add('Adresse', TextType::class)
        ->add( 'nbrchambre', TextType::class);
}
public function getName(){
    return "Maison";
}
}