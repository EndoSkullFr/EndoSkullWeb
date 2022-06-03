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
        Schema::create('wiki_pages', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("slug")->unique();
            $table->string("category");
            $table->longText("content");
            $table->timestamps();
        });
        DB::table('wiki_pages')->insert(
            array(
                'name' => 'Le Goulag',
                'slug' => 'goulag',
                'category' => 'bedwars',
                'content' => "Qu'est-ce que le goulag ?
Le goulag vous redonne une seconde chance lorsque vous vous faîtes final kill pour être ressucité.
Cependant il n'est accessible qu'une seule fois.
Le goulag se ferme automatiquement au bout de 10 minutes ou lorsqu'il ne reste que 2 joueurs restants
Dedans tout le monde dispose du même stuff, les améliorations obtenues dans la partie n'ont donc pas d'influance sur celui-ci.
Lorsqu'une partie dure trop longtemps, le goulag va se réouvrir et tous les joueurs y seront envoyés.
img:https://endoskullweb.test/img/background.png
L'amélioration 'Avantage décisif' permet d'avoir l'enchantement sharpness I sur votre hache lors de celui-ci"
            )
        );
        DB::table('wiki_pages')->insert(
            array(
                'name' => 'Système de regen',
                'slug' => 'regen',
                'category' => 'pvpkit',
                'content' => "Blabla tu regen"
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
        Schema::dropIfExists('wiki_pages');
    }
};
