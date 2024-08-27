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
        CREATE TABLE IF NOT EXISTS `tasks` (
            `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(30) NOT NULL,
            `category` ENUM('chore', 'feature', 'fix', 'service_request') NOT NULL,
            `description` VARCHAR(100) NOT NULL,
            `assigned_to` SMALLINT(5) UNSIGNED NULL,
            `status` ENUM('canceled', 'doing', 'done', 'pending', 'overdue') NOT NULL DEFAULT 'pending',
            `created_by` SMALLINT(5) UNSIGNED NOT NULL,
            `overdue_date` DATETIME NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL,
            PRIMARY KEY (`id`),
            INDEX `fk_assigned_to_idx` (`assigned_to`),
            CONSTRAINT `fk_assigned_to`
                FOREIGN KEY (`assigned_to`)
                REFERENCES `users` (`id`)
                ON DELETE NO ACTION
                ON UPDATE NO ACTION
        );
        SQL,
      );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
