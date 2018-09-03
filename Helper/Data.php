<?php
class Dreamsites_Performancestats_Helper_Data extends Mage_Core_Helper_Data
{

	public function getProduct()
    {
        return Mage::registry('current_product');
    }

	public function getStats()
    {

    	$attributeValues = array();
    	$return_data = array();
        $product = $this->getProduct();

        $setId = $product->getAttributeSetId();
        $groups = Mage::getModel('eav/entity_attribute_group')
            ->getResourceCollection()
            ->setAttributeSetFilter($setId)
            ->setSortOrder()
            ->load();

        foreach ($groups as $group) 
        {
            if($group->getAttributeGroupName() == 'Performance Statistics')
            {


            	$attributes = Mage::getResourceModel('catalog/product_attribute_collection')
                ->setAttributeGroupFilter($group->getId())
                ->addVisibleFilter()
                ->checkConfigurableProducts()
                ->load();

                if ($attributes->getSize() > 0) 
                {
                	$performance_setting = $product->getAttributeText('perf_sales_setting');

                	switch ($performance_setting)
                	{
                		case "Actual Sales":
                			break;
                		case "Boost by single figure per day":
                			break;
                		case "Boost by single figure per hour":
                			break;
                		case "Off":
                			break;
                		case "Random per day":
                			break;
                		case "Random per hour":
                			$hourly_stats = $product->getData('perf_sales_figures_per_hour');
                			$daily_stats = $product->getData('perf_sales_per_hour_day');
                			$hourly_stats = explode(",", $hourly_stats);
                			$daily_stats = explode(",", $daily_stats);

            				$return_data['this_hour_sales'] = $hourly_stats[date('G')];
            				$return_data['this_hour_daily_sales'] = $daily_stats[date('G')];                				                				
                			break;		            						
                	}

                		if((int)$hourly_stats[date('H')]<50)
						{							
							$return_data['hourly_icon'] = 'low-seller.png';
						}
						else if((int)$hourly_stats[date('H')]<100)
						{
							$return_data['hourly_icon'] = 'med-seller.png';
						}
						else if((int)$hourly_stats[date('H')]<200)
						{
							$return_data['hourly_icon'] = 'high-seller.png';
						}
						else
						{
							$return_data['hourly_icon'] = 'hot-seller.png';
						}

						if((int)$daily_stats[date('H')]<50)
						{							
							$return_data['daily_hourly_icon'] = 'low-seller.png';
						}
						else if((int)$daily_stats[date('H')]<100)
						{
							$return_data['daily_hourly_icon'] = 'med-seller.png';
						}
						else if((int)$daily_stats[date('H')]<200)
						{
							$return_data['daily_hourly_icon'] = 'high-seller.png';
						}
						else
						{
							$return_data['daily_hourly_icon'] = 'hot-seller.png';
						}					
						
                }



            }

        }

        return $return_data;

    }


}