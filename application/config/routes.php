<?php

$urlRoutes = array(
	'index'=>'index',
	'about' =>'about',
	'contact' => 'contact',
	'events'=>'events',
	'gallery'=>'photogallery',
	'boardOfTrustees' => 'board_of_trustees',
	'medicalAdvisers' => 'medical_advisers',
	'foundationMembers' => 'foundation_members',
	'login' => 'adminlogin',
	'authenticate' => 'adminlogin/authenticate',
	'dashboard'=>'adminpanel',
	'logout' => 'adminpanel/logout',
	'adminEvents' => 'adminpanel/events',
	'adminGallery' => 'adminpanel/gallery',
	'addEvent' => 'adminpanel/addEvent',
	'deleteEvent' => 'adminpanel/deleteEvent',
	'updateEvent' => 'adminpanel/updateEvent',
	'addToGallery' => 'adminpanel/addToGallery',
	'deletePhoto' => 'adminpanel/deletePhoto',
	'visitors' => 'adminpanel/visitors',
);

define ("ROUTES", $urlRoutes);