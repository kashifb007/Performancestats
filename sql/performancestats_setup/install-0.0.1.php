<?php

$installer = $this;

$installer->startSetup();

// Sales figure setting
# Off - Not shown
# Actual sales - actual sales figures, checks for 12 hours, 24 hours, 2 days
# Random per day - Random sales amount per day starting from 00:00 and ends 23:59
# Random per hour - displays a random figure for sales by the hour
# Boost by single figure per day - Get the actual sales amount per day and add a single value to it
# Boost by single figure per hour - Gets the actual salers per hour and adds a single value to it
$installer->addAttribute('catalog_product', 'perf_sales_setting', array(
        'group'             => 'Performance Statistics',
        'type'              => 'varchar',
        'label'             => 'Sales Increase',
        'input'             => 'select',
        'backend'           => 'eav/entity_attribute_backend_array',
        'frontend'          => '',
        'source'            => '',
        'option' => array ( 'value' => array('optionone' => array('Off'), 
                                            'optiontwo' => array('Actual sales'), 
                                            'optionthree' => array('Random per day'), 
                                            'optionfour' => array('Random per hour'), 
                                            'optionfive' => array('Boost by single figure per day'),                                            
                                            'optionsix' => array('Boost by single figure per hour'),                                            
                                            ) ),
        'default'    => 'optionone',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false
    ));

# take the amount sold in a day and add a single value to it
$installer->addAttribute('catalog_product', 'perf_sales_boost_day', array(
        'group'             => 'Performance Statistics',
        'type'              => 'int',
        'label'             => 'Sales Boost per day',
        'input'             => 'text',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false
    ));

# random figure starting value
$installer->addAttribute('catalog_product', 'perf_sales_random_from', array(
        'group'             => 'Performance Statistics',
        'type'              => 'int',
        'label'             => 'Sales random per day minimum',
        'input'             => 'text',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false
    ));

# random figure upper value
$installer->addAttribute('catalog_product', 'perf_sales_random_to', array(
        'group'             => 'Performance Statistics',
        'type'              => 'int',
        'label'             => 'Sales random per day maximum',
        'input'             => 'text',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false
    ));

# increase hourly sales by single figure
$installer->addAttribute('catalog_product', 'perf_sales_boost_hour', array(
        'group'             => 'Performance Statistics',
        'type'              => 'int',
        'label'             => 'Sales boost per hour by single figure',
        'input'             => 'text',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false
    ));


# increase hourly off peak sales by random figure Minimum
$installer->addAttribute('catalog_product', 'perf_boost_hour_off_peak_min', array(
        'group'             => 'Performance Statistics',
        'type'              => 'int',
        'label'             => 'Sales boost per hour by random amount, off peak hours minimum',
        'input'             => 'text',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false
    ));


# increase hourly off peak sales by random figure Maximum
$installer->addAttribute('catalog_product', 'perf_boost_hour_off_peak_max', array(
        'group'             => 'Performance Statistics',
        'type'              => 'int',
        'label'             => 'Sales boost per hour by random amount, off peak hours maximum',
        'input'             => 'text',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false
    ));

# increase hourly peak sales by random figure Minimum
$installer->addAttribute('catalog_product', 'perf_boost_hour_peak_min', array(
        'group'             => 'Performance Statistics',
        'type'              => 'int',
        'label'             => 'Sales boost per hour by random amount, peak hours minimum',
        'input'             => 'text',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false
    ));


# increase hourly peak sales by random figure Maximum
$installer->addAttribute('catalog_product', 'perf_boost_hour_peak_max', array(
        'group'             => 'Performance Statistics',
        'type'              => 'int',
        'label'             => 'Sales boost per hour by random amount, peak hours maximum',
        'input'             => 'text',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false
    ));

# today's random boost figure for the day 00:00 to 23:59
$installer->addAttribute('catalog_product', 'perf_sales_boost_day_figure', array(
        'group'             => 'Performance Statistics',
        'type'              => 'int',
        'label'             => 'Sales figures daily random boost amount',
        'input'             => 'text',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false,
        'note'              => "System setting"
    ));

# sales figures, comma separated, random per hour
$installer->addAttribute('catalog_product', 'perf_sales_figures_per_hour', array(
        'group'             => 'Performance Statistics',
        'type'              => 'varchar',
        'label'             => 'Sales figures, per hour, comma separated',
        'input'             => 'text',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false,
        'note'              => "System setting"
    ));

# sales figures daily, comma separated, random per hour
$installer->addAttribute('catalog_product', 'perf_sales_per_hour_day', array(
        'group'             => 'Performance Statistics',
        'type'              => 'varchar',
        'label'             => 'Hourly sales increase for daily sales value',
        'input'             => 'text',
        'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible'           => true,
        'required'          => false,
        'searchable'        => false,
        'filterable'        => false,
        'comparable'        => false,
        'visible_on_front'  => false,
        'unique'            => false,
        'apply_to'          => 'simple,configurable,virtual,bundle,downloadable',
        'is_configurable'   => false,
        'note'              => "System setting"
    ));

//$installer->updateAttribute('catalog_product', 'perf_sales_figures_per_hour', 'is_visible', '0');

$installer->endSetup();     