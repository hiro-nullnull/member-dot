<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $insertMembers = [
            [
                'id' => null,
                'name' => 'しゃちょう',
                'icon_name' => '001',
                'member_type' => 'employee',
                'introduction' => 'すごいえらい',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id' => null,
                'name' => 'ぶちょう',
                'icon_name' => '002',
                'member_type' => 'employee',
                'introduction' => 'しゃちょうのつぎにえらい',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id' => null,
                'name' => 'かちょう',
                'icon_name' => '003',
                'member_type' => 'employee',
                'introduction' => 'ぶちょうのつぎにえらい',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id' => null,
                'name' => 'しゃいん',
                'icon_name' => '004',
                'member_type' => 'employee',
                'introduction' => 'しんじんです。がんばります。',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id' => null,
                'name' => 'いんたーん１号',
                'icon_name' => '005',
                'member_type' => 'intern',
                'introduction' => 'ぱない学生がきたもんだぜ',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id' => null,
                'name' => 'いんたーん２号',
                'icon_name' => '006',
                'member_type' => 'intern',
                'introduction' => 'え、この人の能力高すぎ？',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id' => null,
                'name' => 'ふいーらんすのひと００１',
                'icon_name' => '007',
                'member_type' => 'outsourcing',
                'introduction' => '抜き手一級の人。おそろしく早い手刀が必殺技。',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id' => null,
                'name' => 'ふいーらんすのひと００２',
                'icon_name' => '008',
                'member_type' => 'outsourcing',
                'introduction' => '歯周病治りました。',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'id' => null,
                'name' => 'ふいーらんすのひと００３',
                'icon_name' => '008',
                'member_type' => 'outsourcing',
                'introduction' => '体重が10kg増えました。',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]
        ];

        foreach ($insertMembers as $member) {
            DB::table('members')->insert($member);
        }
    }
}
