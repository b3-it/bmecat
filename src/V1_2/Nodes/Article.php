<?php
declare(strict_types=1);

namespace Naugrim\BMEcat\V1_2\Nodes;

use JMS\Serializer\Annotation as Serializer;
use Naugrim\BMEcat\Nodes\Product;
use Naugrim\BMEcat\Nodes\Product\Details;
use Naugrim\BMEcat\Nodes\Product\Features;
use Naugrim\BMEcat\Nodes\Product\OrderDetails;
use Naugrim\BMEcat\Nodes\SupplierPid;

class Article extends Product
{

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Nodes\SupplierPid")
     * @Serializer\SerializedName("SUPPLIER_AID")
     *
     * @var SupplierPid|null
     */
    protected ?SupplierPid $id;

    /**
     *
     * @Serializer\Expose
     * @Serializer\SerializedName("ARTICLE_DETAILS")
     * @Serializer\Type("Naugrim\BMEcat\V1_2\Nodes\Article\Details")
     *
     * @var Details|null
     */
    protected ?Details $details;

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("ARTICLE_ORDER_DETAILS")
     * @Serializer\Type("Naugrim\BMEcat\Nodes\Product\OrderDetails")
     *
     * @var OrderDetails|null
     */
    protected ?OrderDetails $orderDetails;

    /**
     *
     * @Serializer\Expose
     * @Serializer\Type("array<Naugrim\BMEcat\Nodes\Product\Features>")
     * @Serializer\XmlList( inline=true, entry="ARTICLE_FEATURES")
     *
     * @var Features[]
     */
    protected ?array $features = null;

}
