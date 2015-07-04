<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedRolesInRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert(
            array(
                'name' => 'root'
            )
        );

        DB::table('roles')->insert(
            array(
                'name' => 'sudo'
            )
        );

        DB::table('roles')->insert(
            array(
                'name' => 'customer'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('roles')->where('name', '=', 'root')->delete();
        DB::table('roles')->where('name', '=', 'sudo')->delete();
        DB::table('roles')->where('name', '=', 'customer')->delete();
    }
}