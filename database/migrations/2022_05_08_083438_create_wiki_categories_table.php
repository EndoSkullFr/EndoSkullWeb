<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wiki_categories', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("slug")->unique();
            $table->string("description");
            $table->string("icon");
            $table->timestamps();
        });
        DB::table('wiki_categories')->insert(
            array(
                'name' => 'Le serveur',
                'slug' => 'le-server',
                'description' => 'Toutes les informations sur le fonctionnement globale du serveur',
                'icon' => 'https://images.emojiterra.com/google/android-oreo/512px/2139.png'
            )
        );
        DB::table('wiki_categories')->insert(
            array(
                'name' => 'PvpKit',
                'slug' => 'pvpkit',
                'description' => 'Toutes les informations sur ce mode de jeux pvp',
                'icon' => 'https://images.emojiterra.com/twitter/512px/2694.png'
            )
        );
        DB::table('wiki_categories')->insert(
            array(
                'name' => 'Bedwars Goulag',
                'slug' => 'bedwars',
                'description' => 'Toutes les informations et les spécificités de ce mode de jeux',
                'icon' => 'https://images.emojiterra.com/google/android-nougat/512px/1f6cf.png'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wiki_categories');
    }
};
