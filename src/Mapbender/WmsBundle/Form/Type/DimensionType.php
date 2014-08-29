<?php

namespace Mapbender\WmsBundle\Form\Type;

use Mapbender\WmsBundle\Form\EventListener\DimensionSubscriber;
use Mapbender\CoreBundle\Form\DataTransformer\ObjectArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * DimensionType class
 */
class DimensionType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return "form";
    }
    
//    /**
//     * @inheritdoc
//     */
//    public function getParent()
//    {
//        return "form";
//    }

    /**
     * @inheritdoc
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
//            'data_class' => 'Mapbender\WmsBundle\Component\Dimension',
//            'origExtent' => null
        ));
    }

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $subscriber = new DimensionSubscriber($builder->getFormFactory());
//        $builder->addEventSubscriber($subscriber);
        $transformer = new ObjectArrayTransformer('Mapbender\WmsBundle\Component\Dimension');
        $builder->addModelTransformer($transformer);
        $builder
            ->add('use', 'checkbox', array('required' => true, ))
//            ->add('name', 'hidden', array('required' => true))
//            ->add('units', 'hidden', array('required' => false))
//            ->add('unitSymbol', 'hidden', array('required' => false))
//            ->add('default', 'hidden', array('required' => false))
//            ->add('multipleValues', 'hidden', array('required' => false))
//            ->add('nearestValue', 'hidden', array('required' => false))
//            ->add('current', 'hidden', array('required' => false))
            ->add('extent', 'text', array('required' => true))
        ;
    }

}