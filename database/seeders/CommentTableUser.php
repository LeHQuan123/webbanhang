<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CommentTableUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'com_id'=> '1',
                'com_email'=>'admin@gmail.com',
                'com_name'=>'quan',
                'com_content'=>'dep',
                'com_product'=>'1',

                
                
                
            ],
           
            ];
            DB::table('vp_comments')->insert($data);
    }
}
