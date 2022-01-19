<?php
declare(strict_types=1);

namespace Naugrim\BMEcat\Serializer;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\Visitor\Factory\XmlDeserializationVisitorFactory;
use Naugrim\BMEcat\Serializer\Concerns\BuildSerializerWithExpressionLanguage;

final class SerializerFactory implements SerializerFactoryInterface
{
    use BuildSerializerWithExpressionLanguage;

    private array $xmlCustomDocTypes;

    public function __construct(array $xmlCustomDocTypeWhitelist = [])
    {
        $this->xmlCustomDocTypes = $xmlCustomDocTypeWhitelist;
    }

    public function create(): SerializerInterface
    {
        return $this->buildSerializerWithExpressionLanguage(
            SerializerBuilder::create()
                ->setDeserializationVisitor(
                    'xml',
                    $this->createDeserializationVisitorFactory()
                )
        );
    }

    private function createDeserializationVisitorFactory(): XmlDeserializationVisitorFactory
    {
        $factory = new XmlDeserializationVisitorFactory();

        $factory->setDoctypeWhitelist(
            array_filter(
                $this->xmlCustomDocTypes,
                static fn($doctype) => (is_string($doctype) && !empty($doctype))
            )
        );

        return $factory;
    }
}
