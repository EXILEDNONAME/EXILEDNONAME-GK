<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('main_broadcaster_members', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamp('date_start')->nullable();
      $table->timestamp('date_end')->nullable();
      $table->timestamp('date')->nullable();
      $table->integer('verified')->nullable();
      $table->string('avatar')->nullable();
      $table->string('bigo_id')->nullable();
      $table->string('name');
      $table->string('regional')->nullable();
      $table->integer('phone')->nullable();
      $table->text('description')->nullable();
      $table->integer('active')->default(1);
      $table->integer('status')->default(1);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('main_broadcaster_members');
  }

};
