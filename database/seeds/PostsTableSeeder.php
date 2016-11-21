<?php

use Illuminate\Database\Seeder;

use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #apaga os registros da tabela do DB
        Post::truncate();

        factory('App\Post', 20)->create();
    }
}
