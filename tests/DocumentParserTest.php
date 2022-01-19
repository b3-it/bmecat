<?php
declare(strict_types=1);

namespace Naugrim\BMEcat\Tests;

use Naugrim\BMEcat\DocumentParser;
use Naugrim\BMEcat\Nodes\Document;
use Naugrim\BMEcat\Serializer\SerializerFactory;
use PHPUnit\Framework\TestCase;

class DocumentParserTest extends TestCase
{

    private DocumentParser $parser;

    public function setUp(): void
    {
        $this->parser = new DocumentParser(
            \Naugrim\BMEcat\V1_2\Nodes\Document::class,
            new SerializerFactory([
                '<!DOCTYPE BMECAT SYSTEM "bmecat_new_catalog_1_2.dtd">',
            ])
        );
    }

    /**
     * @param string $xml
     * @dataProvider provideXmlData
     */
    public function testParse(string $xml): void
    {
        $doc = $this->parser->parse($xml);
        $this->assertInstanceOf(Document::class, $doc);
    }

    public function provideXmlData()
    {
        yield ['xml' => file_get_contents(__DIR__ . '/Fixtures/1.2/conceptoffice_sample.xml')];
        yield ['xml' => file_get_contents(__DIR__ . '/Fixtures/1.2/sap_sample.xml')];
    }
}
