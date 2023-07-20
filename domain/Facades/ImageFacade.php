<?php

namespace domain\Facades;

use domain\Services\ImageService;
use Illuminate\Support\Facades\Facade;

class ImageFacade extends Facade
{
  protected static function getFacadeAccessor()
  {
    return ImageService::class;
  }
}