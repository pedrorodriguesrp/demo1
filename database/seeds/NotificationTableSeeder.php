<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            'author_id' => 1,
            'message' => 'Esta é uma notificação de teste!',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('notifications')->insert([
            'author_id' => 1,
            'message' => 'Esta é uma notificação de teste, com mais conteúdo!',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('notifications')->insert([
            'author_id' => 1,
            'message' => 'Esta é uma notificação de teste, com ainda mais conteúdo. É um exemplo de como um longo texto irá aparecer.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
