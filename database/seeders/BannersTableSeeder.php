<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;
use Illuminate\Support\Facades\DB;

class BannersTableSeeder extends Seeder
{
    public function run()
    {
        // Tạo dữ liệu mẫu cho bảng banners
        DB::table('banners')->insert([
        // Banner::create([
            'name' => 'Banner 1',
            'srcImage' => 'banner1.jpg',
        ]);

        DB::table('banners')->insert([
            'name' => 'Banner 2',
            'srcImage' => 'banner2.jpg',
        ]);

        // Thêm các bản ghi khác nếu cần thiết
    }
}
