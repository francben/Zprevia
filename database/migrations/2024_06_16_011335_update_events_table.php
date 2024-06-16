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
        Schema::table('events', function (Blueprint $table) {
            // Rename the existing 'date' column to 'start_date'
            $table->renameColumn('datetime', 'start_date');
            
            // Add the new 'end_date' column
            $table->date('end_date')->nullable();
            
            // Add the timestamps columns
            $table->timestamps(); // This adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // Revert the 'start_date' column back to 'date'
            $table->renameColumn('start_date', 'date');
            
            // Drop the 'end_date' column
            $table->dropColumn('end_date');
            
            // Drop the timestamps columns
            $table->dropTimestamps(); // This removes 'created_at' and 'updated_at' columns
        });
    }
};
