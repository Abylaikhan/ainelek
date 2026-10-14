<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Throwable;


class SystemLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function createError(Throwable $exception, Request $request)
    {
        self::query()->create([
            'code'    => $exception->getCode(),
            'file'    => $exception->getFile(),
            'message' => $exception->getMessage(),
            'stack'   => substr($exception->getTraceAsString(), 0, 1000),
            'line'    => $exception->getLine(),
            'body'    => json_encode($request->all()),
            'url'     => $request->fullUrl(),
            'user_id' => auth()->user() ? auth()->user()->id : null,
        ]);
    }
}
