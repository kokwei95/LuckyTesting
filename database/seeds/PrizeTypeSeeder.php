<?php

use Illuminate\Database\Seeder;
use App\Models\PrizeType;

class PrizeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prize = [
            [
               'name'=>'third_1',
               'title'=>'Third Prize - 1st Winner',
            ],
            [
                'name'=>'third_2',
                'title'=>'Third Prize - 2nd Winner',
             ],
             [
                'name'=>'third_3',
                'title'=>'Third Prize - 3rd Winner',
             ],
             [
                'name'=>'second_1',
                'title'=>'Second Prize - 1st Winner',
             ],
             [
                'name'=>'second_2',
                'title'=>'Second Prize - 2nd Winner',
             ],
             [
                'name'=>'first_1',
                'title'=>'First Prize',
             ],
        ];
  
        foreach ($prize as $key => $value) {
            PrizeType::create($value);
        }
    }
}
