<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;

class UserSeeder extends Seeder
{
	public function run()
	{
        /**
         * First, seed our example groups.
         */
		$groups = [
            [
                'name' => 'admin',
                'description' => 'Group for administrator.  Have full access through application features.'
            ],
            [
                'name' => 'member',
                'description' => 'Group for member.  Default group for newly registered users.'
            ]
        ];

        $this->db->table('auth_groups')->insertBatch($groups);

        /**
         * Then, seed our example permissions.
         */
        $permissions = [
            [
                'name' => 'read',
                'description' => 'Basic permission to read or view resources.'
            ],
            [
                'name' => 'create',
                'description' => 'Permission to create new resources.'
            ],
            [
                'name' => 'update',
                'description' => 'Permission to update existing resources.'
            ],
            [
                'name' => 'delete',
                'description' => 'Permission to delete existing resources.'
            ]
        ];

        $this->db->table('auth_permissions')->insertBatch($permissions);

        /**
         * Assign our groups with permissions.
         */
        $group_permissions = [
            [
                'group_id' => 1,
                'permission_id' => 1
            ],
            [
                'group_id' => 1,
                'permission_id' => 2
            ],
            [
                'group_id' => 1,
                'permission_id' => 3
            ],
            [
                'group_id' => 1,
                'permission_id' => 4
            ],
            [
                'group_id' => 2,
                'permission_id' => 1
            ],
        ];

        $this->db->table('auth_groups_permissions')->insertBatch($group_permissions);

        /**
         * Seed our example users.
         */
        $dummy_user_admin = [
            'email' => 'adjiekrazz@example.com',
            'username' => 'adjiekrazz',
            'password' => 'password',
        ];

        $dummy_user_member = [
            'email' => 'fathur@example.com',
            'username' => 'fathur',
            'password' => 'password',
        ];

        $users = model(UserModel::class);
        $userAdmin = new User($dummy_user_admin);
        $userAdmin->activate();
        $users->withGroup('admin')->save($userAdmin);

        $userMember = new User($dummy_user_member);
        $userMember->activate();
        $users->withGroup('member')->save($userMember);
	}
}
