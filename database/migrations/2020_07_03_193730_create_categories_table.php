<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('category');
        });

        DB::table('categories')->insert(
            array(
                'id' => 1,
                'category' => 'Computing'
            )
        );

        DB::table('categories')->insert(
            array(
                'id' => 2,
                'category' => 'Business'
            )
        );

        DB::table('categories')->insert(
            array(
                'id' => 3,
                'category' => 'Languages'
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
        Schema::dropIfExists('categories');
    }
}
