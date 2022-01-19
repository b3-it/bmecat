<?php
declare(strict_types=1);

namespace Naugrim\BMEcat\Serializer\Concerns;

use JMS\Serializer\Expression\ExpressionEvaluator;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

trait BuildSerializerWithExpressionLanguage
{

    private function buildSerializerWithExpressionLanguage(SerializerBuilder $serializerBuilder): Serializer
    {
        return $serializerBuilder
            ->setExpressionEvaluator(new ExpressionEvaluator($this->getExpressionLanguage()))
            ->build();
    }

    /**
     * @return ExpressionLanguage
     */
    private function getExpressionLanguage() : ExpressionLanguage
    {
        $expressionLanguage = new ExpressionLanguage();
        $expressionLanguage->register(
            'empty',
            fn($object) => $object,
            fn($args, $object) => empty($object)
        );

        return $expressionLanguage;
    }
}
