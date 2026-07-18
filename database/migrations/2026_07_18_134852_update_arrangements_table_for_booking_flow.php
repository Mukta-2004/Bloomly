<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('arrangements', function (Blueprint $table) {
            $table->string('color_theme')->nullable()->after('occasion');
            $table->string('flowers')->nullable()->after('color_theme');
            $table->date('event_date')->nullable()->after('flowers');
            $table->time('event_time')->nullable()->after('event_date');
            $table->decimal('price', 10, 2)->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('title')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('arrangements', function (Blueprint $table) {
            $table->dropColumn(['color_theme', 'flowers', 'event_date', 'event_time']);
        });
    }
};