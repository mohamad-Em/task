<?php

namespace App\trait;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use PhpParser\Builder\Trait_;

Trait userTrait
{
    function saveImage($userPic,$folder)
    {
        $fileEx = $userPic->getClientOriginalExtension();
        $fileName = time().'.'.$fileEx;
        $path = $folder;
        $userPic->move($path,$fileName);
        return $fileName;
    }
}
