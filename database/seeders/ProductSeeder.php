<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('products')->insert(
        //     [
        //         'title' => 'HP ProBook',
        //         'brand' => 'HP',
        //         'per_hour_rate' => '10',
        //         'os' => 'Windows',
        //         'display_size' => '12.6 inch',
        //         'no_of_usb_ports' => '3',
        //         'no_of_hdmi_ports' => '2',
        //         'image' => 'img-1.png',
        //         'category' => 'Computer',
        //         'user_id' => '1',
        //         'ram' => '8GB',
        //         'security_deposit' => '4',
        //         'insurance_amount' => '2',
        //         'is_rented' => 1,


        //     ]);
        DB::table('products')->insert([
            [
                'title' => 'HP ProBook',
                'brand' => 'HP',
                'per_hour_rate' => '10',
                'os' => 'Linux',
                'display_size' => '12.6 inch',
                'no_of_usb_ports' => '3',
                'no_of_hdmi_ports' => '2',
                'image' => 'img-1.webp',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '12GB',
                'security_deposit' => '3',
                'insurance_amount' => '2',

            ],
            [
                'title' => 'MacBook Air',
                'brand' => 'Apple',
                'per_hour_rate' => '15',
                'os' => 'Mac',
                'display_size' => '12.6 inch',
                'no_of_usb_ports' => '2',
                'no_of_hdmi_ports' => '2',
                'image' => 'img-2.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '32GB',
                'security_deposit' => '4',
                'insurance_amount' => '2',

            ],
            [
                'title' => 'Asus Zenbook',
                'brand' => 'Asus',
                'per_hour_rate' => '18',
                'os' => 'Windows',
                'display_size' => '12.6 inch',
                'no_of_usb_ports' => '3',
                'no_of_hdmi_ports' => '2',
                'image' => 'img-3.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '16GB',
                'security_deposit' => '5',
                'insurance_amount' => '3',

            ],
            [
                'title' => 'Dell M123',
                'brand' => 'Dell',
                'per_hour_rate' => '20',
                'os' => 'Windows',
                'display_size' => '14.6 inch',
                'no_of_usb_ports' => '3',
                'no_of_hdmi_ports' => '2',
                'image' => 'img-4.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '16GB',
                'security_deposit' => '6',
                'insurance_amount' => '4',

            ],
            [
                'title' => 'HP Pavilion X360',
                'brand' => 'HP',
                'per_hour_rate' => '14',
                'os' => 'Windows',
                'display_size' => '12.6 inch',
                'no_of_usb_ports' => '2',
                'no_of_hdmi_ports' => '1',
                'image' => 'img-5.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '6GB',
                'security_deposit' => '3',
                'insurance_amount' => '2',

            ],
            [
                'title' => 'HP Probook',
                'brand' => 'HP',
                'per_hour_rate' => '16',
                'os' => 'Windows',
                'display_size' => '15.6 inch',
                'no_of_usb_ports' => '2',
                'no_of_hdmi_ports' => '1',
                'image' => 'img-6.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '8GB',
                'security_deposit' => '5',
                'insurance_amount' => '2',

            ],
            [
                'title' => 'Dell inspiron latitude',
                'brand' => 'Dell',
                'per_hour_rate' => '12',
                'os' => 'Windows',
                'display_size' => '14.6inch',
                'no_of_usb_ports' => '2',
                'no_of_hdmi_ports' => '2',
                'image' => 'img-7.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '16GB',
                'security_deposit' => '3',
                'insurance_amount' => '2',

            ],
            [
                'title' => 'Asus Zenbook',
                'brand' => 'Asus',
                'per_hour_rate' => '17',
                'os' => 'Windows',
                'display_size' => '15.6 inch',
                'no_of_usb_ports' => '3',
                'no_of_hdmi_ports' => '2',
                'image' => 'img-8.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '4GB',
                'security_deposit' => '4',
                'insurance_amount' => '3',

            ],
            [
                'title' => 'MacBook Pro',
                'brand' => 'Apple',
                'per_hour_rate' => '11',
                'os' => 'Mac',
                'display_size' => '12.6 inch',
                'no_of_usb_ports' => '3',
                'no_of_hdmi_ports' => '2',
                'image' => 'img-9.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '12GB',
                'security_deposit' => '3',
                'insurance_amount' => '2',

            ],
            [
                'title' => 'Dell Inspiration',
                'brand' => 'Dell',
                'per_hour_rate' => '19',
                'os' => 'Linux',
                'display_size' => '15.6 inch',
                'no_of_usb_ports' => '3',
                'no_of_hdmi_ports' => '2',
                'image' => 'img-10.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '8GB',
                'security_deposit' => '5',
                'insurance_amount' => '3',

            ],
            [
                'title' => 'MacBook Pro-M1',
                'brand' => 'Apple',
                'per_hour_rate' => '15',
                'os' => 'Mac',
                'display_size' => '12.6 inch',
                'no_of_usb_ports' => '3',
                'no_of_hdmi_ports' => '2',
                'image' => 'img-11.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '6GB',
                'security_deposit' => '3',
                'insurance_amount' => '2',

            ],
            [
                'title' => 'Toshiba',
                'brand' => 'Toshiba',
                'per_hour_rate' => '20',
                'os' => 'Windows',
                'display_size' => '15.6 inch',
                'no_of_usb_ports' => '3',
                'no_of_hdmi_ports' => '2',
                'image' => 'img-12.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '8GB',
                'security_deposit' => '5',
                'insurance_amount' => '3',

            ],
            [
                'title' => 'HP Elitebook',
                'brand' => 'HP',
                'per_hour_rate' => '16',
                'os' => 'Windows',
                'display_size' => '14.6 inch',
                'no_of_usb_ports' => '3',
                'no_of_hdmi_ports' => '2',
                'image' => 'img-13.jpeg',
                'category' => 'Computer',
                'user_id' => '1',
                'ram' => '6GB',
                'security_deposit' => '4',
                'insurance_amount' => '3',

            ]
        ]);
    }
}
