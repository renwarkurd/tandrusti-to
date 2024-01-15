<?php

namespace App\Traits;

use App\Models\User;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

trait ForUserId
{
  public static function bootForUserId()
  {
    if (!app()->runningInConsole() && auth()->check()) {
      static::creating(function (Model $model) {
        $model
          ->setAttribute('user_id', auth()->user()->id);
      });
    }
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  protected function serializeDate(DateTimeInterface $date): string
  {
    return $date->format('Y-m-d H:i:s');
  }
}
