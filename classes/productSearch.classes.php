<?php

class productSearch extends session {

    protected function getProducts($searchType, $searchContent) {
        session::search($searchType, $searchContent);

        $stmt = null;
        
        // $_SESSION["searchTypeInput"] = "select * from product where {$searchType} like '%{$searchContent}%'";
        // $_SESSION["searchTypeInput"] = "select * from product";
        // if(!$stmt->execute(array($product_ID, $product_name, $product_description, $product_type, $make, $model, $qty_unit, $qty_in_stock,$is_promotional,$reg_price,$discounted_price,$num_rented,$num_broken))) {
        //     $stmt = null;
        //     header('location: ../homepage.phpgetProductSTMTFAILED');
        //     exit();
        // }
        // $stmt = null;
    }
}