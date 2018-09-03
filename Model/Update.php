<?php

class Dreamsites_Performancestats_Model_Update
{

public function updateRandHour()
{
	//check if a new product has been added and needs hourly sales figures adding, run every hour

	$productCollection = Mage::getModel('catalog/product')->getCollection();
	$array_product = $productCollection->getAllIds(); 

	foreach($array_product as $productID)
	{
		$product = Mage::getModel('catalog/product')->load($productID);
		$performance_setting = $product->getAttributeText('perf_sales_setting');		

		if($performance_setting=='Random per hour')
		{
			$this->_updateHourlyData($product, $productID, false);			
		} //if
	} //foreach   
}

public function resetRandHour()
{
	//reset product's hourly sales figures every night at 2am

	$productCollection = Mage::getModel('catalog/product')->getCollection();
	$array_product = $productCollection->getAllIds(); 

	foreach($array_product as $productID)
	{
		$product = Mage::getModel('catalog/product')->load($productID);
		$performance_setting = $product->getAttributeText('perf_sales_setting');		

		if($performance_setting=='Random per hour')
		{
			$this->_updateHourlyData($product, $productID, true);
		} //if
	} //foreach     
}

protected function _updateHourlyData($product, $productID, $resetData = false)
{
	
			$off_peak_hour_min = $product->getData('perf_boost_hour_off_peak_min');
			$off_peak_hour_max = $product->getData('perf_boost_hour_off_peak_max');
			$peak_hour_min = $product->getData('perf_boost_hour_peak_min');
			$peak_hour_max = $product->getData('perf_boost_hour_peak_max');
			$prodID_array = array($productID);

			$peak_config_start = Mage::getStoreConfig('performancestats/performancestats/peak_start');
			$peak_config_end = Mage::getStoreConfig('performancestats/performancestats/peak_end');
			$peak_config_end = $peak_config_end == 0 ? 24 : 0;
		
			$hourly_data = $product->getData('perf_sales_figures_per_hour');
			$hour_array = explode(",", $hourly_data);
			$day_sales = 0;
			            				
			if((count($hour_array)<24 || empty($hourly_data) || !isset($hourly_data)) || ($resetData))
			{             					
				//generate random 24 hourly values
				$random_hour = array();
				for($x = 0; $x < 24; $x++)
				{
					if(($x >= $peak_config_start) && (($x+1) <= $peak_config_end))
					{
						$random_hour[] = mt_rand($peak_hour_min, $peak_hour_max);						
					}
					else
					{	
						$random_hour[] = mt_rand($off_peak_hour_min, $off_peak_hour_max);
					}
					$day_sales += $random_hour[$x];
				}

					$hourly_data = implode(",", $random_hour);
Mage::getSingleton('catalog/product_action')->updateAttributes($prodID_array, array('perf_sales_figures_per_hour' => $hourly_data), Mage_Core_Model_App::ADMIN_STORE_ID);			
			}

			//calculate the daily sales value, to be increased per hour
			$daily_stats = $product->getData('perf_sales_per_hour_day');
			$daily_array = explode(",", $daily_stats);			

			if((count($daily_array)<24 || empty($daily_stats) || !isset($daily_stats)) || ($resetData))
			{             					
				$daily_rand_array = array();
				$day_sales = 0;
				for($x = 0; $x < 24; $x++)
				{
					$day_sales += $random_hour[$x];
					$daily_rand_array[] = $day_sales;
				}
					$daily_stats = implode(",", $daily_rand_array);
Mage::getSingleton('catalog/product_action')->updateAttributes($prodID_array, array('perf_sales_per_hour_day' => $daily_stats), Mage_Core_Model_App::ADMIN_STORE_ID);
			}
		
}


}