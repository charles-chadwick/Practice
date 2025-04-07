<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		DB::table('media')->truncate();
		
		// get the names of patients and users
		collect(User::all())
			->merge(Patient::all())
			->map(function ($model) {
				
				$this->addImage($model);
			});
		
	}
	
	private function addImage ($model) {
		
		$from_dir = database_path('src/avatars');
		
		// get the full name
		$name = [ $model->first ];
		if (isset($model->middle) && $model->middle != '') {
			$name[] = $model->middle;
		}
		$name[] = $model->last;
		
		$file_name = str_replace(' ', '_', strtolower(implode('_', $name)));
		$file_path = "$from_dir/$file_name/pic_0001.jpg";
		if (!\File::exists($file_path)) {
			echo "$file_path does not exist!\n";
			
			return;
		}

		
		$model->addMedia($file_path)
		      ->preservingOriginal()
		      ->toMediaCollection('avatars');
	}
	
}
