<?php

namespace SymfonyGallery\GalleryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserFolderType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('folderName')
            ->add('description')
            ->add('pictureId')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SymfonyGallery\GalleryBundle\Entity\UserFolder'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'symfonygallery_gallerybundle_userfolder';
    }
}
