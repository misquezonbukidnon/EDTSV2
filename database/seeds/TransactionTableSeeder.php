<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
        	[
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0001',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 6,
                'pr_descriptions_id' => 5,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ],
            [
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0002',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 4,
                'pr_descriptions_id' => 6,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ],
            [
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0003',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 8,
                'pr_descriptions_id' => 5,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ],
            [
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0004',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 2,
                'pr_descriptions_id' => 6,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ],
            [
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0005',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 9,
                'pr_descriptions_id' => 7,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ],
            [
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0006',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 7,
                'pr_descriptions_id' => 8,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ],
            [
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0007',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 5,
                'pr_descriptions_id' => 9,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ],
            [
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0008',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 6,
                'pr_descriptions_id' => 10,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ],
            [
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0008',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 8,
                'pr_descriptions_id' => 11,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ],
            [
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0010',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 14,
                'pr_descriptions_id' => 12,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ],
            [
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0011',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 15,
                'pr_descriptions_id' => 13,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ],
            [
                'date_of_entry' => '2020-12-08',
                'reference_id' => 'GF-0012',
                'sub_reference_id' => null,
                'description' => 'For Development Services',
                'process_types_id' => 1,
                'offices_id' => 2,
                'pr_descriptions_id' => 14,
                'amount' => 44456.23,
                'pr_actual_amount' => null,
                'client' => '',
                'address' => '',
                'statuses_id' => 2,
                'users_id' => 1,
                'endorsement_date' => '2020-12-08'
            ]
            
        ]);
    }
}
