<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            'name' => 'senisa',
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
