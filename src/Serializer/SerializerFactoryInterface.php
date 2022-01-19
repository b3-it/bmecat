<?php
declare(strict_types=1);

namespace Naugrim\BMEcat\Serializer;

use JMS\Serializer\SerializerInterface;

interface SerializerFactoryInterface
{
    public function create(): SerializerInterface;
}
