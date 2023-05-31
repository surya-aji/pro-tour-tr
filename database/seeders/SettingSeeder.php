<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Settings\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::create(['display_name' => 'Name','key'=>'Name' , 'value' =>'Laravel APP', 'type' => 'Website']);
        Settings::create(['display_name' => 'App Name','key'=>'AppName' , 'value' =>'App Name','type' => 'Website']);
        Settings::create(['display_name' => 'Tag Line','key'=>'TagLine' , 'value' =>'Tag Line','type' => 'Website']);
        Settings::create(['display_name' => 'Phone Number','key'=>'Phone' , 'value' =>'120921232','type' => 'Website']);
        Settings::create(['display_name' => 'Url Website','key'=>'Web' , 'value' =>'Localhost','type' => 'Website']);
        Settings::create(['display_name' => 'Logo Website','key'=>'Logo' , 'value' =>'build/template/assets/images/logo/dark-logo.png','type' => 'Website']);
        Settings::create(['display_name' => 'Icon Website','key'=>'Icon' , 'value' =>'build/template/assets/images/favicon.png','type' => 'Website']);
        Settings::create(['display_name' => 'Email','key'=>'Email' , 'value' =>'aedjiae1@gmail.com','type' => 'Website']);
    }
}
