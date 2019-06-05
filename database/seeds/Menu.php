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
            ['cà ri chay','Cà rốt, khoai tây, khoai môn, trứng - thực vật, nấm, sả và bột cà ri ăn với cơm trắng',135000,3,'image002.jpg'],
            ['Rau xào w hạt điều, đậu xanh','Đậu phụ xào, hoa cauli, bông cải xanh, cà chua anh đào, bắp non w hạt điều, ăn với cơm trắng.',145000,1,'image003.jpg'],
            ['Thịt lợn om với nước sốt dừa','Thịt lợn ướp vai được ướp với hành tây, tỏi và nước mắm Phú Quốc, sau đó nướng từ từ trong nồi đất sét, đi kèm với cơm trắng',210000,2,'image004.jpg'],
            ['sườn heo nướng','Phục vụ trộn rau xanh, khoai tây chiên & sốt BBQ tự làm.',145000,2,'image005.jpg'],
            ['Gà nướng ướp lá chanh','Đùi gà nướng ướp, phục vụ salad bên, cơm trắng, lá chanh xào và sốt mù tạt',320000,2,'image006.jpg'],
            ['Burger thịt bò Úc','Thịt bò xay, phô mai cheddar, thịt xông khói, rau diếp, cà chua, sốt mayonnaise trứng, ăn kèm với khoai tây chiên',900000,3,'image007.jpg'],
            ['Salad đu đủ xanh với tôm','Đu đủ xanh trộn ác loại thảo mộc địa phương, cà rốt, đậu phộng, ớt chuông,kèm tôm',99000,2,'image009.png'],
            ['Salad xoài xnah với tôm và thịt lợn thăn','Xoài xanh trộng với thịt lợn, cà rốt, giá đỗ, hành tây, ớt chuông, đậu phộng, các loại thảo mộc địa phương, nước sốt chua ngọt',125000,2,'image010.jpg'],
            ['Salad thảo dược','Sự kết hợp của rau diếp giòn, trứng cút luộc cứng, cà chua cherry, lát táo, ô liu đen, phô mai parmesan và phô mai xanh, nước sốt hạnh nhân nướng',110000,2,'image011.jpg'],
            ['Salad Caesar','Romaine rau diếp, thịt xông khói giòn, trứng luộc, nước sốt cá cơm, crouton, phô mai parmesan và nước sốt Caesar',125000,1,'image012.jpg'],
            ['Salad cá ngừ ướp muối','Các chảo làm khô cá ngừ vụn trong hạt vừng, cà chua anh đào, rau diếp, hạch nhân nướng với nước sốt Balsamic',75000,1,'image013.jpg'],
            ['Súp đậu xanh','Đậu hà lan xanh, khoai tây, hành tây, cần tây,kem, nước dùng rau và bánh mì',65000,3,'image014.jpg'],
            ['Súp bí ngô kem','',89000,3,'image015.jpg'],
            ['Súp hành tây cổ điển Pháp','Hành tây nấu chậm, lá húng tây trong nước thịt bò phục vụ bánh mì phô mai nướng',99000,3,'image016.jpg'],
            ['Tôm yum goong','thái nếm nước dùng nóng và chua, tôm, nấm, galingale, sả, lá chanh và nước cốt dừa',10000,3,'image017.jpg'],
            ['Jack Daniel Sườn cay và ngọt','',400000,2,'image019.jpg'],
            ['Jack Daniel nấu chín chậm ngọt và cay','',650000,2,'image023.jpg'],
            ['Lasagna','thịt bò, rau, ăn kèm với bánh mì tỏi',320000,1,'image025.jpg'],
            ['Spaghetti Ý','mì spaghetti và nước sốt thịt bò truyền thống',75000,1,'image029.jpg'],
            ['Steak và nấm Penne','',75000,1,'image031.jpg'],
            ['Salad Caesar','',70000,1,'image033.jpg'],
            ['Sườn nấu chậm Unique','SƯờn nước được phục vụ kèm khoai tây bổ cau, bắp cải trộn và vi sauce Unique',750000,2,'image035.jpg'],
            ['Calamari','Mực cuộn quang năng lượng lúa mì, lòng đỏ trứng và gia vị, đi kèm với mayonnaise',125000,1,'image036.jpg'],
            ['Nachos thịt bò phô mai','Cơ sở bột nướng, thịt bò, ớt chuông và mozzarella',95000,1,'image037.jpg'],
            ['Quebec Poutine Canada','Phô mai mozzarella, rau mùi tây và nước thịt bò',145000,1,'image038.jpg'],
            ['Sandwich Club','Trứng, giăm bông, phô mai chedlar, cà chua, rau diếp, ứng gà nướng, sốt mayonnaise, ăn kèm với khoai tây chiên',200000,2,'image039.jpg'],
            ['Caramen handmake','',85000,4,'image043.png'],
            ['Kem brulee w trái cây','',85000,4,'image044.jpg'],
            ['Banana crepe w kem','',85000,4,'image045.jpg'],
            ['Banana crepe w Socola mousse','',75000,4,'image046.png'],
            ['Tiramisu','Phô mai, kem, sửa, bánh rum sampa cacao, lòng đỏ trứng, đường',95000,4,'image047.jpg'],
            ['chuối flambéed','Phục vụ với một muỗng kem',45000,4,'image042.jpg'],
            ['Bia Hoergaarden','Bia Bỉ 1978',540000,5,'bia1.jpg'],
            ['Chimay','Bia Bỉ 1780',1200000,5,'bia2.jpg'],
            ['Gulden draak','Bia Đức 1800',1300000,5,'bia3.jpg'],
            ['Hupulus hopera','Bia Pháp 1770',2200000,5,'bia4.jpg'],
            ['Sinh tố dưa hấu','',80000,5,'hoaqua1.png'],
            ['Sinh tố chanh leo','',78000,5,'hoaqua2.jpg'],
            ['Carlo Rossi','Rượu nho mỹ 1700',3000000,5,'ruou3.jpg'],
            ['Napa Valley USA','Rượu nho mỹ 1978',2100000,5,'ruou1.jpg'],
            ['Chivas 18','',4000000,5,'ruou5.jpg'],
            ['Sinh tố bơ','',80000,5,'sinh-to-bo.jpg'],
            ['Strongbow Apple Ciders','',120000,5,'strongbow2.jpg'],
            ['Strongbow Apple Yellow','',120000,5,'strongbow3.jpg']

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
