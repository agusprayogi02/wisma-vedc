<?php

namespace Database\Seeders;

use BezhanSalleh\FilamentShield\Support\Utils;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $directPermissions = "[{\"name\":\"create_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"create_customer\",\"guard_name\":\"web\"},{\"name\":\"create_item\",\"guard_name\":\"web\"},{\"name\":\"create_orderer\",\"guard_name\":\"web\"},{\"name\":\"create_reservation\",\"guard_name\":\"web\"},{\"name\":\"create_room\",\"guard_name\":\"web\"},{\"name\":\"create_room::item\",\"guard_name\":\"web\"},{\"name\":\"create_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"create_room::status\",\"guard_name\":\"web\"},{\"name\":\"create_room::type\",\"guard_name\":\"web\"},{\"name\":\"create_room::user\",\"guard_name\":\"web\"},{\"name\":\"create_shield::role\",\"guard_name\":\"web\"},{\"name\":\"create_user\",\"guard_name\":\"web\"},{\"name\":\"delete_any_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"delete_any_customer\",\"guard_name\":\"web\"},{\"name\":\"delete_any_item\",\"guard_name\":\"web\"},{\"name\":\"delete_any_orderer\",\"guard_name\":\"web\"},{\"name\":\"delete_any_reservation\",\"guard_name\":\"web\"},{\"name\":\"delete_any_room\",\"guard_name\":\"web\"},{\"name\":\"delete_any_room::item\",\"guard_name\":\"web\"},{\"name\":\"delete_any_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"delete_any_room::status\",\"guard_name\":\"web\"},{\"name\":\"delete_any_room::type\",\"guard_name\":\"web\"},{\"name\":\"delete_any_room::user\",\"guard_name\":\"web\"},{\"name\":\"delete_any_shield::role\",\"guard_name\":\"web\"},{\"name\":\"delete_any_user\",\"guard_name\":\"web\"},{\"name\":\"delete_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"delete_customer\",\"guard_name\":\"web\"},{\"name\":\"delete_item\",\"guard_name\":\"web\"},{\"name\":\"delete_orderer\",\"guard_name\":\"web\"},{\"name\":\"delete_reservation\",\"guard_name\":\"web\"},{\"name\":\"delete_room\",\"guard_name\":\"web\"},{\"name\":\"delete_room::item\",\"guard_name\":\"web\"},{\"name\":\"delete_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"delete_room::status\",\"guard_name\":\"web\"},{\"name\":\"delete_room::type\",\"guard_name\":\"web\"},{\"name\":\"delete_room::user\",\"guard_name\":\"web\"},{\"name\":\"delete_shield::role\",\"guard_name\":\"web\"},{\"name\":\"delete_user\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_customer\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_item\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_orderer\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_reservation\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_room\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_room::item\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_room::status\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_room::type\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_room::user\",\"guard_name\":\"web\"},{\"name\":\"force_delete_any_user\",\"guard_name\":\"web\"},{\"name\":\"force_delete_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"force_delete_customer\",\"guard_name\":\"web\"},{\"name\":\"force_delete_item\",\"guard_name\":\"web\"},{\"name\":\"force_delete_orderer\",\"guard_name\":\"web\"},{\"name\":\"force_delete_reservation\",\"guard_name\":\"web\"},{\"name\":\"force_delete_room\",\"guard_name\":\"web\"},{\"name\":\"force_delete_room::item\",\"guard_name\":\"web\"},{\"name\":\"force_delete_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"force_delete_room::status\",\"guard_name\":\"web\"},{\"name\":\"force_delete_room::type\",\"guard_name\":\"web\"},{\"name\":\"force_delete_room::user\",\"guard_name\":\"web\"},{\"name\":\"force_delete_user\",\"guard_name\":\"web\"},{\"name\":\"reorder_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"reorder_customer\",\"guard_name\":\"web\"},{\"name\":\"reorder_item\",\"guard_name\":\"web\"},{\"name\":\"reorder_orderer\",\"guard_name\":\"web\"},{\"name\":\"reorder_reservation\",\"guard_name\":\"web\"},{\"name\":\"reorder_room\",\"guard_name\":\"web\"},{\"name\":\"reorder_room::item\",\"guard_name\":\"web\"},{\"name\":\"reorder_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"reorder_room::status\",\"guard_name\":\"web\"},{\"name\":\"reorder_room::type\",\"guard_name\":\"web\"},{\"name\":\"reorder_room::user\",\"guard_name\":\"web\"},{\"name\":\"reorder_user\",\"guard_name\":\"web\"},{\"name\":\"replicate_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"replicate_customer\",\"guard_name\":\"web\"},{\"name\":\"replicate_item\",\"guard_name\":\"web\"},{\"name\":\"replicate_orderer\",\"guard_name\":\"web\"},{\"name\":\"replicate_reservation\",\"guard_name\":\"web\"},{\"name\":\"replicate_room\",\"guard_name\":\"web\"},{\"name\":\"replicate_room::item\",\"guard_name\":\"web\"},{\"name\":\"replicate_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"replicate_room::status\",\"guard_name\":\"web\"},{\"name\":\"replicate_room::type\",\"guard_name\":\"web\"},{\"name\":\"replicate_room::user\",\"guard_name\":\"web\"},{\"name\":\"replicate_user\",\"guard_name\":\"web\"},{\"name\":\"restore_any_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"restore_any_customer\",\"guard_name\":\"web\"},{\"name\":\"restore_any_item\",\"guard_name\":\"web\"},{\"name\":\"restore_any_orderer\",\"guard_name\":\"web\"},{\"name\":\"restore_any_reservation\",\"guard_name\":\"web\"},{\"name\":\"restore_any_room\",\"guard_name\":\"web\"},{\"name\":\"restore_any_room::item\",\"guard_name\":\"web\"},{\"name\":\"restore_any_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"restore_any_room::status\",\"guard_name\":\"web\"},{\"name\":\"restore_any_room::type\",\"guard_name\":\"web\"},{\"name\":\"restore_any_room::user\",\"guard_name\":\"web\"},{\"name\":\"restore_any_user\",\"guard_name\":\"web\"},{\"name\":\"restore_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"restore_customer\",\"guard_name\":\"web\"},{\"name\":\"restore_item\",\"guard_name\":\"web\"},{\"name\":\"restore_orderer\",\"guard_name\":\"web\"},{\"name\":\"restore_reservation\",\"guard_name\":\"web\"},{\"name\":\"restore_room\",\"guard_name\":\"web\"},{\"name\":\"restore_room::item\",\"guard_name\":\"web\"},{\"name\":\"restore_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"restore_room::status\",\"guard_name\":\"web\"},{\"name\":\"restore_room::type\",\"guard_name\":\"web\"},{\"name\":\"restore_room::user\",\"guard_name\":\"web\"},{\"name\":\"restore_user\",\"guard_name\":\"web\"},{\"name\":\"update_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"update_customer\",\"guard_name\":\"web\"},{\"name\":\"update_item\",\"guard_name\":\"web\"},{\"name\":\"update_orderer\",\"guard_name\":\"web\"},{\"name\":\"update_reservation\",\"guard_name\":\"web\"},{\"name\":\"update_room\",\"guard_name\":\"web\"},{\"name\":\"update_room::item\",\"guard_name\":\"web\"},{\"name\":\"update_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"update_room::status\",\"guard_name\":\"web\"},{\"name\":\"update_room::type\",\"guard_name\":\"web\"},{\"name\":\"update_room::user\",\"guard_name\":\"web\"},{\"name\":\"update_shield::role\",\"guard_name\":\"web\"},{\"name\":\"update_user\",\"guard_name\":\"web\"},{\"name\":\"view_any_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"view_any_customer\",\"guard_name\":\"web\"},{\"name\":\"view_any_item\",\"guard_name\":\"web\"},{\"name\":\"view_any_orderer\",\"guard_name\":\"web\"},{\"name\":\"view_any_reservation\",\"guard_name\":\"web\"},{\"name\":\"view_any_room\",\"guard_name\":\"web\"},{\"name\":\"view_any_room::item\",\"guard_name\":\"web\"},{\"name\":\"view_any_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"view_any_room::status\",\"guard_name\":\"web\"},{\"name\":\"view_any_room::type\",\"guard_name\":\"web\"},{\"name\":\"view_any_room::user\",\"guard_name\":\"web\"},{\"name\":\"view_any_shield::role\",\"guard_name\":\"web\"},{\"name\":\"view_any_user\",\"guard_name\":\"web\"},{\"name\":\"view_boarding::house\",\"guard_name\":\"web\"},{\"name\":\"view_customer\",\"guard_name\":\"web\"},{\"name\":\"view_item\",\"guard_name\":\"web\"},{\"name\":\"view_orderer\",\"guard_name\":\"web\"},{\"name\":\"view_reservation\",\"guard_name\":\"web\"},{\"name\":\"view_room\",\"guard_name\":\"web\"},{\"name\":\"view_room::item\",\"guard_name\":\"web\"},{\"name\":\"view_room::item::report\",\"guard_name\":\"web\"},{\"name\":\"view_room::status\",\"guard_name\":\"web\"},{\"name\":\"view_room::type\",\"guard_name\":\"web\"},{\"name\":\"view_room::user\",\"guard_name\":\"web\"},{\"name\":\"view_shield::role\",\"guard_name\":\"web\"},{\"name\":\"view_user\",\"guard_name\":\"web\"}]";
        $userRoles = '[{"name":"panel_user","guard_name":"web","permissions":[] }]';
        $rolesWithPermissions = "[{\"name\":\"super_admin\",\"guard_name\":\"web\",\"permissions\":" . $directPermissions . "}]";

        static::makeDirectPermissions($directPermissions);
        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeRolesWithPermissions($userRoles);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (!blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (!blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (!blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
