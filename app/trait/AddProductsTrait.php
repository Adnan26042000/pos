<?php

namespace App\trait;

trait AddProductsTrait
{
    public $fetch_products = [];

    public function getProducts()
    {
        $this->fetch_products = [
            [
                'id'=> 1,
                'name' => 'Product 1',
                'Unit' => 'Gram',
                'unit_value' => '200',
                'supply_price' => 500,
                'retail_price' => 700,
                'pieces_in_packing' => 12,
            ],
            [
                'id'=> 2,
                'name' => 'Product 2',
                'Unit' => 'Gram',
                'unit_value' => '200',
                'supply_price' => 500,
                'retail_price' => 700,
                'pieces_in_packing' => 12,
            ],
            [
                'id'=> 3,
                'name' => 'Product 3',
                'Unit' => 'Gram',
                'unit_value' => '200',
                'supply_price' => 500,
                'retail_price' => 700,
                'pieces_in_packing' => 12,
            ],
            [
                'id'=> 4,
                'name' => 'Product 4',
                'Unit' => 'Gram',
                'unit_value' => '200',
                'supply_price' => 500,
                'retail_price' => 700,
                'pieces_in_packing' => 12,
            ],
            [
                'id'=> 5,
                'name' => 'Product 5',
                'Unit' => 'Gram',
                'unit_value' => '200',
                'supply_price' => 500,
                'retail_price' => 700,
                'pieces_in_packing' => 12,
            ],
            [
                'id'=> 6,
                'name' => 'Product 6',
                'Unit' => 'Gram',
                'unit_value' => '200',
                'supply_price' => 500,
                'retail_price' => 700,
                'pieces_in_packing' => 12,
            ],
            [
                'id'=> 7,
                'name' => 'Product 7',
                'Unit' => 'Gram',
                'unit_value' => '200',
                'supply_price' => 500,
                'retail_price' => 700,
                'pieces_in_packing' => 12,
            ],
            [
                'id'=> 8,
                'name' => 'Product 8',
                'Unit' => 'Gram',
                'unit_value' => '200',
                'supply_price' => 500,
                'retail_price' => 700,
                'pieces_in_packing' => 12,
            ]
        ];

    }
}
