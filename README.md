Cutie - Sample
===============

Requirements
------------

	Tiggu
		PowerShell
		Batch
	Apache
	PHP
	
Directory structure
-------------------
	Project
	|
	├───Config
	|
	└───Root
	    |
	    ├───Config
	    |
	    ├───CSS
	    |   └───Base
	    |
	    ├───Framework
	    |
	    ├───HTML
	    |   ├───Component
	    │   |    └───[Sub_Folder]
	    |   |
	    |   ├───Fragment
	    |   └───Template
	    |
	    ├───JS
	    |   ├───Base
	    |   └───[Page]								Per page init functions
	    |
	    └───Resource
	        └───[Sub_Folder]
	

-------------------------------------------------------------------

File structure
-----------------------------
	Project
	|
	│   .gitignore
	|   .gitmodules
	│   .htaccess
	│   README.md
	│   Version.txt
	│
	├───Config
	│       Files.tsv
	│       ID.tsv
	│       Template.tsv
	│
	└───Root
	    │   .htaccess
	    │
	    ├───Config
	    │       Vars.tsv : Project variables
	    │
	    ├───CSS
	    |   └───Base
	    |
	    ├───Fragment
	    │       Footer.php
	    │       Header.php
	    │       Menu.php
	    │
	    ├───Framework : The standard framework part (Usually not to be modified)
	    │
	    ├───HTML
	    │   ├───Component
	    │   │       Root.php
	    │   │
	    │   ├───Fragment
	    │   │       Header.php
	    │   │       Menu.php
	    │   │
	    │   └───Template
	    │           Base.php : Base file when URL is hit directly
	    ├───JS
	    |   ├───Base
	    |   └───[Page] : Per page init functions
	    |
	    ├───Resource
	    │   │   Apple-Touch-Icon.png
	    │   │   Facebook.svg
	    │   │   Favicon.ico
	    │   │   Google+.svg
	    │   │   Icon-social.png
	    │   │   launcher-icon-1-5x.png
	    │   │   launcher-icon-1x.png
	    │   │   launcher-icon-2x.png
	    │   │   launcher-icon-3x.png
	    │   │   launcher-icon-4x.png
	    │   │   Logo_Full.svg
	    │   │   Menu_icon.svg
	    │   │   Placeholder.svg
	    │   │   Search.svg
	    │   │   Translate.svg
	    │   │   Twitter.svg
	    │   │   YouTube.svg
	    │   │
	    │   └───Folder
	    │           Root.jpg
	    │
	    └───Template
	            Base.php


Temporary interim files
-----------------------
	/Interim

Rendered files
--------------
	/Publish

Configuration
-------------

	/Config
		
		ID.tsv
		
Id | Label | Title | JS | Description
-- | ----- | ----- | -- | -----------
root | - | - | 1 | root description
item | - | - | 0 | item description
folder | - | - | - | folder description
folder/item | - | - | - | folder's item description
	
Menu
----
	
	/Menu.php

#### Text
		group_text($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ['first', 'First_title'], ['second', 'Second_title']);
		
#### Image

		group_image($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ['root', '']);
		

Content
-------

#### Image
		<?php $alt="<Folder's item's cover image's description>"; require('Fragment\Component_cover.php') ?>

Nav menu
--------
		<?php require('..\HTML\Fragment\Component_bottom.php') ?>
