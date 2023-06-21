<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $types = ['HTML', 'CSS', 'JavaScript', 'VUE', 'VITE', 'PHP', 'LARAVEL' ];

    foreach($types as $type){
      $new_type = new Type();
      $new_type->name = $type;
      $new_type->slug = Str::slug($type, '-');
      $new_type->save();
    }
  }
}
