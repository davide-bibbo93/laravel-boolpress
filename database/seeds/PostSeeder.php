<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Author;
use App\AuthorDetail;
use App\Post;
use App\Comment;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 20; $i++) {

            // creo nuovo autore e salvalo
            $author = new Author();
            $author->name = $faker->firstName();
            $author->surname = $faker->lastName();
            $author->email = $faker->email();
            $author->save();

            // creo dettaglio autore
            $authorDetail = new AuthorDetail();
            $authorDetail->bio = $faker->text();
            $authorDetail->website = $faker->url();
            $authorDetail->pic = 'https://picsum.photos/seed/' . rand(0, 1000) . '/200/300';
            // linko le due tabelle e lo salvo
            $author->detail()->save($authorDetail); // $authorDetail->author_id = $author->id;

            for($x = 0; $x < rand(2, 4); $x++) {
                $post = new Post();
                $post->title = $faker->text(20);
                $post->body = $faker->text(1000);
                $author->posts()->save($post);

                for($a = 0; $a < rand(2, 4); $a++) {
                    $comment = new Comment();
                    $comment->text = $faker->paragraph();
                    $comment->date = $faker->dateTime();
                    $post->comment()->save($comment);
                }
            }
        }

    }
}
