<?php

	//Class to load & parse XML from string
	class XMLtoJSON{
		public $xml;
		function __construct($xmlString)
		{
			$this->xml = simplexml_load_string($xmlString);
		}

		public function toJSON(){
			$json = json_encode($this->xml);
			return $json;
		}
	}



	$url = "http://ftp.geoinfo.msl.mt.gov/Documents/Metadata/GIS_Inventory/35524afc-669b-4614-9f44-43506ae21a1d.xml";
	$fileContents= file_get_contents($url);
	$xmltojson = new XMLtoJSON($fileContents);
	echo($xmltojson->toJSON());