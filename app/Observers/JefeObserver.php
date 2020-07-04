<?php

namespace App\Observers;

use App\Jefe;

class JefeObserver
{
    /**
     * Handle the User creating event.
     *
     * @param  \App\Jefe  $jefe
     * @return void
     */
    public function creating(Jefe $jefe)
    {
        $jefe->api_token=bin2hex(openssl_random_pseudo_bytes(30));
    }
}