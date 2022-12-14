<?php

use Dflydev\DotAccessData\Data;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {

            $table->timestamps();
            $table->increments('id');
            $table->text("list_title");
            $table->text("list_author")->nullable();
            $table->date("list_published_date")->default(Date::now());
            $table->text("list_published_date_precision")->nullable();
            $table->text("list_link")->nullable();
            $table->text("list_clean_url")->nullable();
            $table->text("list_excerpt");
            $table->longText("list_summary");
            $table->text("list_rights")->nullable();
            $table->integer("list_rank")->nullable();
            $table->text("list_topic")->nullable();
            $table->text("list_country")->nullable();
            $table->text("list_language")->nullable();
            $table->text("list_authors")->nullable();
            $table->text("list_media");
            $table->text("list_is_opinion")->nullable();
            $table->text("list_twitter_account")->nullable();
            $table->integer("list_score")->nullable();
            $table->softDeletes();
        });
    }











    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
