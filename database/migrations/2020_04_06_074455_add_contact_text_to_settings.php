<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactTextToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //add column 'contact_text' to 'settings'
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('contact_text', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('contact_text');
        });
    }
}
