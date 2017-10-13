<?php

namespace Acme\Bundle\CustomBundle\Entity;

use Akeneo\Component\Localization\Model\AbstractTranslation;
use Kiboko\Bundle\EnrichBundle\Model\DescribedTranslationInterface;
use Kiboko\Bundle\EnrichBundle\Model\DescribedTranslationTrait;
use Kiboko\Bundle\EnrichBundle\Model\LabeledTranslationInterface;
use Kiboko\Bundle\EnrichBundle\Model\LabelledTranslationTrait;
use Kiboko\Bundle\EnrichBundle\Model\PicturedTranslationInterface;
use Kiboko\Bundle\EnrichBundle\Model\PicturedTranslationTrait;

/**
 * @author Mohamed Ghoubali <mohamed@kiboko.fr>
 */
class PictogramTranslation extends AbstractTranslation implements
    LabeledTranslationInterface,
    DescribedTranslationInterface,
    PicturedTranslationInterface
{
    use DescribedTranslationTrait;
    use LabelledTranslationTrait;
    use PicturedTranslationTrait;
}