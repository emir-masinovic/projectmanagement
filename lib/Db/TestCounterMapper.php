<?php

declare(strict_types=1);

namespace OCA\ProjectManagement\Db;

use OCP\AppFramework\Db\QBMapper;
use OCP\IDBConnection;

class TestCounterMapper extends QBMapper {
	public function __construct(IDBConnection $db) {
		parent::__construct($db, 'projectmanagement_test_counter', TestCounter::class);
	}

	public function getCounter(): int {
		$qb = $this->db->getQueryBuilder();
		$qb->select('counter')
			->from($this->getTableName())
			->setMaxResults(1);

		$result = $this->findEntity($qb);
		return $result ? $result->getCounter() : 0;
	}

	public function incrementCounter(): int {
		$qb = $this->db->getQueryBuilder();
		$qb->select('*')
			->from($this->getTableName())
			->setMaxResults(1);

		$counter = $this->findEntity($qb);
		if (!$counter) {
			$counter = new TestCounter();
			$counter->setCounter(1);
			$counter->setCreatedAt(new \DateTime());
			$this->insert($counter);
			return 1;
		}

		$counter->setCounter($counter->getCounter() + 1);
		$this->update($counter);
		return $counter->getCounter();
	}
} 