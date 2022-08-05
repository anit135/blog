<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Tag, Article, Comment};
use Illuminate\Support\Facades\DB;



class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagIds = Tag::pluck('id')->toArray();
        $articleIds = Article::pluck('id')->toArray();

        $article_tag = [];
        for ($i = 0; $i < 30; $i++) {
            $article_tag[$i] = [
                'tag_id' => $tagIds[array_rand($tagIds)],
                'article_id' => $articleIds[array_rand($articleIds)]
            ];
        }
        DB::table('article_tag')->insert($article_tag);
    }
}
