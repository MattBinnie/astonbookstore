<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('book_title');
            $table->string('author');
            $table->string('description', 9000);
            $table->string('release_year');
            $table->unsignedBigInteger('image1_id');
            $table->unsignedBigInteger('image2_id')
                ->nullable(true)
                ->default(NULL);
            $table->float('price', 8, 2);
            $table->integer('stock');
        });

        Schema::table('books', function($table)
        {
            
            $table->foreign('image1_id')
            ->references('id')->on('images')
            ->onDelete('cascade');

            $table->foreign('image2_id')
            ->references('id')->on('images')
            ->onDelete('cascade');
        });

        DB::table('books')->insert(
            array(
                'id' => 1,
                'book_title' => 'GCSE Computer Science',
                'author' => 'Richard Morgan',
                'description' => 'This programming book accompanies Cambridge IGCSE Computer Science introducing and developing the practical skills that will help readers to develop coding solutions to the tasks contained within.
                                 Starting from simple skills to more complex challenges, this book shows how to approach a coding problem using Structure Diagrams and Flow Charts, explains programming logic using pseudocode, and gives full solutions to the programming tasks set.',
                'release_year' => '2015',
                'image1_id' => 1,
                'image2_id' => 2,
                'price' => 16.98,
                'stock' => 10
            )
        );

        DB::table('books')->insert(
            array(
                'id' => 2,
                'book_title' => 'GCSE OCR Computer Science Revision Guide',
                'author' => 'CGP Books',
                'description' => 'This fantastic CGP Revision Guide covers everything students will need for the Grade 9-1 OCR GCSE Computer Science exams, from Software Systems to Pseudocode! Each topic is clearly explained in plain English, with plenty of helpful examples and tips - and we’ve included all the details needed for the top grades.',
                'release_year' => '2016',
                'image1_id' => 3,
                'image2_id' => 4,
                'price' => 5.77,
                'stock' => 10
            )
        );

        DB::table('books')->insert(
            array(
                'id' => 3,
                'book_title' => 'AQA GCSE Business Studies',
                'author' => 'Malcolm Surridge',
                'description' => 'This title has been written for the latest AQA GCSE Business Studies specification. It covers Unit 1: Setting up a Business and Unit 2: Growing as a Business and provides detailed advice on how to approach the controlled assessment in Unit 3.',
                'release_year' => '2009',
                'image1_id' => 5,
                'price' => 4.15,
                'stock' => 10
            )
        );

        DB::table('books')->insert(
            array(
                'id' => 4,
                'book_title' => 'Edexcel AS/A level Business 5th edition',
                'author' => 'Dave Hall',
                'description' => 'This Student Book is accompanied by an ActiveBook (digital version of the Student Book) and covers both the AS and A level courses for the Edexcel Business specification from 2015.',
                'release_year' => '2015',
                'image1_id' => 6,
                'price' => 40.86,
                'stock' => 10
            )
        );

        DB::table('books')->insert(
            array(
                'id' => 5,
                'book_title' => 'Madrigals Magic Key To Spanish',
                'author' => 'Margarita Madrigal',
                'description' => "Learn the basics of the Spanish language with this easy-to-use guide by one of America's most prominent language teachers. Anyone can read, write, and speak Spanish in only a few short weeks with this unique and proven method, which completely eliminates rote memorization and boring drills.",
                'release_year' => '2020',
                'image1_id' => 7,
                'price' => 10.93,
                'stock' => 10
            )
        );

        DB::table('books')->insert(
            array(
                'id' => 6,
                'book_title' => 'Talk Italian Complete',
                'author' => 'Alwena Lamping',
                'description' => 'Whether you’re learning for business, travel or just for fun, its clearly structured, step-by-step approach will ensure you’re soon able to communicate confidently in Italian in a range of everyday situations, from ordering food to renting property.',
                'release_year' => '2014',
                'image1_id' => 8,
                'price' => 20.90,
                'stock' => 10
            )
        );

        DB::table('books')->insert(
            array(
                'id' => 7,
                'book_title' => 'Fundamentals of Computer Science',
                'author' => 'Mark Burrell',
                'description' => 'Written for students taking their first course in computer systems architecture, this is an introductory textbook that meets syllabus requirements in a simple manner without being a weighty tome.
                                    The project is based around the simulation of a typical simple microprocessor so that students gain an understanding of the fundamental concepts of computer architecture on which they can build to understand the more advanced facilities and techniques employed by modern day microprocessors. 
                                    Each chapter includes a worked exercise, end-of-chapter exercises, and definitions of key words in the margins.',
                'release_year' => '2004',
                'image1_id' => 9,
                'price' => 35.99,
                'stock' => 10
            )
        );

        DB::table('books')->insert(
            array(
                'id' => 8,
                'book_title' => 'Complete Spanish Beginner',
                'author' => 'Juan Kattan-Ibarra',
                'description' => 'Do you want to develop a solid understanding of Spanish and communicate confidently with others? Through authentic conversations, vocabulary building, grammar explanations and extensive practice and review, Complete Spanish will equip you with the skills you need to use Spanish in a variety of settings and situations, developing your cultural awareness along the way. 
                                    What will I achieve by the end of the course? By the end of Complete Spanish you will have a solid intermediate-level grounding in the four key skills - reading, writing, speaking and listening - and be able to communicate with confidence and accuracy.',
                'release_year' => '2012',
                'image1_id' => 10,
                'price' => 23.99,
                'stock' => 10
            )
        );

        DB::table('books')->insert(
            array(
                'id' => 9,
                'book_title' => 'An Introductory Guide to Business',
                'author' => 'John Mann',
                'description' => 'Introductory Guide to Business',
                'release_year' => '2009',
                'image1_id' => 11,
                'price' => 16.41,
                'stock' => 10
            )
        );

        DB::table('books')->insert(
            array(
                'id' => 10,
                'book_title' => 'Computer Science An Overview - 13th Edition',
                'author' => 'Glenn Brookshear',
                'description' => 'Computer Science: An Overview is written for students of computer science as well as students from other disciplines. Its broad coverage and clear exposition are accessible to students from all backgrounds, encouraging a practical and realistic understanding of the subject.
                                    Written to provide students with a bottom-up, concrete-to-abstract foundation, this broad background exposes beginning computer science students to the breadth of the subject in which they are planning to major, and students from other disciplines to what they need to relate to the technical society in which they live.',
                'release_year' => '2019',
                'image1_id' => 12,
                'price' => 50.44,
                'stock' => 10
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
        Schema::dropIfExists('books');
    }
}
