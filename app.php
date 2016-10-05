#!/usr/bin/env php
<?php
use Stefan\NameCommand;

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new NameCommand());

$application->run();
