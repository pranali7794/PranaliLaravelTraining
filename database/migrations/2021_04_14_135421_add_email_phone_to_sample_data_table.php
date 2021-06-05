<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailPhoneToSampleDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sample_data', function (Blueprint $table) {
            $table->string('mobile',10);
            $table->string('email',100);
            $table->text('address');
            $table->string('gender',10);
            $table->integer('country_code');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sample_data', function (Blueprint $table) {
            $table->dropColumn('mobile');
            $table->dropColumn('email');
            $table->dropColumn('address');
            $table->dropColumn('gender');
            $table->dropColumn('country_code');
        });
    }
}
