<?php

use App\Adachiku\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$datas = [
			[
				'id' => 1,
				'name' => 'マクロスクリニック',
			],
			[
				'id' => 2,
				'name' => '施設 02',
			],
			[
				'id' => 3,
				'name' => '施設 03',
			],
			[
				'id' => 4,
				'name' => '施設 04',
			],
			[
				'id' => 5,
				'name' => '施設 05',
			],
			[
				'id' => 6,
				'name' => '施設 06',
			],
		];
		foreach ($datas as $k => $item) {
			$obj = new Hospital();
			$item['is_deleted'] = 0;
			$obj->fill($item);
			if ($obj->save()) {
				echo "INS SUCCESS ITEM NAME {$item['name']} \n\r";
			} else {
				echo "INS ERROR ITEM NAME {$item['name']} \n\r";
			}
		}
		exit();
	}
}
