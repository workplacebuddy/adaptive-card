#!/usr/bin/env php
<?php
declare(strict_types=1);

use AdaptiveCardGenerator\Command\FetchSchemaCommand;
use AdaptiveCardGenerator\Command\GenerateCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\ErrorHandler\Debug;

require './vendor/autoload.php';

Debug::enable();

$application = new Application();
$application->setName('Adaptive Card generator');

$application->addCommand(new FetchSchemaCommand());
$application->addCommand(new GenerateCommand());

$application->run();

