<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class AddScheduleHistorySettingsToSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Config::get('filament-database-schedule.table.schedules', 'schedules'), function (Blueprint $table) {
            $table->boolean('limit_history_count')->default(false);
            $table->integer('max_history_count')->default(10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Config::get('filament-database-schedule.table.schedules', 'schedules'), function (Blueprint $table) {
            $table->dropColumn(['limit_history_count','max_history_count']);
        });
    }
}
