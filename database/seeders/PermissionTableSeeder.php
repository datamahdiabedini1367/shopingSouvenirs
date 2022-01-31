<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Permission::query()->truncate();

        Permission::query()->insert([
            ['name'=>'view_orders','persian_name'=>'نمایش سفارشات'],
            ['name'=>'cancel_order','persian_name'=>'لغو سفارشات'],
            ['name'=>'view_panel_admin','persian_name'=>'نمایش پنل ادمین '],
            ['name'=>'change_role','persian_name'=>'تغییر نقش کاربر '],
            ['name'=>'delete_user','persian_name'=>' حذف کاربر '],
            ['name'=>'delete_orders','persian_name'=>' حذف سفارش '],
        ]);
    }
}
