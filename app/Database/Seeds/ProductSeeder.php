<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_name' => 'Apple iPhone 13 Max',
                'price' => 25000000,
                'description' => "The iPhone 13 Pro Max is the largest and most expensive model in Apple's 2021 smartphone line-up and features a 6.7-inch Super Retina XDR display with 1284 x 2778 pixels resolution. Like the smaller iPhone 13 Pro, it is powered by Apple's latest A15 Bionic chipset and comes with up to 1TB of internal storage.",
                'photo' => 'iphone 13 max.jpg',
                'qty' => 12,
            ],
            [
                'product_name' => 'HUAWEI MateBook X Pro 2021 Space Gray',
                'price' => 32000000,
                'description' => "The new HUAWEI MateBook X Pro comes in 2 charismatic, natural colours — Emerald Green and Space Grey. Versatile beauty at its finest. Light metal chic. With the 1.33 kg light4 and 14.6 mm thin5 metallic body, plus diamond-cut, sandblasted finish, you get an ultra-portable, professional level notebook all-in-one.",
                'photo' => 'huawei laptop.jpg',
                'qty' => 12,
            ],
            [
                'product_name' => 'Saddle Bag Blue Dior Oblique Jacquard',
                'price' => 56999000,
                'description' => 'The iconic Saddle bag has been reinvented in two sizes with leather, Dior Oblique canvas and embroidery versions available. Sold separately, the embroidered wide canvas straps add a stylish touch and allow the bag to be carried in different ways.',
                'photo' => 'saddle bag dior.jpg',
                'qty' => 8,
            ],
            [
                'product_name' => 'Tourya B7 Headphone Wireless Bluetooth',
                'price' => 599000,
                'description' => "Tourya B7 Wireless Headphones Bluetooth Headset Foldable Headphone Adjustable Earphones With Mic For Phone Pc Lat Mp3 Tv.",
                'photo' => 'tourya b7 headphone.jpg',
                'qty' => 34,
            ],
            [
                'product_name' => 'VIVO V23e',
                'price' => 3099000,
                'description' => 'vivo V23e ; Size, 6.44 inches, 100.1 cm2 (~83.8% screen-to-body ratio) ; Resolution, 1080 x 2400 pixels, 20:9 ratio (~409 ppi density) ;',
                'photo' => 'vivo v23.jpg',
                'qty' => 37,
            ],
            [
                'product_name' => "Nike Revolution 6 Next Nature Men's Road Running Shoes",
                'price' => 729000,
                'description' => "Men's Running Shoes ; Cloudstratus. Maximum cushioning, long runs, double CloudTec®. 4 Colors ; Cloudflow. Ultralight, road run, mixed distance. 5 Colors.",
                'photo' => "men's running shoes.jpg",
                'qty' => 8,
            ],
            [
                'product_name' => 'Samsung Galaxy A53',
                'price' => 5999000,
                'description' => 'Samsung Galaxy A53 5G ; Resolution, 1080 x 2400 pixels, 20:9 ratio (~405 ppi density) ; Protection, Corning Gorilla Glass 5 ; Platform, OS ; Chipset, Exynos 1280',
                'photo' => 'samsung a53.jpg',
                'qty' => 68,
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
