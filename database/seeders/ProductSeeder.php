<?php
namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name'=>'Men Casual Shirt','category'=>'Clothing','price'=>1200,'stock'=>50,'description'=>'Premium quality cotton casual shirt for men. Available in multiple colors and sizes.'],
            ['name'=>'Women Lawn Suit','category'=>'Clothing','price'=>2500,'stock'=>30,'description'=>'Beautiful printed lawn suit perfect for summer season. Comes with dupatta.'],
            ['name'=>'Kids School Bag','category'=>'Bags','price'=>800,'stock'=>40,'description'=>'Durable waterproof school bag with multiple compartments. Perfect for students.'],
            ['name'=>'Leather Wallet','category'=>'Accessories','price'=>650,'stock'=>60,'description'=>'Genuine leather slim wallet with card slots and coin pocket.'],
            ['name'=>'Running Shoes','category'=>'Footwear','price'=>3200,'stock'=>25,'description'=>'Comfortable lightweight running shoes with cushioned sole for daily exercise.'],
            ['name'=>'Wireless Earbuds','category'=>'Electronics','price'=>4500,'stock'=>20,'description'=>'True wireless earbuds with 24hr battery life and active noise cancellation.'],
            ['name'=>'Face Wash','category'=>'Skincare','price'=>350,'stock'=>80,'description'=>'Gentle foaming face wash suitable for all skin types. Removes dirt and oil.'],
            ['name'=>'Kurta Shalwar','category'=>'Clothing','price'=>1800,'stock'=>35,'description'=>'Traditional embroidered kurta shalwar set for special occasions and Eid.'],
            ['name'=>'Sunglasses','category'=>'Accessories','price'=>950,'stock'=>45,'description'=>'UV400 polarized sunglasses with stylish frame. Protects eyes from harmful rays.'],
            ['name'=>'Smart Watch','category'=>'Electronics','price'=>8500,'stock'=>15,'description'=>'Fitness tracking smart watch with heart rate monitor, GPS and sleep tracking.'],
            ['name'=>'Ladies Hand Bag','category'=>'Bags','price'=>1500,'stock'=>28,'description'=>'Stylish ladies hand bag with multiple pockets. Perfect for daily use.'],
            ['name'=>'Mobile Cover','category'=>'Electronics','price'=>250,'stock'=>100,'description'=>'Premium shockproof mobile phone protection cover. Available for all models.'],
            ['name'=>'Moisturizer Cream','category'=>'Skincare','price'=>450,'stock'=>70,'description'=>'Daily moisturizer cream for soft and glowing skin. Suitable for all skin types.'],
            ['name'=>'Kids Sneakers','category'=>'Footwear','price'=>1200,'stock'=>40,'description'=>'Comfortable and stylish sneakers for kids. Available in multiple colors.'],
            ['name'=>'Laptop Bag','category'=>'Bags','price'=>2200,'stock'=>22,'description'=>'Water resistant laptop bag with padded compartment. Fits laptops up to 15 inch.'],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}