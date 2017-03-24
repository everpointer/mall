<?php

/**
 * Antvel - Seeder
 * Main Company Features Table.
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */
use Notadd\Shop\Models\Company;
use Illuminate\Database\Seeder;
use Notadd\Shop\Models\CompanyFeatures;

class CompanyFeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = Company::find('1');
        CompanyFeatures::create([
            'company_id'  => $company->id,
            'description' => trans('shop::globals.freeproducts'),
        ]);
    }
}
