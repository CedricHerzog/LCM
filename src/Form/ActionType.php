<?php

namespace App\Form;

use App\Entity\Action;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ActionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('type')
        ->add('amount')
        ->add('origin', EntityType::class, [
            // looks for choices from this entity
            'class' => User::class,
            
            // uses the User.email property as the visible option string
            'choice_label' => 'email',
            
            // used to render a select box, check boxes or radios
            // 'multiple' => true,
            // 'expanded' => true,
            ]);
        }
        
        public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults([
                'data_class' => Action::class,
                ]);
            }
        }
        