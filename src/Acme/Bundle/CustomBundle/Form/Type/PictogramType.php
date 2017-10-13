<?php

namespace Acme\Bundle\CustomBundle\Form\Type;

use Kiboko\Bundle\EnrichBundle\Form\EventListener\PicturedFormListener;
use Pim\Bundle\CustomEntityBundle\Form\Type\CustomEntityType;
use Pim\Bundle\EnrichBundle\Form\Subscriber\DisableFieldSubscriber;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class PictogramType extends CustomEntityType
{
    private $formListener;

    public function __construct(PicturedFormListener $formListener)
    {
        $this->formListener = $formListener;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add(
                'labelFallback',
                'text',
                [
                    'label'             => 'my_pictogram.form.field.labelFallback.label'
                ]
            )
            ->add(
                'label',
                'pim_translatable_field',
                [
                    'label'             => 'my_pictogram.form.field.label.label',
                    'field'             => 'label',
                    'translation_class' => $options['translation_class'],
                    'entity_class'      => $options['data_class'],
                    'property_path'     => 'translations',
                ]
            )
            ->add(
                'descriptionFallback',
                'textarea',
                [
                    'label'             => 'my_pictogram.form.field.descriptionFallback.label'
                ]
            )
            ->add(
                'description',
                'pim_translatable_field',
                [
                    'label'             => 'my_pictogram.form.field.description.label',
                    'field'             => 'description',
                    'translation_class' => $options['translation_class'],
                    'entity_class'      => $options['data_class'],
                    'property_path'     => 'translations',
                    'widget'            => 'textarea'
                ]
            )
            ->add(
                'pictureFallback',
                'kiboko_enrich_media',
                [
                    'label'             => 'my_pictogram.form.field.pictureFallback.label',
                ]
            )
            ->add(
                'picture',
                'kiboko_translatable_field',
                [
                    'label'             => 'my_pictogram.form.field.picture.label',
                    'field'             => 'picture',
                    'translation_class' => $options['translation_class'],
                    'entity_class'      => $options['data_class'],
                    'property_path'     => 'translations',
                    'widget'            => 'kiboko_enrich_media'
                ]
            )
            ->addEventSubscriber(new DisableFieldSubscriber('code'))
            ->addEventSubscriber($this->formListener);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(['translation_class']);
    }

    public function getName()
    {
        return 'acme_enrich_pictogram';
    }
}
