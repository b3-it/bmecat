<?php

namespace SE\Component\BMEcat;

use SE\Component\BMEcat\Exception\UnsupportedVersionException;

class SchemaValidator
{
    protected static $SCHEMA_MAP = [
        '1.2' => [
            'new_catalog' => __DIR__.'/Assets/bmecat_new_catalog_1_2.xsd',
            'update_products' => __DIR__.'/Assets/bmecat_update_products_1_2.xsd',
            'update_prices' => __DIR__.'/Assets/bmecat_update_prices_1_2.xsd',
        ],
        '2005.1' => __DIR__ . '/Assets/bmecat_2005_1.xsd',
    ];

    /**
     * Validates the given XML-string against the BMEcat XSD-files.
     *
     * @param string $xml
     *
     * @param string $version
     * @return bool
     * @throws UnsupportedVersionException
     */
    public static function isValid($xml, string $version = '2005.1', string $type = null)
    {
        $xmlValidate = new \DOMDocument();
        $xmlValidate->loadXML($xml);
        return $xmlValidate->schemaValidate(self::getSchemaForVersion($version, $type));
    }

    /**
     * @param string $version
     * @param string|null $type
     * @return string
     * @throws UnsupportedVersionException
     */
    protected static function getSchemaForVersion(string $version, string $type = null) : string
    {
        $schema = self::$SCHEMA_MAP[$version] ?? null;

        if (is_array($schema)) {
            $schema = $schema[$type] ?? null;
        }

        if ($schema) {
            return $schema;
        }

        throw new UnsupportedVersionException('Please provide an XSD schema for this version/type.');
    }
}