<?php

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Menu;
use Encore\Admin\Auth\Database\Role;
use Illuminate\Support\Facades\DB;


/**
 * Создаем элементы меню в админке.
 */
class AdminMenuSeeder extends Seeder
{
    
    /** @var Role */

    private $mainAdminRole;

    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run(): void
    {
        DB::table(config('admin.database.menu_table'))->truncate();
        Menu::truncate();

        $this->mainAdminRole = Role::query()->where(['slug' => 'level-5'])->first();

        $this->createDefaultMenu();
        $this->createCommentMenu($this->mainAdminRole);
        $this->createTopicMenu($this->mainAdminRole);
        $this->createUserMenu($this->mainAdminRole);
    }

    /**
     * @param Role $role
     * @return void
     */
    private function createCommentMenu(Role $role): void
    {
        $menu = Menu::create([
            'parent_id' => 0,
            'order'     => 120,
            'title'     => 'Комментарии',
            'icon'      => 'fa-comment',
            'uri'       => 'comments',
        ]);

        $menu->roles()->detach($role);
        $menu->roles()->detach($this->mainAdminRole);
        $menu->roles()->attach($role);
        $menu->roles()->attach($this->mainAdminRole);
    }

    /**
     * @param Role $role
     * @return void
     */
    private function createTopicMenu(Role $role): void
    {
        $menu = Menu::create([
            'parent_id' => 0,
            'order'     => 110,
            'title'     => 'Темы',
            'icon'      => 'fa-star',
            'uri'       => 'topics',
        ]);

        $menu->roles()->detach($role);
        $menu->roles()->detach($this->mainAdminRole);
        $menu->roles()->attach($role);
        $menu->roles()->attach($this->mainAdminRole);
    }

    /**
     * @param Role $role
     * @return void
     */
    private function createUserMenu(Role $role): void
    {
        $menu = Menu::create([
            'parent_id' => 0,
            'order'     => 130,
            'title'     => 'Пользователи',
            'icon'      => 'fa-user-circle',
            'uri'       => 'users',
        ]);

        $menu->roles()->detach($role);
        $menu->roles()->detach($this->mainAdminRole);
        $menu->roles()->attach($role);
        $menu->roles()->attach($this->mainAdminRole);
    }

    /**
     * Основное меню.
     *
     * @return void
     */
    private function createDefaultMenu(): void
    {
        $menuDashboard = Menu::create([
            'parent_id' => 0,
            'order'     => 10,
            'title'     => 'Панель',
            'icon'      => 'fa-bar-chart',
            'uri'       => '/',
        ]);
        $menuDashboard->roles()->detach($this->mainAdminRole);
        $menuDashboard->roles()->attach($this->mainAdminRole);

        $menuAdmins = Menu::create([
            'parent_id' => 0,
            'order'     => 20,
            'title'     => 'Админы',
            'icon'      => 'fa-tasks',
            'uri'       => '',
        ]);
        $menuAdmins->roles()->detach($this->mainAdminRole);
        $menuAdmins->roles()->attach($this->mainAdminRole);

        // Создаем остальные меню
        Menu::insert([
            [
                'parent_id' => $menuAdmins->id,
                'order'     => 30,
                'title'     => 'Пользователи',
                'icon'      => 'fa-users',
                'uri'       => 'auth/users',
            ],
            [
                'parent_id' => $menuAdmins->id,
                'order'     => 40,
                'title'     => 'Роли',
                'icon'      => 'fa-user',
                'uri'       => 'auth/roles',
            ],
            [
                'parent_id' => $menuAdmins->id,
                'order'     => 50,
                'title'     => 'Права',
                'icon'      => 'fa-ban',
                'uri'       => 'auth/permissions',
            ],
            [
                'parent_id' => $menuAdmins->id,
                'order'     => 60,
                'title'     => 'Меню',
                'icon'      => 'fa-bars',
                'uri'       => 'auth/menu',
            ],
            [
                'parent_id' => $menuAdmins->id,
                'order'     => 70,
                'title'     => 'Логи',
                'icon'      => 'fa-history',
                'uri'       => 'auth/logs',
            ],
        ]);
    }
}
