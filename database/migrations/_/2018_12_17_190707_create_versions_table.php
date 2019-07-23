<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVersionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_id');
            $table->string('version');
            $table->string('apk');
            $table->string('version_price');
            $table->string('compony');
            $table->string('visited');
            $table->string('downloaded');
            $table->text('change');
            $table->text('description');
            $table->text('requirements');
            $table->string('state');
            $table->string('status');
            $table->timestamps();
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
        Schema::drop('versions');
    }
}
