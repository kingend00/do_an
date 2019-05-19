<?php

use Illuminate\Database\Seeder;
class News extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('news')->truncate();
        $seats=[
            ['Sự kiện mùa hè nóng','image001.jpg','Nhân dịp mùa hè sắp đến , nhà hàng khuyến mãi, giảm giá toàn bộ các món ăn bữa trưa...'],
            ['Sự kiện mùa đông ấm áp','image002.jpg','Mùa đông năm nay, để khách hàng có thể trải nghiệm các món ăn ấm áp , nhân dịp này...']
        ];
        foreach ($seats as $seat) {
            DB::table('news')->insert([
                'title' => $seat[0],
                'image' => $seat[1],
                'content'=> $seat[2]
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
