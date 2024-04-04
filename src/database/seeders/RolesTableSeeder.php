<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_name' => 'administrator',
            'role_description' => '管理者。店舗代表者を作成出来る。'
        ]);
        Role::create([
            'role_name' => 'shop_representative',
            'role_description' => '店舗代業者。店舗情報の作成、更新と予約情報の確認が出来る'
        ]);
        Role::create([
            'role_name' => 'user',
            'role_description' => 'アプリケーションの利用者'
        ]);
    }
}
