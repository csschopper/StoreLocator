<?php
$installer = $this;

$installer->startSetup();
$installer->run("

ALTER TABLE {$this->getTable('storelocator')} ADD `country` varchar(55);

");

$installer->endSetup();
