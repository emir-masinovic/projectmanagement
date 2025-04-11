<?php

declare(strict_types=1);

namespace OCA\ProjectManagement\Entity;

use OCP\AppFramework\Db\Entity;

class Client extends Entity {
	protected string $name;
	protected ?string $address;
	protected ?string $contactName;
	protected ?string $contactPhone;
	protected ?string $contactEmail;
	protected \DateTime $createdAt;
	protected \DateTime $updatedAt;

	public function __construct() {
		$this->addType('name', 'string');
		$this->addType('address', 'string');
		$this->addType('contactName', 'string');
		$this->addType('contactPhone', 'string');
		$this->addType('contactEmail', 'string');
		$this->addType('createdAt', 'datetime');
		$this->addType('updatedAt', 'datetime');
	}

	public function getName(): string {
		return $this->name;
	}

	public function setName(string $name): void {
		$this->name = $name;
	}

	public function getAddress(): ?string {
		return $this->address;
	}

	public function setAddress(?string $address): void {
		$this->address = $address;
	}

	public function getContactName(): ?string {
		return $this->contactName;
	}

	public function setContactName(?string $contactName): void {
		$this->contactName = $contactName;
	}

	public function getContactPhone(): ?string {
		return $this->contactPhone;
	}

	public function setContactPhone(?string $contactPhone): void {
		$this->contactPhone = $contactPhone;
	}

	public function getContactEmail(): ?string {
		return $this->contactEmail;
	}

	public function setContactEmail(?string $contactEmail): void {
		$this->contactEmail = $contactEmail;
	}

	public function getCreatedAt(): \DateTime {
		return $this->createdAt;
	}

	public function setCreatedAt(\DateTime $createdAt): void {
		$this->createdAt = $createdAt;
	}

	public function getUpdatedAt(): \DateTime {
		return $this->updatedAt;
	}

	public function setUpdatedAt(\DateTime $updatedAt): void {
		$this->updatedAt = $updatedAt;
	}
} 