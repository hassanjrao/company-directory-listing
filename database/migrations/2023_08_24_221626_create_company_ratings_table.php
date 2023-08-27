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
        Schema::create('company_ratings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("company_id");
            $table->foreign("company_id")->references("id")->on("companies");

            $table->unsignedBigInteger("rated_by");
            $table->foreign("rated_by")->references("id")->on("users");

            $table->unsignedTinyInteger("rating");

            $table->text("comment")->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_ratings');
    }
};
