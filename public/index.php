<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use App\Services\Converters\StringToNumberConverter;
use App\Services\Generators\RandomStringGenerator;
use App\Services\Converters\Rot13Converter;
use App\Services\Generators\ArrayGenerator;
use App\Data\GeneratorCollection;

$container = new ContainerBuilder();
$container->register(RandomStringGenerator::class)
    ->setArguments(['ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 6])
    ->setPublic(true)
;
$container->register(ArrayGenerator::class)
    ->setArguments([new Reference(RandomStringGenerator::class), 3])
    ->setPublic(true)
;
$container->register(Rot13Converter::class)->setPublic(true);
$container->register(StringToNumberConverter::class)->setPublic(true);
$container->compile();

$generators = [$container->get(RandomStringGenerator::class), $container->get(ArrayGenerator::class)];
$converters = [$container->get(Rot13Converter::class), $container->get(StringToNumberConverter::class)];
$collection = new GeneratorCollection();

$count = rand(1, 10);
for ($i = 0; $i < $count; $i++) {
    $collection->add($generators[rand(0, 1)]);
}

foreach ($collection->getAll() as $generator) {
    echo get_class($generator) . PHP_EOL;
    $generatedValue = $generator->generate();

    if (is_string($generatedValue)) {
        $generatedValue = [$generatedValue];
    }

    foreach ($generatedValue as $value) {
        echo 'Generated: ' . $value . ' converted: ' . $converters[rand(0, 1)]->convert($value) . PHP_EOL;
    }
}
