<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "t3events".
 *
 * Auto generated 27-02-2013 15:23
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Events',
	'description' => 'Manage events, show teasers, list and single views.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '0.5.0',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Dirk Wenzel, Michael Kasten',
	'author_email' => 'wenzel@webfox01.de, kasten@webfox01.de',
	'author_company' => 'Agentur Webfox, Agentur Webfox',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:126:{s:9:"ChangeLog";s:4:"a6c9";s:12:"ext_icon.gif";s:4:"fed2";s:17:"ext_localconf.php";s:4:"60f1";s:14:"ext_tables.php";s:4:"1127";s:14:"ext_tables.sql";s:4:"3026";s:24:"ext_typoscript_setup.txt";s:4:"cf56";s:21:"ExtensionBuilder.json";s:4:"7d1f";s:38:"Classes/Controller/EventController.php";s:4:"ef88";s:46:"Classes/Controller/EventLocationController.php";s:4:"27df";s:42:"Classes/Controller/OrganizerController.php";s:4:"2da3";s:44:"Classes/Controller/PerformanceController.php";s:4:"546e";s:39:"Classes/Controller/TeaserController.php";s:4:"1ef4";s:44:"Classes/Controller/TicketClassController.php";s:4:"d218";s:38:"Classes/Controller/VenueController.php";s:4:"548d";s:39:"Classes/Domain/Model/AbstractDemand.php";s:4:"69bf";s:32:"Classes/Domain/Model/Country.php";s:4:"b7bc";s:30:"Classes/Domain/Model/Event.php";s:4:"aa2b";s:36:"Classes/Domain/Model/EventDemand.php";s:4:"b234";s:38:"Classes/Domain/Model/EventLocation.php";s:4:"b403";s:34:"Classes/Domain/Model/EventType.php";s:4:"10c3";s:30:"Classes/Domain/Model/Genre.php";s:4:"4a06";s:34:"Classes/Domain/Model/Organizer.php";s:4:"e95d";s:36:"Classes/Domain/Model/Performance.php";s:4:"78d0";s:42:"Classes/Domain/Model/PerformanceStatus.php";s:4:"09c6";s:31:"Classes/Domain/Model/Teaser.php";s:4:"c00b";s:37:"Classes/Domain/Model/TeaserDemand.php";s:4:"5562";s:36:"Classes/Domain/Model/TicketClass.php";s:4:"bdad";s:30:"Classes/Domain/Model/Venue.php";s:4:"d3c1";s:48:"Classes/Domain/Repository/AbstractRepository.php";s:4:"1859";s:53:"Classes/Domain/Repository/EventLocationRepository.php";s:4:"7d0c";s:45:"Classes/Domain/Repository/EventRepository.php";s:4:"a682";s:49:"Classes/Domain/Repository/EventTypeRepository.php";s:4:"a466";s:45:"Classes/Domain/Repository/GenreRepository.php";s:4:"c933";s:51:"Classes/Domain/Repository/PerformanceRepository.php";s:4:"acab";s:46:"Classes/Domain/Repository/TeaserRepository.php";s:4:"c811";s:45:"Classes/Domain/Repository/VenueRepository.php";s:4:"328b";s:52:"Classes/ViewHelpers/Event/PerformancesViewHelper.php";s:4:"2e6b";s:60:"Classes/ViewHelpers/Widget/Controller/PaginateController.php";s:4:"3722";s:44:"Configuration/ExtensionBuilder/settings.yaml";s:4:"fef0";s:43:"Configuration/FlexForms/flexform_events.xml";s:4:"be01";s:29:"Configuration/TCA/Country.php";s:4:"a0fd";s:27:"Configuration/TCA/Event.php";s:4:"29c9";s:35:"Configuration/TCA/EventLocation.php";s:4:"c666";s:31:"Configuration/TCA/EventType.php";s:4:"db76";s:27:"Configuration/TCA/Genre.php";s:4:"267d";s:31:"Configuration/TCA/Organizer.php";s:4:"c029";s:33:"Configuration/TCA/Performance.php";s:4:"f5fc";s:39:"Configuration/TCA/PerformanceStatus.php";s:4:"50fe";s:28:"Configuration/TCA/Teaser.php";s:4:"8f80";s:33:"Configuration/TCA/TicketClass.php";s:4:"3f5f";s:27:"Configuration/TCA/Venue.php";s:4:"5b54";s:38:"Configuration/TypoScript/constants.txt";s:4:"ca43";s:34:"Configuration/TypoScript/setup.txt";s:4:"ccd9";s:40:"Resources/Private/Language/locallang.xml";s:4:"a0d8";s:43:"Resources/Private/Language/locallang_be.xml";s:4:"947b";s:61:"Resources/Private/Language/locallang_csh_static_countries.xml";s:4:"c19c";s:75:"Resources/Private/Language/locallang_csh_tx_t3events_domain_model_event.xml";s:4:"c26a";s:83:"Resources/Private/Language/locallang_csh_tx_t3events_domain_model_eventlocation.xml";s:4:"0b91";s:79:"Resources/Private/Language/locallang_csh_tx_t3events_domain_model_eventtype.xml";s:4:"eeab";s:75:"Resources/Private/Language/locallang_csh_tx_t3events_domain_model_genre.xml";s:4:"11f8";s:78:"Resources/Private/Language/locallang_csh_tx_t3events_domain_model_location.xml";s:4:"48a5";s:79:"Resources/Private/Language/locallang_csh_tx_t3events_domain_model_organizer.xml";s:4:"5699";s:81:"Resources/Private/Language/locallang_csh_tx_t3events_domain_model_performance.xml";s:4:"2c27";s:87:"Resources/Private/Language/locallang_csh_tx_t3events_domain_model_performancestatus.xml";s:4:"cbce";s:76:"Resources/Private/Language/locallang_csh_tx_t3events_domain_model_teaser.xml";s:4:"11bc";s:81:"Resources/Private/Language/locallang_csh_tx_t3events_domain_model_ticketclass.xml";s:4:"4c92";s:75:"Resources/Private/Language/locallang_csh_tx_t3events_domain_model_venue.xml";s:4:"c02d";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"2fa1";s:38:"Resources/Private/Layouts/Default.html";s:4:"ad45";s:46:"Resources/Private/Partials/Event/ListItem.html";s:4:"a690";s:48:"Resources/Private/Partials/Event/SingleItem.html";s:4:"ac46";s:50:"Resources/Private/Partials/EventLocation/Item.html";s:4:"4d2b";s:51:"Resources/Private/Partials/Location/Properties.html";s:4:"376f";s:46:"Resources/Private/Partials/Organizer/Item.html";s:4:"dc1e";s:48:"Resources/Private/Partials/Performance/Item.html";s:4:"8f75";s:43:"Resources/Private/Partials/Teaser/Item.html";s:4:"20b6";s:48:"Resources/Private/Partials/TicketClass/Item.html";s:4:"4c8b";s:48:"Resources/Private/Partials/TicketClass/List.html";s:4:"ca5a";s:48:"Resources/Private/Partials/Venue/Properties.html";s:4:"7317";s:43:"Resources/Private/Templates/Event/List.html";s:4:"5882";s:48:"Resources/Private/Templates/Event/QuickMenu.html";s:4:"fd02";s:43:"Resources/Private/Templates/Event/Show.html";s:4:"8169";s:44:"Resources/Private/Templates/Teaser/List.html";s:4:"83cd";s:49:"Resources/Private/Templates/TicketClass/List.html";s:4:"d870";s:49:"Resources/Private/Templates/TicketClass/Show.html";s:4:"c532";s:43:"Resources/Private/Templates/Venue/List.html";s:4:"b792";s:43:"Resources/Private/Templates/Venue/Show.html";s:4:"bbee";s:66:"Resources/Private/Templates/ViewHelpers/Widget/Paginate/Index.html";s:4:"2737";s:38:"Resources/Public/Css/t3eventsBasic.css";s:4:"fba4";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:43:"Resources/Public/Icons/static_countries.gif";s:4:"1103";s:57:"Resources/Public/Icons/tx_t3events_domain_model_event.gif";s:4:"c924";s:65:"Resources/Public/Icons/tx_t3events_domain_model_eventlocation.gif";s:4:"2959";s:61:"Resources/Public/Icons/tx_t3events_domain_model_eventtype.gif";s:4:"c055";s:57:"Resources/Public/Icons/tx_t3events_domain_model_genre.gif";s:4:"5bb5";s:60:"Resources/Public/Icons/tx_t3events_domain_model_location.gif";s:4:"2959";s:61:"Resources/Public/Icons/tx_t3events_domain_model_organizer.gif";s:4:"3e33";s:63:"Resources/Public/Icons/tx_t3events_domain_model_performance.gif";s:4:"ff9d";s:69:"Resources/Public/Icons/tx_t3events_domain_model_performancestatus.gif";s:4:"5adf";s:58:"Resources/Public/Icons/tx_t3events_domain_model_teaser.gif";s:4:"acae";s:63:"Resources/Public/Icons/tx_t3events_domain_model_ticketclass.gif";s:4:"06be";s:57:"Resources/Public/Icons/tx_t3events_domain_model_venue.gif";s:4:"4934";s:39:"Resources/Public/Images/dummy-image.png";s:4:"8084";s:32:"Resources/Public/Js/accordion.js";s:4:"b328";s:45:"Tests/Unit/Controller/EventControllerTest.php";s:4:"a1a4";s:53:"Tests/Unit/Controller/EventLocationControllerTest.php";s:4:"d929";s:49:"Tests/Unit/Controller/OrganizerControllerTest.php";s:4:"9102";s:51:"Tests/Unit/Controller/PerformanceControllerTest.php";s:4:"1b4c";s:46:"Tests/Unit/Controller/TeaserControllerTest.php";s:4:"3190";s:51:"Tests/Unit/Controller/TicketClassControllerTest.php";s:4:"c23f";s:45:"Tests/Unit/Controller/VenueControllerTest.php";s:4:"6972";s:46:"Tests/Unit/Domain/Model/AbstractDemandTest.php";s:4:"769a";s:39:"Tests/Unit/Domain/Model/CountryTest.php";s:4:"6365";s:43:"Tests/Unit/Domain/Model/EventDemandTest.php";s:4:"e52f";s:45:"Tests/Unit/Domain/Model/EventLocationTest.php";s:4:"e57b";s:37:"Tests/Unit/Domain/Model/EventTest.php";s:4:"be8b";s:41:"Tests/Unit/Domain/Model/EventTypeTest.php";s:4:"c360";s:37:"Tests/Unit/Domain/Model/GenreTest.php";s:4:"4261";s:41:"Tests/Unit/Domain/Model/OrganizerTest.php";s:4:"1a11";s:49:"Tests/Unit/Domain/Model/PerformanceStatusTest.php";s:4:"60c9";s:43:"Tests/Unit/Domain/Model/PerformanceTest.php";s:4:"61d2";s:44:"Tests/Unit/Domain/Model/TeaserDemandTest.php";s:4:"d72c";s:38:"Tests/Unit/Domain/Model/TeaserTest.php";s:4:"764c";s:43:"Tests/Unit/Domain/Model/TicketClassTest.php";s:4:"3d07";s:37:"Tests/Unit/Domain/Model/VenueTest.php";s:4:"42a8";s:14:"doc/manual.sxw";s:4:"e711";}',
	'suggests' => array(
	),
);

?>