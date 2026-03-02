<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('news')->insert([
         'user_id' => 1,
         'status' => 1,
         'title' => 'Pengumuman Libur Nasional dan Cuti Bersama Tanggal 8 & 9 Februari',
         'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem hic eveniet nam laudantium sequi! Recusandae fugit quis placeat autem veritatis culpa minima fugiat illum aliquam? Omnis itaque eum voluptatem, voluptate dolores quas dignissimos tempora? Explicabo doloribus officiis eveniet necessitatibus labore laudantium, eius adipisci, blanditiis quibusdam, praesentium numquam perspiciatis asperiores? Ea quaerat officiis accusamus quos neque fugiat voluptas error unde, perspiciatis quasi distinctio, repudiandae eligendi odio consectetur deleniti nesciunt incidunt sapiente sit ipsa ratione et amet. Accusantium, id sed, facere nemo dolore omnis fuga dolores animi nihil commodi illo ipsum vel quibusdam ab minima, quae at tenetur expedita? Quidem aspernatur maiores consequuntur perspiciatis libero nisi distinctio culpa? Quae sunt mollitia fugit cupiditate iusto repellendus possimus, nesciunt molestiae dolores similique, porro hic. Eos nam quasi modi accusamus illum alias neque, corrupti sed exercitationem porro, laudantium, est perferendis magni dolorem! Dolor, et.',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);
   }
}


