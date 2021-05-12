<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Localisation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('image' , FileType::class , [
                    'label' => 'upload image',
                    'required' => true,
                    'data_class' => null,

            ])
            ->add('prix')
            ->add('description')
            ->add('Localisation',EntityType::class,[
                'class' => Localisation::class,
                'choice_label' => 'nom',
                'label' => 'Localisation'
            ])
            ->add('category', EntityType::class ,[
                'class' => Category::class,
                'choice_label' => 'titre',
                'label' => 'Categorie'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,

        ]);
    }
}