<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    public function run()
    {
        Section::create([
            'section_name' => 'قسم الطوارئ',
            'description' => 'يتم التعامل مع الحالات الطارئة في هذا القسم.',
        ]);

        Section::create([
            'section_name' => 'قسم الجراحة',
            'description' => 'يتم إجراء عمليات الجراحة في هذا القسم.',
        ]);

        Section::create([
            'section_name' => 'قسم النساء والتوليد',
            'description' => 'يتم رعاية النساء والأمهات الحوامل في هذا القسم.',
        ]);

        Section::create([
            'section_name' => 'قسم الأطفال',
            'description' => 'يتم علاج ومتابعة صحة الأطفال في هذا القسم.',
        ]);

        Section::create([
            'section_name' => 'قسم الباطنية',
            'description' => 'يتم تشخيص وعلاج الأمراض الباطنية في هذا القسم.',
        ]);
    }
}
