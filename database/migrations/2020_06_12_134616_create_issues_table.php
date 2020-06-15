<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bug_number_id');
            // $table->string('title')->nullable();
            // $table->string('environment')->nullable();
            // $table->string('steps_to_reproduce')->nullable();
            // $table->string('expected_result')->nullable();
            // $table->string('actual_result')->nullable();
            // $table->string('visual_proof')->nullable();
            // $table->string('priority')->nullable();

            // $table->string('version')->nullable();
            $table->string('status')->default('reported')->comment('reported, assigned, resolved, cancelled');
            $table->string('column_order')->nullable()->comment('columnOrder1:columnName1, columnOrder2:columnName2');

            // $table->string('url')->nullable();
            // $table->string('description')->nullable();
            // $table->unsignedBigInteger('customize_column_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('reporter_id')->nullable();
            $table->unsignedBigInteger('assign_to_id')->nullable();
            $table->timestamps();
        });

        Schema::create('columns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('issue_id')->nullable();
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('default_columns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('order');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('creator_id');
            $table->string('name');
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
        Schema::dropIfExists('issues');
        Schema::dropIfExists('columns');
        Schema::dropIfExists('default_columns');
        Schema::dropIfExists('projects');



    }
}
