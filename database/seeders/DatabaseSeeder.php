<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Skill;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat company
        $company = Company::create(['name' => 'Tech Corp']);


        // Membuat employees
        $employee1 = Employee::create(['name' => 'Alice', 'company_id' => $company->id]);
        $employee2 = Employee::create(['name' => 'Bob', 'company_id' => $company->id]);


        // Membuat skills
        $skillPHP = Skill::create(['name' => 'PHP']);
        $skillLaravel = Skill::create(['name' => 'Laravel']);
        $skillVue = Skill::create(['name' => 'Vue.js']);


        $employee1->skills()->sync([$skillPHP->id, $skillLaravel->id]);
        $employee2->skills()->sync([$skillVue->id]);
		
    }
}



