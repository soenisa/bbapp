<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        User::create([
            'name' => 'Senisa',
            'email' => 'senisa.s@gmail.com',
            'password' => '$2y$10$Grjd9TuBmjoceYLaCmBRleHFiv8oG0zeU6jLsqIPPQAzgMTuWiTD2',
        ]);            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::where('email', 'senisa.s@gmail.com')->delete();
    }
};
