<?php

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::SKIP, [
        'vendor/*',
        'storage/*',
        'tools/*',
        "_ide_helper.php",
        "_ide_helper_models.php",
    ]);
    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_74);
    $parameters->set(Option::ENABLE_CACHE, true);
    //$parameters->set(Option::AUTO_IMPORT_NAMES, true);
    $services = $containerConfigurator->services();

    $containerConfigurator->import(PHPUnitSetList::PHPUNIT_90);
};
