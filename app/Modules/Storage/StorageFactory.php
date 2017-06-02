<?php
namespace App\Modules\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StorageFactory extends FactoryAbstract
{
    private $guestEmail = 'guest@guest.guest';

    function create()
    {
        if(Auth::user()->email == $this->guestEmail)
        {
            return new SessionStorage();
        }
        return new DBStorage;
    }
}