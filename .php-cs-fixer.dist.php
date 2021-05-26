<?php

require_once(__DIR__ . '/tools/php-cs-fixer/vendor/autoload.php');

use Permafrost\PhpCsFixerRules\Finders\LaravelProjectFinder;
use Permafrost\PhpCsFixerRules\Rulesets\SpatieRuleset;
use Permafrost\PhpCsFixerRules\SharedConfig;

// optional: chain additional custom Finder options:
$finder = LaravelProjectFinder::create(__DIR__);

$config =  SharedConfig::create($finder, new SpatieRuleset());

$rules = $config->getRules();

$rules["trailing_comma_in_multiline"] = $rules["trailing_comma_in_multiline_array"];
unset($rules["trailing_comma_in_multiline_array"]);#

$rules['ordered_imports'] = ['sort_algorithm' => 'alpha'];

unset($rules["class_attributes_separation"]);


$config->setRules($rules);

return $config;
