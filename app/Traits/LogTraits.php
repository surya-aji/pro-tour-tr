<?php
namespace App\Traits;

use Illuminate\Support\Str;
use App\Modules\History\Models\Log;

trait LogTraits{
   
 /**
  * bootLogTrait handle event
  *
  * @return void
  */
 public static function bootLogTraits()
 {
     /**
      * Data creating and updating event
      */
     static::saved(function ($model) {
         // create or update?
         if ($model->wasRecentlyCreated) {
             static::storeLog($model, static::class, 'CREATED');
         } else {
             if (!$model->getChanges()) {
                 return;
             }
             static::storeLog($model, static::class, 'UPDATED');
         }
     });

     /**
      * Data deleting event
      */
     static::deleted(function ($model) {
         static::storeLog($model, static::class, 'DELETED');
     });
 }


     /**
     * Generate the model name
     * @param  Model  $model
     * @return string
     */
    public static function getTagName($model)
    {
        return !empty($model->tagName) ? $model->tagName : Str::title(Str::snake(class_basename($model), ' '));
    }


    /**
     * Store model logs
     * @param $model
     * @param $modelPath
     * @param $action
     */
    public static function storeLog($model, $modelPath, $action)
    {
        
        $newValues = null;
        $oldValues = null;
        if ($action === 'CREATED') {
            $newValues = $model->getAttributes();
        } elseif ($action === 'UPDATED') {
            $oldValues = $model->getOriginal();
            $newValues = $model->getChanges();
        }

        $subject = static::getTagName($model);
        $description = 'Data '. $subject. ' ['.$action.']'; 

        $systemLog = new Log();
        $systemLog->subject = $subject. ':'. $action;
        $systemLog->action = $action;
        $systemLog->method = request()->method();
        $systemLog->old_properties = json_encode($oldValues);
        $systemLog->url = request()->path();
        $systemLog->description = $description;
        $systemLog->properties = json_encode(request()->except('_token'));
        $systemLog->created_at = now();
        $systemLog->ip_address = request()->ip();
        $systemLog->save();
    }


}