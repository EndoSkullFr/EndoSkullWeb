<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

class HomeController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view("home");
    }

    public static function onlinePlayers()
    {

        require app_path() . '/includes/minecraft-query/src/MinecraftPing.php';

        require app_path() . '/includes/minecraft-query/src/MinecraftPingException.php';

        try
        {
            $Query = new MinecraftPing( 'mc.endoskull.fr', 25565 );

            $online_count = $Query->Query()["players"]["online"];
        }
        catch( MinecraftPingException $e )
        {
            echo $e->getMessage();
        }
        finally
        {
            if( $Query )
            {
                $Query->Close();
            }
        }
        return $online_count;
    }
}
