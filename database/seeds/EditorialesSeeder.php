<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class EditorialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table("editorials")->insert(
            [
                "nombre" => "Editorial#1",
                "created_at" => $now,
                "updated_at" => $now,
            ]
        );

        $now = Carbon::now();
        DB::table("editorials")->insert(
            [
                "nombre" => "Editorial#2",
                "created_at" => $now,
                "updated_at" => $now,
            ]
        );
    }
}