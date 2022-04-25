<?php

namespace App\Form;

use App\Entity\Commentaries;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CommentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' =>  'Votre Email',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre email',
                ],
            ])

            ->add('username', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre nom',
                ],
            ])
            ->add('comment', TextType::class, [
                'label' => 'Votre commentaire',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre commentaire',
                ],
            ])
            ->add('rgpd', CheckboxType::class, [
                'label' => 'J\'accepte que mon commentaire soit publié sur le site',
                'attr' => [
                    'class' => 'form-check-input',
                ],
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les conditions générales d\'utilisation',
                    ]),
                ],
            ])
            ->add('parentid', HiddenType::class, [
                'mapped' => false,
            ])

            ->add('envoyer', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaries::class,
        ]);
    }
}
