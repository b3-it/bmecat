<?php
declare(strict_types=1);

namespace Naugrim\BMEcat\V1_2\Nodes;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("T_NEW_CATALOG")
 */
class NewCatalog extends \Naugrim\BMEcat\Nodes\NewCatalog
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("array<Naugrim\BMEcat\V1_2\Nodes\Article>")
     * @Serializer\XmlList(inline = true, entry = "ARTICLE")
     *
     * @var Article[]
     */
    protected $products = [];
}
