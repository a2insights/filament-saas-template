<?php

use HusamTariq\FilamentDatabaseSchedule\Enums\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ChangeStatusTypeInScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Config::get('filament-database-schedule.table.schedules', 'schedules'), function (Blueprint $table) {
            $table->enum('new_status', Status::toArray())->nullable()->after('status');
        });

        DB::table(Config::get('filament-database-schedule.table.schedules', 'schedules'))->where('status', 0)->update(['new_status' => Status::Inactive]);
        DB::table(Config::get('filament-database-schedule.table.schedules', 'schedules'))->where('status', 1)->update(['new_status' => Status::Active]);
        DB::table(Config::get('filament-database-schedule.table.schedules', 'schedules'))->where('status', 3)->update(['new_status' => Status::Trashed]);

        Schema::table(Config::get('filament-database-schedule.table.schedules', 'schedules'), function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table(Config::get('filament-database-schedule.table.schedules', 'schedules'), function (Blueprint $table) {
            $table->renameColumn('new_status', 'status');
        });
        Schema::table(Config::get('filament-database-schedule.table.schedules', 'schedules'), function (Blueprint $table) {
            $table->enum('status', Status::toArray())->default(Status::Active)->change();
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
            $table->boolean('old_status')->default(true)->after('status');
        });

        DB::table(Config::get('filament-database-schedule.table.schedules', 'schedules'))->where('status', 'inactive')->update(['old_status' => 0]);
        DB::table(Config::get('filament-database-schedule.table.schedules', 'schedules'))->where('status', 'active')->update(['old_status' => 1]);
        DB::table(Config::get('filament-database-schedule.table.schedules', 'schedules'))->where('status', 'trashed')->update(['old_status' => 3]);

        Schema::table(Config::get('filament-database-schedule.table.schedules', 'schedules'), function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table(Config::get('filament-database-schedule.table.schedules', 'schedules'), function (Blueprint $table) {
            $table->renameColumn('old_status', 'status');
        });
    }
}
