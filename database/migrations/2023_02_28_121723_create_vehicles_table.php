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
            $table->bigInteger('vehicle_type_id')->unsigned()->nullable();
            $table->integer('secondary_type_id')->nullable();
            $table->integer('year')->nullable();
            $table->bigInteger('project_id')->unsigned()->nullable();
            $table->string('value')->nullable();
            $table->integer('owner_id')->nullable();
            $table->string('owner_id_no')->nullable();
            $table->bigInteger('color_id')->unsigned()->nullable();
            $table->string('aswaq_no')->nullable();
            $table->string('file_no')->nullable();
            $table->integer('driver_file_no')->nullable();
            $table->longText('notes')->nullable();
            $table->integer('working_status_id')->nullable();
            $table->bigInteger('meter_type_id')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->timestamps();
            
            //foreign keys
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('color_id')->references('id')->on('colors')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('meter_type_id')->references('id')->on('meter_types')->onUpdate('cascade')->onDelete('restrict');
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
