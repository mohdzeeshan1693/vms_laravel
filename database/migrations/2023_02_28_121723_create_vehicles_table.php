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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('serial_no')->nullable();
            $table->string('plate_no_en')->nullable();
            $table->string('plate_no_ar')->nullable();
            $table->string('chassis_number')->nullable();
            $table->integer('status')->nullable();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->string('model')->nullable();
            $table->integer('machine_type')->nullable();
            $table->integer('vehicle_type')->nullable();
            $table->integer('year')->nullable();
            $table->integer('project')->nullable();
            $table->string('value')->nullable();
            $table->integer('owner')->nullable();
            $table->string('owner_id')->nullable();
            $table->integer('color')->nullable();
            $table->string('aswaq_no')->nullable();
            $table->string('file_no')->nullable();
            $table->integer('driver_file_no')->nullable();
            $table->longText('notes')->nullable();
            $table->integer('working_status')->nullable();
            $table->integer('meter_type')->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->timestamps();
            
            //foreign keys
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
