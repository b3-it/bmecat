<?php


namespace Naugrim\BMEcat;

use JMS\Serializer\Expression\ExpressionEvaluator;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializationContext;
use Naugrim\BMEcat\Nodes\Contracts\NodeInterface;
use Naugrim\BMEcat\Nodes\Document;
use Naugrim\BMEcat\Exception\MissingDocumentException;
use Naugrim\BMEcat\Serializer\Concerns\BuildSerializerWithExpressionLanguage;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class DocumentBuilder
{
    use BuildSerializerWithExpressionLanguage;

    /**
     *
     * @var Serializer
     */
    protected $serializer;

    /**
     *
     * @var SerializationContext
     */
    protected $context;

    /**
     *
     * @var Document
     */
    protected $document;

    /**
     *
     * @param Serializer $serializer
     * @param SerializationContext $context
     */
    public function __construct(Serializer $serializer = null, $context = null)
    {
        if ($serializer === null) {
            $serializer = $this->buildSerializerWithExpressionLanguage(SerializerBuilder::create());
        }

        if ($context === null) {
            $context = SerializationContext::create();
        }

        $this->context    = $context;
        $this->serializer = $serializer;
    }

    /**
     *
     * @param Serializer $serializer
     * @return DocumentBuilder
     */
    public static function create(Serializer $serializer = null)
    {
        return new self($serializer);
    }

    /**
     *
     * @return Serializer
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     *
     * @return SerializationContext
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param NodeInterface $document
     * @return DocumentBuilder
     */
    public function setDocument(NodeInterface $document)
    {
        $this->document = $document;
        return $this;
    }

    /**
     *
     * @return Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     *
     * @throws MissingDocumentException
     * @return string
     */
    public function toString()
    {
        if (($document = $this->getDocument()) === null) {
            throw new MissingDocumentException('Please call ::setDocument() first.');
        }

        return $this->serializer->serialize($document, 'xml', $this->context);
    }
}
