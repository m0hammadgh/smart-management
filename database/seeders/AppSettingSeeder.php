<?php

namespace Database\Seeders;

use App\Models\AppSetting;
use Illuminate\Database\Seeder;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppSetting::create([
            "key"=>"kavenegar_key",
            "value"=>"696A5A4B5664304A586B31322F73594F7A6C4369425A303448456A48564338326E345A48624972544C65493D"
        ]);
        AppSetting::create([
            "key"=>"register_sms_key",
            "value"=>"Register-rob"
        ]);
    }
}
