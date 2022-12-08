<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->text(`list_title`);
            $table->text(`list_author`);
            $table->date(`list_published_date`);
            $table->text(`list_published_date_precision`);
            $table->text(`list_link`);
            $table->text(`list_clean_url`);
            $table->text(`list_excerpt`);
            $table->longText("list_summary");
            $table->text(`list_rights`);
            $table->integer(`list_rank`);
            $table->text(`list_topic`);
            $table->text(`list_country`);
            $table->text(`list_language`);
            $table->text(`list_authors`);
            $table->text(`list_media`);
            $table->text(`list_is_opinion`);
            $table->text(`list_twitter_account`);
            $table->integer(`list_score`);
            $table->text(`list_authors`);
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
