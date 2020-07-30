<?php

namespace Htech\MockEntry\Traits;

trait MockEntry
{
    public function initializeModelForTesting()
    {
        if(!isset($this->fillable['for_testing'])){
            $this->fillable[] = "for_testing";
        }
    }
    public function newQuery($excludeDeleted = true) {
        $debug = config('app.debug',false);
        return parent::newQuery($excludeDeleted)->when(!$debug,function($query){
            return $query->where('for_testing', 0);  
        },function($query){
            return $query->where('for_testing', 1);  
        });
    }

    public static function boot(array $attributes = []){
        parent::boot();
        
        static::creating(function($model){
            $model->for_testing = config('app.debug') == false ? 0 : 1;
        });
    }

}
