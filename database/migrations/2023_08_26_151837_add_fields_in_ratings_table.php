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
        Schema::table('company_ratings', function (Blueprint $table) {

            $table->string("name")->after("id")->nullable();
            $table->string("email")->after("name")->nullable();

            $table->unsignedBigInteger("rated_by")->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_ratings', function (Blueprint $table) {

            $table->dropColumn("name");
            $table->dropColumn("email");

            $table->dropColumn("rated_by");

        });
    }
};
