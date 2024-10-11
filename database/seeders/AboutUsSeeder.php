<?php

// AboutUsSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    public function run()
    {
        $teamMembers = [
            [
                'title' => 'Giới thiệu FreshShop',
                'description' => "
                Chào mừng đến FreshShop, nơi những sắc màu rực rỡ của thiên nhiên hòa quyện cùng hương thơm tinh tế của hoa, tạo nên một ốc đảo thanh bình và quyến rũ. Cửa hàng của chúng tôi không chỉ là nơi để mua hoa; đó là một thiên đường nơi những kỳ quan của thế giới tự nhiên được tái hiện trong những tác phẩm hoa tuyệt đẹp. Từ sự tươi sáng rực rỡ của những bông hoa cúc hôn mặt trời đến vẻ đẹp thanh lịch của những bông hồng nhung, mỗi bông hoa được lựa chọn cẩn thận để thắp sáng niềm vui và truyền cảm hứng cho những khoảnh khắc kinh ngạc.

                Hãy bước vào và đắm mình trong thế giới kỳ diệu, nơi mỗi nhành hoa kể một câu chuyện về tình yêu, lễ kỷ niệm hoặc sự an ủi. Cho dù bạn đang tìm kiếm bó hoa hoàn hảo để làm bừng sáng ngày của ai đó hay tìm kiếm một vật trang trí trung tâm toát lên tinh túy của một dịp đặc biệt, những người bán hoa giàu kiến thức của chúng tôi luôn sẵn sàng hướng dẫn bạn bằng chuyên môn và niềm đam mê của họ.
                
                
                ",
                'image' => 'AboutUs/flower-pictures-unpxbv1q9kxyqr1d.jpg',
            ],
            [
                'title' => 'John Doe',
                'description' => 'John Doe là thợ cắm hoa chính của chúng tôi với hơn 10 năm kinh nghiệm trong lĩnh vực thiết kế hoa. Anh ấy đam mê tạo ra những tác phẩm hoa độc đáo và trang nhã cho mọi dịp.',
                'image' => 'AboutUs/img-1.jpg',
            ],
            [
                'title' => 'Jane Smith',
                'description' => 'Jane Smith là giám đốc sáng tạo và chuyên gia về thiết kế hoa cưới của chúng tôi. Với con mắt tinh tường về chi tiết và các thiết kế sáng tạo, cô ấy biến những giấc mơ thành hiện thực cho các cặp đôi trong ngày trọng đại của họ.',
                'image' => 'AboutUs/img-2.jpg',
            ],
            [
                'title' => 'Michael Johnson',
                'description' => 'Michael Johnson là đại diện dịch vụ khách hàng tận tâm của chúng tôi. Anh ấy đảm bảo rằng mọi khách hàng đều nhận được sự chăm sóc và hỗ trợ cá nhân hóa trong việc lựa chọn những kiểu dáng hoa hoàn hảo.
                ',
                'image' => 'AboutUs/img-3.jpg',
            ],
            [
                'title' => 'Emily Brown',
                'description' => 'Emily Brown là nghệ sĩ cắm hoa tài năng của chúng tôi, chuyên về các bó hoa và sắp xếp hoa thủ công. Với óc sáng tạo và chuyên môn của mình, cô ấy biến những bông hoa thành những tác phẩm nghệ thuật.',
                'image' => 'AboutUs/img-1.jpg',
            ],
        ];

        foreach ($teamMembers as $member) {
            DB::table('about_us')->insert([
                'title' => $member['title'],
                'description' => $member['description'],
                'image' => $member['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
