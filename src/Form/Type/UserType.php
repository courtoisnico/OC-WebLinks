<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 24/08/2016
 * Time: 16:40
 */

namespace WebLinks\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text')
            ->add('password', 'repeated', array(
                'type'              =>  'password',
                'invalid_message'   => 'The password fields must match.',
                'options'           =>  array('required' => true),
                'first_options'     =>  array('label' => 'Password'),
                'second_options'    =>  array('label' => 'Repeat password'),
            ))
            ->add('role', 'choice', array(
                'choices' => array('ROLE_ADMIN' => 'Admin', 'ROLE_USER' => 'User')
            )) ;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'user';
    }
}