<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', '=', 'admin@ellev8pro.com')->first();
        if($admin === null){
            DB::table('users')->insert([
                'id' => Str::uuid(),
                'name' => 'Admin Panel',
                'username' => 'admin',
                'role' => 'admin',
                'status' => 1,
                'balance' => 100000,
                'email' => 'admin@ellev8pro.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
