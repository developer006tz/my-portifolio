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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\ProjectTypes::class)->constrained();
            $table->string('title');
            $table->string('image');
            $table->string('github')->default('https://github.com/developer006tz');
            $table->string('url')->nullable();
            $table->text('description')->nullable();
            $table->text('technologies')->nullable();
            $table->text('features')->nullable();
            $table->text('challenges')->nullable();
            $table->text('lessons')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
