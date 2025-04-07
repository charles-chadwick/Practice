<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		DB::table('users')
		  ->truncate();
		
		$characters = [];
		$path = database_path('src/characters.csv'); // Ensure the file is in the `database/seeders` directory
		
		if (file_exists($path)) {
			$file = fopen($path, 'r');
			$headers = fgetcsv($file); // Get the header row of the CSV
			$index = 0;
			
			$roles = [
				0 => UserRole::Doctor,
				1 => UserRole::Doctor,
				2 => UserRole::Nurse,
				3 => UserRole::Nurse,
				4 => UserRole::Nurse,
				5 => UserRole::Staff,
				6 => UserRole::Staff,
				7 => UserRole::Staff,
				8 => UserRole::Staff,
				9 => UserRole::Staff,
				10 => UserRole::Staff,
			];
			
			while ( ( $row = fgetcsv($file) ) !== false ) {
				
				if ($index > 9) {
					break;
				}
				
				$row = collect($row)->map(function ($item) {
					
					return trim($item);
				});
				
				$first = $row[ 0 ];
				$middle = $row[ 1 ];
				$last = $row[ 2 ];
				$email = strtolower($first . '.' . str_replace(' ', '-', $last) . '@example.com');
				User::create(
					[
						"role"     => $roles[ $index ],
						"first"    => trim($first." ".$middle),
						"last"     => $last,
						"email"    => $email,
						"password" => strtolower($first . '123'),
					]
				);
				
				$index++;
			}
			
			fclose($file);
		}
		
		// dd($characters);
		
		
	}
	
}
