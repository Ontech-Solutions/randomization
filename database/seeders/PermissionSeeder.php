<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            [
                //Chief examinations officer
                "role_id" => 1,
                "module" => "Audit Trails",
                "create" => 1,
                "read" => 1,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 1,
                "module" => "Branch",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 1,
                "module" => "Competency",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 1,
                "module" => "Permission",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 1,
                "module" => "Role",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 1,
                "module" => "Exam Paper",
                "create" => 0,
                "read" => 1,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 1,
                "module" => "Exam Question",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 1,
                "module" => "Exam Venue",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 1,
                "module" => "Program",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 1,
                "module" => "Exam Paper Marking Key",
                "create" => 0,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 1,
                "module" => "User",
                "create" => 0,
                "read" => 1,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 1,
                "module" => "Initiator (Exam Marking Key)",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 1,
                "module" => "Confirmer (Exam Marking Key)",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 1,
                "module" => "Approver (Exam Marking Key)",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 1,
                "module" => "Downloader (Exam Question Paper)",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            //Role ID 2 : IT
            [
                "role_id" => 2,
                "module" => "Initiator (Exam Marking Key)",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 2,
                "module" => "Confirmer (Exam Marking Key)",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 0
            ],
            [
                "role_id" => 2,
                "module" => "Approver (Exam Marking Key)",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 2,
                "module" => "Downloader (Exam Question Paper)",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 2,
                "module" => "Audit Trails",
                "create" => 0,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 2,
                "module" => "Branch",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 2,
                "module" => "Competency",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 2,
                "module" => "Permission",
               "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 2,
                "module" => "Role",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 2,
                "module" => "Exam Paper",
                "create" => 1,
                "read" => 1,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 2,
                "module" => "Exam Question",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 2,
                "module" => "Exam Venue",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 2,
                "module" => "Exam Paper Marking Key",
                "create" => 0,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 2,
                "module" => "Program",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 2,
                "module" => "User",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 2,
                "module" => "Exam Question",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            //Role ID 3 is Senior Training and examinations officer
            [
                "role_id" => 3,
                "module" => "Audit Trails",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 3,
                "module" => "Branch",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 3,
                "module" => "Competency",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 3,
                "module" => "Permission",
                "create" => 0,
                "read" => 1,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 3,
                "module" => "Role",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 3,
                "module" => "Exam Paper",
                "create" => 0,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 3,
                "module" => "Exam Question",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 3,
                "module" => "Exam Venue",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 3,
                "module" => "Program",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 0
            ],
            [
                "role_id" => 3,
                "module" => "User",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 3,
                "module" => "Exam Question",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 3,
                "module" => "Initiator (Exam Marking Key)",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 3,
                "module" => "Confirmer (Exam Marking Key)",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 3,
                "module" => "Approver (Exam Marking Key)",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 3,
                "module" => "Downloader (Exam Question Paper)",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
             //Role ID 4 :Administrator
            [
                "role_id" => 4,
                "module" => "Audit Trails",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 4,
                "module" => "Branch",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 4,
                "module" => "Competency",
                "create" => 0,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 4,
                "module" => "Permission",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 4,
                "module" => "Role",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 4,
                "module" => "Exam Paper",
                "create" => 0,
                "read" => 1,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 4,
                "module" => "Exam Question",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 4,
                "module" => "Exam Venues",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 4,
                "module" => "Program",
                "create" => 0,
                "read" => 1,
                "update" => 0,
                "delete" => 1
            ],
            [
                "role_id" => 4,
                "module" => "User",
                "create" => 1,
                "read" => 1,
                "update" => 1,
                "delete" => 1
            ],
            [
                "role_id" => 4,
                "module" => "Exam Questions",
                "create" => 0,
                "read" => 1,
                "update" => 0,
                "delete" => 1
            ],
            [
                "role_id" => 4,
                "module" => "Initiator (Exam Marking Key)",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 4,
                "module" => "Confirmer (Exam Marking Key)",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 4,
                "module" => "Approver (Exam Marking Key)",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
            [
                "role_id" => 4,
                "module" => "Downloader (Exam Question Paper)",
                "create" => 0,
                "read" => 0,
                "update" => 0,
                "delete" => 0
            ],
        ]);
    }
}
