<?php

namespace Acme\Bundle\CustomBundle\Entity;

use Akeneo\Component\Localization\Model\TranslatableInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Kiboko\Bundle\EnrichBundle\Model\DescribedInterface;
use Kiboko\Bundle\EnrichBundle\Model\DescribedTrait;
use Kiboko\Bundle\EnrichBundle\Model\LabeledInterface;
use Kiboko\Bundle\EnrichBundle\Model\LabeledTrait;
use Kiboko\Bundle\EnrichBundle\Model\PicturedInterface;
use Kiboko\Bundle\EnrichBundle\Model\PicturedTrait;
use Kiboko\Bundle\EnrichBundle\Model\TranslatableCustomEntityTrait;
use Pim\Component\ReferenceData\Model\ReferenceDataInterface;

/**
 * @author Mohamed Ghoubali <mohamed@kiboko.fr>
 */
class Pictogram implements
    TranslatableInterface,
    ReferenceDataInterface,
    DescribedInterface,
    LabeledInterface,
    PicturedInterface
{
    use TranslatableCustomEntityTrait;
    use DescribedTrait;
    use LabeledTrait;
    use PicturedTrait;

    /**
     * Pictogram constructor.
     */
    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    /**
     * Get translation full qualified class name
     *
     * @return string
     */
    public function getTranslationFQCN()
    {
        return PictogramTranslation::class;
    }

    /**
     * Returns the custom entity name used in the configuration
     * Used to map row actions on datagrid
     *
     * @return string
     */
    public function getCustomEntityName()
    {
        return 'pictogram';
    }

    /**
     * @return string
     */
    public static function getLabelProperty()
    {
        return 'label';
    }

    /**
     * @return string
     */
    public static function getFallbackLabelProperty()
    {
        return 'labelFallback';
    }

}
