<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Permission;

class AdminUserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(config('admin.database.role_permissions_table'))->truncate();
        DB::table(config('admin.database.role_users_table'))->truncate();

        // Создаем админов по уровням доступа
        $this->createAdmins();
        // Создаем роли
        $this->createRoles();
        // Создаем права
        $this->createPermissions();

        // Связываем роли с админами
        // Главный админ
        $this->setRoles('admin', 'level-5');

        // Связываем роли с правами
        // Главный админ
        $this->setPermission('level-5', '*');
    }

    /**
     * Создаем пользователей админки.
     *
     * @return void
     */
    private function createAdmins(): void 
    {
        Administrator::truncate();

        // Главный админ
        Administrator::create([
            'username' => 'admin',
            'password' => bcrypt('12345'),
            'name'     => 'Главный администратор',
        ]);
    }

    /**
     * Создаем роли.
     *
     * @return void
     */
    private function createRoles(): void
    {
        Role::truncate();
        $rowList = [];
        for ($i = 1; $i <= 5; ++$i) {
            $rowList[] = [
                'name' => 'Уровень ' . $i,
                'slug' => 'level-' . $i,
            ];
        }
        Role::insert($rowList);
    }

     /**
     * Создаем права.
     *
     * @return void
     */
    private function createPermissions(): void
    {
        Permission::truncate();
        Permission::insert([
            // Основные права 
            [
                'name'        => 'Полные права',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
            ],
            [
                'name'        => 'Панель',
                'slug'        => 'dashboard',
                'http_method' => 'GET',
                'http_path'   => '/',
            ],
            [
                'name'        => 'Вход',
                'slug'        => 'auth.login',
                'http_method' => '',
                'http_path'   => "/auth/login\r\n/auth/logout",
            ],
            [
                'name'        => 'Настройки',
                'slug'        => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path'   => '/auth/setting',
            ],
            [
                'name'        => 'Управление',
                'slug'        => 'auth.management',
                'http_method' => '',
                'http_path'   => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
            ],
            [
                'name'        => 'Страницы сайта',
                'slug'        => 'model.web-pages',
                'http_method' => 'GET,POST,PUT,DELETE',
                'http_path'   => '/web-pages*',
            ],
        ]);
    }

    /**
     * Связывает администратора с ролью.
     *
     * @param string $adminUserName Логин админа.
     * @param string $roleSlug      Код роли.
     * @return void
     */
    private function setRoles(string $adminUserName, string $roleSlug): void
    {
        $admin = Administrator::query()->where(['username' => $adminUserName])->first();
        $role = Role::query()->where(['slug' => $roleSlug])->first();
        $admin->roles()->save($role);
    }

    /**
     * Связывает роль с правами.
     *
     * @param string $roleSlug       Код роли.
     * @param string $permissionSlug Код права.
     */
    private function setPermission(string $roleSlug, string $permissionSlug): void
    {
        $role = Role::query()->where(['slug' => $roleSlug])->first();
        $permission = Permission::query()->where(['slug' => $permissionSlug])->first();
        $role->permissions()->save($permission);
    }
}
