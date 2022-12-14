<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // añadimos los diferentes permisos van del 1 al 8
        Permission::create(['name'=>'admin.index','privilege'=>'admin panel']);
        Permission::create(['name'=>'roles.index','privilege'=>'role list']);
        Permission::create(['name'=>'roles.create','privilege'=>'role create']);
        Permission::create(['name'=>'roles.store','privilege'=>'role store']);
        Permission::create(['name'=>'roles.edit','privilege'=>'role edit']);
        Permission::create(['name'=>'roles.update','privilege'=>'role update']);
        Permission::create(['name'=>'roles.destroy','privilege'=>'role delete']);
        Permission::create(['name'=>'roles.show','privilege'=>'role view']);

        
        ///Permisos de usuer

        Permission::create(['name'=>'users.index','privilege'=>'user list']);
        Permission::create(['name'=>'users.create','privilege'=>'user create']);
        Permission::create(['name'=>'users.store','privilege'=>'user create']);
        Permission::create(['name'=>'users.edit','privilege'=>'user edit']);
        Permission::create(['name'=>'users.update','privilege'=>'user edit']);
        Permission::create(['name'=>'users.destroy','privilege'=>'user delete']);
        Permission::create(['name'=>'users.show','privilege'=>'user view']);

        /* Creamos una variable  */
        $permissons=([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]);
       /*  ahora llamamos a los roles  */
       $superAdmin = Role::findByName('super-admin');
       $admin = Role::findByName('admin');
      /*  Asignamos los permisos */
      $superAdmin->givePermissionTo($permissons);
      $admin->givePermissionTo($permissons);
    }
}
