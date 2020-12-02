<?php

/**
 * Created by PhpStorm.
 * User: jinalshah
 * Date: 1/12/20
 * Time: 5:53 PM
 */
namespace Sigma\PluginTutorial\Plugin\Magento\Checkout\Model;
class Cart
{
    public function beforeAddProduct(\Magento\Checkout\Model\Cart $subject, $productInfo, $requestInfo = null)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/plugin-debug.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Array Log'.print_r($requestInfo, true));
        $requestInfo['qty'] =5;
        return array($productInfo, $requestInfo);
    }

}