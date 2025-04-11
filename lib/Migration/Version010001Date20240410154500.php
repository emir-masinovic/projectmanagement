<?php

declare(strict_types=1);

namespace OCA\ProjectManagement\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\SimpleMigration;
use OCP\Migration\IOutput;

class Version010001Date20240410154500 extends SimpleMigration {


	public function applySchema(IOutput $output, Closure $schemaClosure, array $options) {
		$schema = $schemaClosure();

		$output->info('Starting migration for Project Management app');

		try {
			if (!$schema->hasTable('projectmanagement_test_counter')) {
				$output->info('Creating test counter table');
				$table = $schema->createTable('projectmanagement_test_counter');
				$table->addColumn('id', 'integer', [
					'autoincrement' => true,
					'notnull' => true,
				]);
				$table->addColumn('counter', 'integer', [
					'notnull' => true,
					'default' => 0,
				]);
				$table->addColumn('created_at', 'datetime', [
					'notnull' => true,
				]);

				$table->setPrimaryKey(['id']);
				$output->info('Test counter table created successfully');
			} else {
				$output->info('Test counter table already exists');
			}

			$output->info('Migration completed successfully');
			return $schema;
		} catch (\Exception $e) {
			$output->error('Migration failed: ' . $e->getMessage());
			throw $e;
		}
	}

	public function revertSchema(IOutput $output, Closure $schemaClosure, array $options) {
		$schema = $schemaClosure();

		try {
			$output->info('Starting migration revert');

			if ($schema->hasTable('projectmanagement_test_counter')) {
				$output->info('Dropping test counter table');
				$schema->dropTable('projectmanagement_test_counter');
			}

			$output->info('Migration revert completed successfully');
		} catch (\Exception $e) {
			$output->error('Migration revert failed: ' . $e->getMessage());
			throw $e;
		}
	}
} 