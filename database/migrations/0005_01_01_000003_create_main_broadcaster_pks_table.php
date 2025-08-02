<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('main_broadcaster_pks', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamp('date_start')->nullable();
      $table->timestamp('date_end')->nullable();
      $table->timestamp('date')->nullable();
      $table->string('name')->nullable();
      $table->integer('id_broadcaster')->unsigned();
      $table->string('vs_bigo_id')->nullable();
      $table->string('vs_bigo_username')->nullable();
      $table->text('description')->nullable();
      $table->string('banner')->nullable();
      $table->integer('active')->default(1);
      $table->integer('status')->default(1);
      $table->foreign('id_broadcaster')->references('id')->on('main_broadcaster_members')->onDelete('restrict')->onUpdate('restrict');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('main_broadcaster_pks');
  }

};
