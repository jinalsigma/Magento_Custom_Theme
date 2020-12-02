<?php

/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 1/12/20
 * Time: 11:32 PM
 */
namespace Sigma\PluginTutorial\Plugin\Magento\Catalog\Model;

class ProductD
{
    public function beforeGetName(\Magento\Catalog\Model\Product $subject)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/plugin-1.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Before 10');
        //$name ='Before: '.$name;
        //return $name;
    }
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/plugin-1.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('After 10');
       
        return $result;
    }
    public function aroundGetName(\Magento\Catalog\Model\Product $subject, callable $proceed)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/plugin-1.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Around Before 10');
        $proceed();
        $logger->info('Around After 10');
    }
}