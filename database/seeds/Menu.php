<?php

use Illuminate\Database\Seeder;
class Menu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('menu')->truncate();
        $menu=[
            ['Tôm nướng ớt chuông, hành tây xiên','Phục vụ cơm trắng và sốt me',900000,1,'image001.jpg'],
            ['cà ri chay','Cà rốt, khoai tây, khoai môn, trứng - thực vật, nấm, sả và bột cà ri ăn với cơm trắng',135000,1,'image002.jpg'],
            ['Rau xào w hạt điều, đậu xanh','Đậu phụ xào, hoa cauli, bông cải xanh, cà chua anh đào, bắp non w hạt điều, ăn với cơm trắng.',145000,1,'image003.jpg'],
            ['Thịt lợn om với nước sốt dừa','Thịt lợn ướp vai được ướp với hành tây, tỏi và nước mắm Phú Quốc, sau đó nướng từ từ trong nồi đất sét, đi kèm với cơm trắng',210000,2,'image004.jpg'],
            ['sườn heo nướng','Phục vụ trộn rau xanh, khoai tây chiên & sốt BBQ tự làm.',145000,2,'image005.jpg'],
            ['Gà nướng ướp lá chanh','Đùi gà nướng ướp, phục vụ salad bên, cơm trắng, lá chanh xào và sốt mù tạt',320000,2,'image006.jpg'],
            ['Burger thịt bò Úc','Thịt bò xay, phô mai cheddar, thịt xông khói, rau diếp, cà chua, sốt mayonnaise trứng, ăn kèm với khoai tây chiên',900000,3,'image007.jpg'],
            ['chuối flambéed','Phục vụ với một muỗng kem',45000,4,'image042.jpg']
        ];
        foreach ($menu as $menus) {
            DB::table('menu')->insert([
                'name' => $menus[0],
                'description' => $menus[1],
                'price' => $menus[2],
                'category_id' => $menus[3],
                'image' => $menus[4]
            ]);
        }



        Schema::enableForeignKeyConstraints();
    }
}
