<?php
declare(strict_types=1);

namespace Naugrim\BMEcat\V1_2\Nodes\Article;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Product\Status;

/**
 *
 * @Serializer\XmlRoot("ARTICLE_DETAILS")
 */
class Details extends \Naugrim\BMEcat\Nodes\Product\Details
{
    /**
     * @Serializer\Expose
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MANUFACTURER_AID")
     *
     * @var string|null
     */
    protected ?string $manufacturerPid;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("array<Naugrim\BMEcat\Nodes\Product\Status>")
     * @Serializer\XmlList(inline=true, entry="ARTICLE_STATUS")
     *
     * @var Status[]
     */
    protected array $productStatus = [];

}
