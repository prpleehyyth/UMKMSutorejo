<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeHalalCertifiedToStringOnUmkmsTable extends Migration
{
    public function up()
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->string('halal_certified')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->boolean('halal_certified')->default(false)->change();
        });
    }
}
