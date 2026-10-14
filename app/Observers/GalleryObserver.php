<?php

namespace App\Observers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryObserver
{
    /**
     * Handle the Gallery "created" event.
     *
     * @param Gallery $gallery
     * @return void
     */
    public function created(Gallery $gallery)
    {
        //
    }

    /**
     * Handle the Gallery "updated" event.
     *
     * @param Gallery $gallery
     * @return void
     */
    public function updated(Gallery $gallery)
    {
        if ($gallery->isDirty('image') && $gallery->getOriginal('image')) {
            Storage::delete($gallery->getOriginal('image'));
        }
    }

    /**
     * Handle the Gallery "deleted" event.
     *
     * @param Gallery $gallery
     * @return void
     */
    public function deleted(Gallery $gallery)
    {
        if (Storage::exists($gallery->image)) {
            Storage::delete($gallery->image);
        }
    }

    /**
     * Handle the Gallery "restored" event.
     *
     * @param Gallery $gallery
     * @return void
     */
    public function restored(Gallery $gallery)
    {
        //
    }

    /**
     * Handle the Gallery "force deleted" event.
     *
     * @param Gallery $gallery
     * @return void
     */
    public function forceDeleted(Gallery $gallery)
    {
        //
    }
}
