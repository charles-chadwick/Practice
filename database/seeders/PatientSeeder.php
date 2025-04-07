<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		DB::table('patients')->truncate();
		
		$characters = [];
		$path = database_path('src/characters.csv'); // Ensure the file is in the `database/seeders` directory
		
		if (file_exists($path)) {
			$file = fopen($path, 'r');
			$headers = fgetcsv($file); // Get the header row of the CSV
			$index = 0;
			
			while ( ( $row = fgetcsv($file) ) !== false ) {
				
				$index++;
				if ($index < 11) { continue; }
				
				$row = collect($row)->map(function ($item) {
					
					return trim($item);
				});
				
				$first = $row[ 0 ];
				$middle = $row[ 1 ];
				$last = $row[ 2 ];
				$email = strtolower($first . '.' . str_replace(' ', '-', $last) . '@example.com');
				Patient::factory()
				       ->create(
					       [
						       "first"  => $first,
						       "middle" => $middle,
						       "last"   => $last,
						       "gender" => $row[ 3 ],
						       "email"  => $email,
					       ]
				       );
				
	
			}
			
			fclose($file);
		}
		
		// dd($characters);
		
		
	}
	
}
