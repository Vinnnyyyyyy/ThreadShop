<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Classic White T-Shirt',
                'description' => 'A comfortable everyday white t-shirt made from 100% cotton.',
                'price'       => 299.00,
                'category'    => 'Men',
                'size'        => 'M',
                'stock'       => 50,
            ],
            [
                'name'        => 'Floral Summer Dress',
                'description' => 'Light and breezy floral dress perfect for warm weather.',
                'price'       => 799.00,
                'category'    => 'Women',
                'size'        => 'S',
                'stock'       => 30,
            ],
            [
                'name'        => 'Kids Denim Jacket',
                'description' => 'Durable denim jacket for kids with fun patches.',
                'price'       => 599.00,
                'category'    => 'Kids',
                'size'        => 'Free Size',
                'stock'       => 20,
            ],
            [
                'name'        => 'Unisex Hoodie',
                'description' => 'Soft fleece hoodie, great for all seasons.',
                'price'       => 999.00,
                'category'    => 'Unisex',
                'size'        => 'L',
                'stock'       => 40,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}