<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('url');
        });

        DB::table('images')->insert(
            array(
                'id' => 1,
                'url' => 'https://images-na.ssl-images-amazon.com/images/I/51Vhhq1qGiL.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'id' => 2,
                'url' => 'https://images-na.ssl-images-amazon.com/images/I/41s-YfJB7HL.jpg'
            )
        );
    
        DB::table('images')->insert(
            array(
                'id' => 3,
                'url' => 'https://images-na.ssl-images-amazon.com/images/I/91sBY4pQWNL.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'id' => 4,
                'url' => 'https://images-na.ssl-images-amazon.com/images/I/91Hw6gCKtYL.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'id' => 5,
                'url' => 'https://images-na.ssl-images-amazon.com/images/I/51facB+DdIL.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'id' => 6,
                'url' => 'https://images-na.ssl-images-amazon.com/images/I/51GwGZv5JWL.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'id' => 7,
                'url' => 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/3854/9780385410953.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'id' => 8,
                'url' => 'https://images-na.ssl-images-amazon.com/images/I/41z-pNhDwgL.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'id' => 9,
                'url' => 'https://images-na.ssl-images-amazon.com/images/I/41BDbiVK9LL._SX382_BO1,204,203,200_.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'id' => 10,
                'url' => 'https://wordery.com/jackets/f7920ffe/m/complete-spanish-beginner-to-intermediate-book-and-audio-course-juan-kattan-ibarra-9781444177244.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'id' => 11,
                'url' => 'https://images-na.ssl-images-amazon.com/images/I/41RYmKQg6GL._SX383_BO1,204,203,200_.jpg'
            )
        );

        DB::table('images')->insert(
            array(
                'id' => 12,
                'url' => 'https://images-na.ssl-images-amazon.com/images/I/518TLI8Dd8L.jpg'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
