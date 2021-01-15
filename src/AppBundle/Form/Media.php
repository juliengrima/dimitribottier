<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class Media extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', FileType::class, array(
            'label' => false,
            'data_class' => null
        ))
                ->add('isAttending', ChoiceType::class, [
                    'choices'  => [
                        'Actualité' => [
                            'Cette saison' => 'season',
                            'Exotiques' => 'exotic',
                            'Inspirations' => 'nspiration',
                            'Nouvelles créations' => 'ncreation',
                            'Pauseries disponibles' => 'leatherwork',
                            'Précédentes créations' => 'pcreation',
                        ],
                        'Sur mesure' => [
                            'Sur mesure' => 'tailored',
                        ],
                        'Ligne Bottier' => [
                            'Ligne Bottier' => 'line',
                        ],
                        'Laissées pour compte' => [
                            'Chukka' => 'chukka',
                            'Escarpins' => 'escarpin',
                            'Richelieu' => 'richelieu',
                        ],

                    ]]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Media'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_media';
    }


}
