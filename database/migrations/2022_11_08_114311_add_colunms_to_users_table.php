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
        Schema::table('users', function (Blueprint $table) {
            
  	// Los campos que agregamos 
      $table->string('address')->nullable()->after('name');
      $table->string('phone')->nullable()->after('name');
      $table->string('gender')->nullable()->after('name');
      $table->string('birthdate')->nullable()->after('name');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // para que se nos eliminen cuando ramos refresh o fresh
               $table->dropColumn('address');
               $table->dropColumn('phone');
               $table->dropColumn('gender');
               $table->dropColumn('birthdate');
        });
    }
};
