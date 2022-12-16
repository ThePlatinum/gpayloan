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
    Schema::create('old_loans', function (Blueprint $table) {
      $table->id();
      $table->string('firstName');
      $table->string('lastName');
      $table->string('otherName');
      $table->string('email');
      $table->string('phone');
      $table->string('address');
      $table->string('lgArea');
      $table->string('state');
      $table->string('loanPurpose');
      $table->string('loanDuration');
      $table->string('amount');
      $table->string('bvn');
      $table->string('bank');
      $table->string('accountNumber');
      $table->string('status')->default('Pending');
      $table->string('signature');
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
    Schema::dropIfExists('old_loans');
  }
};
