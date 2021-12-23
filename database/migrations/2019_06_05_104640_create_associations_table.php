<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('association_name');
            $table->string('association_email')->nullable();
            $table->string('association_address')->nullable();
            $table->string('association_contact')->nullable();
            $table->longText('association_description')->nullable();
            $table->string('association_logo')->nullable();
            $table->string('association_banner_color')->nullable();
            $table->string('association_momo_master')->nullable();
            $table->boolean('is_active');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('associations');
    }
}
