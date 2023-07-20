<?php

namespace domain\Services;

use App\Models\Image;

class ImageService
{
  protected $image;

  public function __construct()
  {
    $this->image = new Image();
  }

  public function store($file)
  {
    $name = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads'), $name);

    return $this->image->create([
        'image' => $name,
    ]);
  }
}
