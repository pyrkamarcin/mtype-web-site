<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,
                [
                    'label' => 'Email',
                    'label_attr' => ['class' => 'col-sm-2 col-form-label'],
                    'attr' => ['class' => 'form-control'],
                ]
            )
            ->add('username', TextType::class,
                [
                    'label' => 'Login',
                    'label_attr' => ['class' => 'col-sm-2 col-form-label'],
                    'attr' => ['class' => 'form-control'],
                ]
            )
            ->add('password', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'first_options' => ['label' => 'Password',
                        'label_attr' => ['class' => 'col-sm-2 col-form-label'],
                        'attr' => ['class' => 'form-control'],],
                    'second_options' => ['label' => 'Repeat Password',
                        'label_attr' => ['class' => 'col-sm-2 col-form-label'],
                        'attr' => ['class' => 'form-control']
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_csrf_token',
            'csrf_token_id' => 'register',
        ));
    }
}
