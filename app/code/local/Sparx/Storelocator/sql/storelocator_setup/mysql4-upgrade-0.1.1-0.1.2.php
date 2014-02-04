<?php
$installer = $this;

$installer->startSetup();
$installer->run("

INSERT INTO {$this->getTable('storelocator')} (`locname`, `lat`, `lng`, `address`, `address2`, `city`, `state`, `postal`, `phone`, `web`, `hours1`, `email`, `hours2`, `hours3`, `category`, `status`, `country`) VALUES
('ATB Shop', '51.5586012000', '-1.7947138000', NULL, NULL, 'Swindon', 'UK', NULL, '01793 523 255', 'http://www.google.com', NULL, NULL, NULL, NULL, NULL, '0', NULL),
('Air Padre Kiteboarding', '26.2603765', '-97.24371050000002', '5709A Padre Boulevard\r\nSouth Padre Island', '5709A Padre Boulevard South Padre Island', 'South Padre Island', 'Island', '78597', '(956) 299-9463', 'http://www.airpadrekiteboarding.com', 'Mon-Sun 11am-10pm', NULL, NULL, NULL, NULL, '0', NULL),
('Sparx It solutions', '28.56285', '77.40563299999997', NULL, NULL, 'Noida', 'UP', '201301', '9654938848', 'http://www.csschopper.com', NULL, NULL, NULL, NULL, NULL, '0', 'India');

");

$installer->endSetup();
