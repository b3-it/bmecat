<?php
declare(strict_types=1);

namespace Naugrim\BMEcat;

use JMS\Serializer\SerializerInterface;
use Naugrim\BMEcat\Nodes\Document;
use Naugrim\BMEcat\Serializer\SerializerFactory;
use Naugrim\BMEcat\Serializer\SerializerFactoryInterface;

class DocumentParser
{
    private SerializerInterface $serializer;
    private string $documentClass;

    public function __construct(
        string $documentClass = Document::class,
        ?SerializerFactoryInterface $deserializerFactory = null
    ) {
        $this->documentClass = $this->isValidDocumentClass($documentClass)
                            ? $documentClass
                            : Document::class;

        $this->serializer = ($deserializerFactory ?? new SerializerFactory(
            [$this->getDoctypeByDocumentVersion($documentClass)])
        )->create();
    }

    public function parse(string $xml): Document
    {
        return $this->serializer->deserialize($xml, $this->documentClass, 'xml');
    }

    private function getDoctypeByDocumentVersion(string $documentClass): string
    {
        if ($documentClass === \Naugrim\BMEcat\V1_2\Nodes\Document::class) {
            return '<!DOCTYPE BMECAT SYSTEM "bmecat_new_catalog_1_2.dtd">';
        }

        return '';
    }

    private function isValidDocumentClass(string $documentClass): bool
    {
        return in_array(
            $documentClass,
            [
                \Naugrim\BMEcat\V1_2\Nodes\Document::class,
                \Naugrim\BMEcat\Nodes\Document::class
            ]
        );
    }
}
