<?php


namespace Naugrim\BMEcat\Node;

use /** @noinspection PhpUnusedAliasInspection */
    JMS\Serializer\Annotation as Serializer;

/**
 *
 * @Serializer\XmlRoot("BMECAT")
 * @Serializer\ExclusionPolicy("all")
 */
class DocumentNode extends AbstractNode
{
    /**
     * @Serializer\Expose
     * @Serializer\XmlAttribute
     */
    protected $version = '2005.1';

    /**
     * @Serializer\Expose
     * @Serializer\SerializedName("xmlns")
     * @Serializer\XmlAttribute
     */
    protected $namespace = 'http://www.bmecat.org/bmecat/2005.1';

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Node\HeaderNode")
     * @Serializer\SerializedName("HEADER")
     *
     * @var \Naugrim\BMEcat\Node\HeaderNode
     */
    protected $header;

    /**
     * @Serializer\Expose
     * @Serializer\Type("Naugrim\BMEcat\Node\NewCatalogNode")
     * @Serializer\SerializedName("T_NEW_CATALOG")
     *
     * @var NewCatalogNode
     */
    protected $catalog;

    /**
     *
     * @param string $version
     * @return DocumentNode
     */
    public function setVersion($version) : DocumentNode
    {
        $this->version = $version;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param \Naugrim\BMEcat\Node\HeaderNode $header
     * @return DocumentNode
     */
    public function setHeader(HeaderNode $header) : DocumentNode
    {
        $this->header = $header;
        return $this;
    }

    /**
     *
     * @return \Naugrim\BMEcat\Node\HeaderNode
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param NewCatalogNode $catalog
     * @return DocumentNode
     */
    public function setNewCatalog(NewCatalogNode $catalog) : DocumentNode
    {
        $this->catalog = $catalog;
        return $this;
    }

    /**
     * @return NewCatalogNode
     */
    public function getNewCatalog()
    {
        return $this->catalog;
    }
}