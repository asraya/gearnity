<?php

namespace Database\Seeders;

use App\Models\Config\WebConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebconfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebConfig::create([
            'name'  => 'app_name',
            'label' => 'Application Name',
            'value' => 'Gearnity',
            'type'  => 0,
            
        ]);

        WebConfig::create([
            'name'  => 'email',
            'label' => 'Email',
            'value' => 'hey@gearnity.com',
            'type'  => 0
        ]);
        
        WebConfig::create([
            'name'  => 'linkedin_link',
            'label' => 'Linkedin link',
            'value' => 'https://www.linkedin.com/',
            'type'  => 0
        ]);

        WebConfig::create([
            'name'  => 'instagram_link',
            'label' => 'Instagram link',
            'value' => 'https://instagram.com/',
            'type'  => 0
        ]);

        WebConfig::create([
            'name'  => 'facebook_link',
            'label' => 'Facebook link',
            'value' => 'https://facebook.com/',
            'type'  => 0
        ]);

        WebConfig::create([
            'name'  => 'address',
            'label' => 'Address',
            'value' => 'Jakarta, Indonesia',
            'type'  => 0
        ]);

        WebConfig::create([
            'name'  => 'app_logo',
            'label' => 'Logo',
            'value' => 'config/web/kkibVu2TIWdg9OCHiANDJ0xuKIFdAlLMQ4UcQKgT.png',
            'type'  => 2          
        ]);

        WebConfig::create([
            'name'  => 'app_home',
            'label' => 'Home',
            'value' => 'Home',
            'type'  => 0         
        ]);

        WebConfig::create([
            'name'  => 'app_login',
            'label' => 'Login',
            'value' => 'Login',
            'type'  => 0         
        ]);

        WebConfig::create([
            'name'  => 'app_signup',
            'label' => 'Sign Up',
            'value' => 'Sign Up',
            'type'  => 0         
        ]);

        WebConfig::create([
            'name'  => 'app_header_web',
            'label' => 'Header Web',
            'value' => 'Get A Fastest Loan With A Smart Way By Seating At Home',
            'type'  => 0         
        ]);

        WebConfig::create([
            'name'  => 'name_x',
            'label' => 'Name X',
            'value' => '155',
            'type'  => 0         
        ]);

        WebConfig::create([
            'name'  => 'name_y',
            'label' => 'Name y',
            'value' => '102',
            'type'  => 0         
        ]);

        WebConfig::create([
            'name'  => 'date_x',
            'label' => 'Date x',
            'value' => '80',
            'type'  => 0         
        ]);

        WebConfig::create([
            'name'  => 'date_y',
            'label' => 'Date y',
            'value' => '80',
            'type'  => 0         
        ]);

        WebConfig::create([
            'name'  => 'pdf_file',
            'label' => 'Pdf File',
            'value' => 'Pdf File',
            'type'  => 0         
        ]);

        WebConfig::create([
            'name'  => 'csv_file',
            'label' => 'Csv File',
            'value' => 'Csv File',
            'type'  => 0         
        ]);

        WebConfig::create([
            'name'  => 'email_body',
            'label' => 'Email Body',
            'value' => 'Hallo gearnity',
            'type'  => 0         
        ]);
    }
}
