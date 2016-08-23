<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 23/08/2016
 * Time: 10:01
 */

namespace WebLinks\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class LinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'textarea')
                ->add('url', 'textarea')
                ;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'link';
    }
}