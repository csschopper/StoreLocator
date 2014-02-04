<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table storelocator(storelocator_id int not null auto_increment, locname varchar(255), lat varchar(255), lng varchar(255), address varchar(255), address2 varchar(255), city varchar(255), state varchar(255), postal varchar(255), phone varchar(255),web varchar(255),hours1 varchar(255),email varchar(255),hours2 varchar(255),hours3 varchar(255),category varchar(255),status varchar(55), primary key(storelocator_id));
		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 
