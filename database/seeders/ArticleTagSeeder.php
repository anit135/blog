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

        $article_tags = [];
        foreach ($articleIds as $item_ar) {
            $amount_tags = rand(1, 5);
            $get_tags = array_rand($tagIds, $amount_tags);

            if (!is_array($get_tags)) {
                $article_tags[] = [
                    'tag_id' => $get_tags,
                    'article_id' => $item_ar
                ];
            } else {
                foreach ($get_tags as $item_tag) {
                    $article_tags[] = [
                        'tag_id' => $item_tag,
                        'article_id' => $item_ar
                    ];
                }
            }
        }

        DB::table('article_tag')->insert($article_tags);
    }
}
