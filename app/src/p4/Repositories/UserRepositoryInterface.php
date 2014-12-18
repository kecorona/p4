<?php namespace p4\Repositories;

// File: app/src/GSD/Repositories/UserRepositoryInterface.php

	use p4\Entities\UserInterface;

	interface UserRepositoryInterface{

	/**
	 * Does the User list exist?
	 * @param string $id Id of the list
	 * @param boolean $archived Chedk for archived lists only?
	 * @return boolean
	 */
	public function exists($id, $archived = false);

	/**
	 * Return the ids of all the lists
	 * @param boolean $archived Return archived ids or unarchived?
	 * @retrun array of list ids
	 */
	public function getAll($archived = false);

	/**
	 * Load an User from its id
	 * @param string $id ID of the User
	 * @param boolean $archived Load an archvied list?
	 * @return ListInterface The User list
	 * @throws InvalidArgumentException If $id not found
	 */
	public function load($id, $archived = false);

	/**
	 * Save an UserList
	 * @param string $id ID of the list
	 * @param ListInterface $list the User list
	 * @param boolean $archived Save an archived list?
	 */
	public function save($id, ListInterface $list, $archived = false);
}
?>