<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'usertype',
        'status'
    ];
    public function run()
    {
    DB::table('users')->insert([
       'name'=>'Prime9126',
       'email'=>'joeasewe@gmail.com',
       'password'=>Hash::make('password'),
        'usertype'=>'User',
        'status'=>'1',
        'remember_token'=>Str::random(10),
        'created_at'=> date("Y-m-d H:i:s" ),
        'updated_at'=> date('Y-m-d H:i:s')
    ]);
    }
}
