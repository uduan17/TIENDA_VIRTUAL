<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeed extends Seeder
{

	public function run()
	{
		//1
		DB::table('categories')->insert([

			'name' => 'Vehiculos',
		]);

		//2
		DB::table('categories')->insert([

			'name' => 'Electrodomesticos',
		]);

		//3
		DB::table('categories')->insert([

			'name' => 'Tecnologia',
		]);
	}
}
