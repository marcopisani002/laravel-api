<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // Tabella ponte tra projects e technologies
        Schema::create('project_technology', function (Blueprint $table) {
            $table->id();

            // Abbiamo bisogno di 2 foreign key per le due tabelle da mettere in relazione
            $table->unsignedBigInteger("project_id");
            $table->foreign("project_id")->references("id")->on("projects");

            $table->unsignedBigInteger("technology_id");
            $table->foreign("technology_id")->references("id")->on("technologies");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('project_technology');
    }
};
