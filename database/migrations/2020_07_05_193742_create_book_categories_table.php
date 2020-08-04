<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('category_id');
        });

        Schema::table('book_categories', function($table)
        {
            $table->foreign('book_id')
            ->references('id')->on('books')
            ->onDelete('cascade');

            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');
        });
        
        DB::table('book_categories')->insert(
            array(
                'id' => 1,
                'book_id' => 1,
                'category_id' => 1
            )
        );

        DB::table('book_categories')->insert(
            array(
                'id' => 2,
                'book_id' => 1,
                'category_id' => 2
            )
        );

        DB::table('book_categories')->insert(
            array(
                'id' => 3,
                'book_id' => 2,
                'category_id' => 2
            )
        );

        DB::table('book_categories')->insert(
            array(
                'id' => 4,
                'book_id' => 3,
                'category_id' => 2
            )
        );

        DB::table('book_categories')->insert(
            array(
                'id' => 5,
                'book_id' => 4,
                'category_id' => 2
            )
        );

        DB::table('book_categories')->insert(
            array(
                'id' => 6,
                'book_id' => 5,
                'category_id' => 3
            )
        );

        DB::table('book_categories')->insert(
            array(
                'id' => 7,
                'book_id' => 6,
                'category_id' => 3
            )
        );

        DB::table('book_categories')->insert(
            array(
                'id' => 8,
                'book_id' => 7,
                'category_id' => 1
            )
        );

        DB::table('book_categories')->insert(
            array(
                'id' => 9,
                'book_id' => 8,
                'category_id' => 3
            )
        );

        DB::table('book_categories')->insert(
            array(
                'id' => 10,
                'book_id' => 9,
                'category_id' => 2
            )
        );

        DB::table('book_categories')->insert(
            array(
                'id' => 11,
                'book_id' => 10,
                'category_id' => 1
            )
        );

        DB::table('book_categories')->insert(
            array(
                'id' => 12,
                'book_id' => 10,
                'category_id' => 2
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
        Schema::dropIfExists('book_categories');
    }
}
