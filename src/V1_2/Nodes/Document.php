<?php


namespace Naugrim\BMEcat\V1_2\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("BMECAT")
 * @Serializer\ExclusionPolicy("all")
 */
class Document extends \Naugrim\BMEcat\Nodes\Document
{
    /**
     * @Serializer\Expose
     * @Serializer\XmlAttribute
     */
    protected string $version = '1.2';

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("xmlns")
     * @Serializer\XmlAttribute
     */
    protected string $namespace = 'http://www.bmecat.org/bmecat/1.2';

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\V1_2\Nodes\NewCatalog")
     * @Serializer\SerializedName("T_NEW_CATALOG")
     *
     * @var NewCatalog|null
     */
    protected $catalog = null;

}
