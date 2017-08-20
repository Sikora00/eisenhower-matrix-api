<?php
/**
 * Created by PhpStorm.
 * User: Maciek
 * Date: 20.08.2017
 * Time: 16:08
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BaseFormType extends AbstractType
{
    protected $formClass = '';

    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults([
           'data_class' => $this->formClass,
           'csrf_protection' => false,
           'allow_extra_fields' => true
       ]);
    }

    public function getBlockPrefix()
    {
        return null;
    }

}