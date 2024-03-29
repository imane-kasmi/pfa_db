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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_utilisateur');
            $table->foreign('ID_utilisateur')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->string('titre');
            $table->foreignId('topic_id')->constrained('topics'); // Clé étrangère vers la table topics
            $table->text('description');
            $table->string('photo')->nullable();
            $table->date('publication_date');
            $table->string('mot_cle');
            $table->decimal('rating', 3, 2)->default(0); // Nombre réel entre 0 et 5
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
        Schema::dropIfExists('notes');
    }
};
