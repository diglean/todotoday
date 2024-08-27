<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      DB::unprepared(
        <<<SQL
        CREATE TABLE IF NOT EXISTS `users` (
            `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(45) NOT NULL,
            `email` VARCHAR(90) NOT NULL,
            `password` VARCHAR(297) NOT NULL,
            `profile_picture_url` VARCHAR(60) NULL,
            `type` ENUM('admin', 'regular'),
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL,
            PRIMARY KEY (`id`),
            INDEX `email_idx` (`email`)
        )
        SQL,
    );

    DB::unprepared(
        <<<SQL
        INSERT INTO `users` (
            `id`,
            `name`,
            `email`,
            `password`,
            `profile_picture_url`,
            `type`,
            `created_at`,
            `updated_at`
        ) VALUES (
            NULL,
            'Admin',
            'admin@gmail.com',
            '$2y$12$6NeRRglyOz1Bj6XdqOz7.e2ocy3EXixtt6JBSD8z72IAlrmrFCtFS',
            'https://avatars.githubusercontent.com/u/72869261?v=4',
            'admin',
            NOW(),
            NOW()
        );
        SQL,
    );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TABLE IF EXISTS `users`');
    }
};
