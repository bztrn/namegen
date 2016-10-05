<?php

namespace Stefan;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Phois\Whois\Whois;

class NameCommand extends Command {

  const PFX = [
'al',
'el',
'il',
'ka',
'ko',
'ki',
'ku',
'ke',
'la',
'le',
'lo',
'lu',
'li',
'ma',
'mi',
'me',
'pro',
'con',
'ho',
'qu',
're',
'mo',
'mu',
'ul',
'za',
];

const SFX = [
  'a',
  'con',
  'cus',
  'e',
  'i',
  'io',
  'kus',
  'o',
  'oc',
  'ol',
  'os',
  'u',
  'um',
  'us'
];

  protected function configure() {
    $this->setName('name');
  }
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $taken = [];
    $free = [];

    foreach (self::PFX as $p) {
      foreach(self::SFX as $s) {
        $name = $p . 'med' . $s;
        $sld = $name.'.de';
        $domain = new Whois($sld);
        $output->writeln($sld . ';' . ($domain->isAvailable() ? 'avail' : 'navail'));
      }
    }
  }


}
