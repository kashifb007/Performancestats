<?php


class Dreamsites_Performancestats_Model_Cron
{


    public function updateProductsRandomHour()
    {
        Mage::getModel('dreamsites_performancestats/update')->updateRandHour();
    }

    public function resetProductsRandomHour()
    {
    	Mage::getModel('dreamsites_performancestats/update')->resetRandHour();
    }

}