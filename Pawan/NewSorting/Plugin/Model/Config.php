<?php
namespace Pawan\NewSorting\Plugin\Model;

use Magento\Store\Model\StoreManagerInterface;

class Config  {


    protected $_storeManager;

    public function __construct(
        StoreManagerInterface $storeManager
    ) {
        $this->_storeManager = $storeManager;
    }


    public function afterGetAttributeUsedForSortByArray(\Magento\Catalog\Model\Config $catalogConfig, $options)
    {
        $store = $this->_storeManager->getStore();
        $currencySymbol = $store->getCurrentCurrency()->getCurrencySymbol();
        
        
//        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/logfile.log');
//        $logger = new \Zend\Log\Logger();
//        $logger->addWriter($writer);
//        $logger->info('Simple Text Log'); // Simple Text Log
//        $logger->info('Array Log'.print_r($store, true)); // Array Log
        
        // Remove specific default sorting options
        $default_options = [];
        $default_options['name'] = $options['name'];

        unset($options['position']);
        unset($options['name']);
        unset($options['price']);
        unset($options['mfr']);

        //Changing label
        $customOption['position_asc'] = __('Position low to high');
        $customOption['position_desc'] = __('Position high to low');
//        $customOption['position'] = __( 'Relevance' );
        $customOption['name_asc'] = __('Name A-Z');
        $customOption['name_desc'] = __('Name Z-A');
        
        $customOption['price_asc'] = __('Price low to high');
        $customOption['price_desc'] = __('Price high to low');
        
        $customOption['mfr_asc'] = __('MFR low to high');
        $customOption['mfr_desc'] = __('MFR low to high');
        
        //New sorting options
        //$customOption['created_at'] = __( ' New' );


       // $customOption['name'] = $default_options['name'];

        //Merge default sorting options with custom options
        $options = array_merge($customOption, $options);
//        $logger->info('Array Log'.print_r($options, true)); // Array Log
        return $options;
    }
}