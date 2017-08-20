<?php
/**
 * Created by PhpStorm.
 * User: Maciek
 * Date: 20.08.2017
 * Time: 16:07
 */

namespace AppBundle\Form;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class TaskFormType extends BaseFormType
{
    protected $formClass = TaskData::class;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class);
    }

}