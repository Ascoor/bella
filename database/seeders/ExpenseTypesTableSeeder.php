<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExpenseType;

class ExpenseTypesTableSeeder extends Seeder
{
    public function run()
    {
        ExpenseType::create([
            'name' => 'مستلزمات طبية',
            'description' => 'تكاليف شراء مستلزمات طبية وأدوات.',
        ]);

        ExpenseType::create([
            'name' => 'رواتب الموظفين',
            'description' => 'تكاليف دفع رواتب الموظفين.',
        ]);

        ExpenseType::create([
            'name' => 'مصاريف عامة',
            'description' => 'تكاليف أخرى تشمل المصاريف العامة للمشفى.',
        ]);

        ExpenseType::create([
            'name' => 'تجهيزات طبية',
            'description' => 'تكاليف شراء وصيانة تجهيزات طبية.',
        ]);

        ExpenseType::create([
            'name' => 'تكاليف إدارية',
            'description' => 'تكاليف مصروفات إدارية ومكتبية.',
        ]);
    }
}
