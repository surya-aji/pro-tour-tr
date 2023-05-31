<?php

namespace App\Modules\UserManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'parent_id',
        'display_name',
        'name',
        'guard_name',
        'created_by',
        'updated_by',
    ];

     /**
     * parent 
     *
     * @return void
     */
    public function parent()
    {
        return $this->belongsTo(Permission::class);
    }

     /**
     * children
     *
     * @return void
     */
    public function children()
    {
        return $this->hasMany(Permission::class , 'parent_id');
    }

    
    // /**
    //  * recursive, loads all descendants
    //  *
    //  * @return void
    //  */
    // public function childrenRecursive()
    // {
    //     return $this->children()->with('childrenRecursive');
    // }
}
