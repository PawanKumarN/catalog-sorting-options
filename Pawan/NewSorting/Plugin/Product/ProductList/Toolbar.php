<?php
namespace Pawan\NewSorting\Plugin\Product\ProductList;

class Toolbar
{

    public function aroundSetCollection(
        \Magento\Catalog\Block\Product\ProductList\Toolbar $subject,
        \Closure $proceed,
        $collection
    ) {
        $currentOrder = $subject->getCurrentOrder();
        $result = $proceed($collection);

//        if ($currentOrder) {
//            if ($currentOrder == 'position_asc') {
//                $subject->getCollection()->setOrder('position', 'asc');
//            }elseif ($currentOrder == 'position_desc') {
//                $subject->getCollection()->setOrder('position', 'desc');
//            } elseif ($currentOrder == 'name_asc') {
//                $subject->getCollection()->setOrder('name', 'asc');
//            } elseif ($currentOrder == 'name_desc') {
//                $subject->getCollection()->setOrder('name', 'desc');
//            }
//        }
//        return $result; 
        
        switch ($currentOrder) {
            
            case "position_asc":
                $subject->getCollection()->setOrder('position', 'asc');
                return $result;
            case "position_desc":
                $subject->getCollection()->setOrder('position', 'desc');
                return $result;
                
            case "name_asc":
                $subject->getCollection()->setOrder('name', 'asc');
                return $result; 
            case "name_desc";
                $subject->getCollection()->setOrder('name', 'desc');
            return $result; 
            case "price_asc":
                $subject->getCollection()->setOrder('price', 'asc');
                return $result; 
            case "price_desc";
                $subject->getCollection()->setOrder('price', 'desc');
                return $result; 
            case "mfr_asc":
                $subject->getCollection()->setOrder('mfr', 'asc');
                return $result; 
            case "mfr_asc";
                $subject->getCollection()->setOrder('mfr', 'desc');
                return $result; 
                
            default:
               $subject->getCollection()->setOrder('position', 'asc'); 
             return $result;   
        }

        
    }
}