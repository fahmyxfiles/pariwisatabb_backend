<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
  
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions = [
           ['manage', 'all'],
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['action' => $permission[0], 'subject' => $permission[1]]);
        }
    }
}