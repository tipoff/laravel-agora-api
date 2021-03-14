<?php

declare(strict_types=1);

use Tipoff\Authorization\Permissions\BasePermissionsMigration;

class AddFeePermissions extends BasePermissionsMigration
{
    public function up()
    {
        $permissions = [
             'make video call' => ['Owner', 'Staff'],
        ];

        $this->createPermissions($permissions);
    }
}