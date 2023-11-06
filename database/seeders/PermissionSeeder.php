<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['display_name'=> $request->displayname,'name' => $request->name, 'parent_id' => $request->parent, 'created_by' => Auth::user()->id,'updated_by' => Auth::user()->id]);
    }
}
