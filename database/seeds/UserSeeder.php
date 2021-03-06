<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->name       = 'Admin';
      $user->email      = 'admin@gmail.com';
      $user->password   = '$2y$10$iQdmXm5NGEyH3Vl3SQ27QOM8BPfkj6R0SMFOnQ14amGHGjU/IvNny';
      $user->role       = 'ADMIN';
      $user->adress     = 'test';
      $user->phone      = '0770192485';

      $user->save();
    }
}
