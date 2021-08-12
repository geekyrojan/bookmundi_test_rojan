<?php

	class Prices{
		public $prices;

		function __construct($prices)
		{
			$this->prices = $prices;
		}

		public function findPricesGreaterThan($threshold){
			//Filter out the prices greater than threshold and return them along with its key
			return array_filter($this->prices, function($price) use ($threshold){
				return $price > $threshold;
			}, ARRAY_FILTER_USE_BOTH);

		}

		public function findSumOfPrices(){
			//Return sum of all prices
			return array_sum($this->prices);
		}
	}

	$p = ['1'=>12, '2'=>200.5,'3'=>3000,'4'=>400,'a'=>21];
	$prices = new Prices($p);

	$filtered = $prices->findPricesGreaterThan(200);
	$sum = $prices->findSumOfPrices();

	echo "Filtered Prices: ";
	print_r($filtered);
	echo "Sum of Prices: ";
	print_r($sum);