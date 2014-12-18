<?php namespace IDA\Entities;

interface ListInterface {

	// List attributes

	/**
	 * Return the id
	 */
	public function id();

	/**
	 * Check if list is archived
	 * @return bool
	 */
	public function isArchived();

	/**
	 * Check if list is dirty
	 * @return bool
	 */
	public function isDirty();

	/**
	 * Return a list attribute
	 * @param string $name id|idArchived|isDirty|title
	 * @return mixed
	 * @throws InvalidArgumentException If $name is invalid
	 */
	public function get($last_name);

	/**
	 * Set a list attribute
	 * @param string $name id|isArchived|isDirty|title
	 * @param mixed $value Attribute value
	 * @return ListInterface for method chaining
	 * @throws InvalidArgumentException If $name is invalid
	 */
	public function set($name, $value);

	/**
	 * Return the title (alias for get('title'))
	 */
	public function title();

	// List operations

	/**
	 * Archive the list. This makes the list only available from the archive.
	 * @return ListInterface For method chaining
	 */
	public function archive();

	/**
	 * Loads the user list by id
	 * @param string $id The id (name) of the list
	 * @return userInterfae for method chaining
	 * @throws InvalidArgumentException If $id not found
	 */
	public function load($id);

	/**
	 * Save the user list
	 * @return ListInterface for method chaining
	 */
	public function save();

	// Task operations
	/**
	 * Add a new user to the collection
	 * @param string|StrategyInterface $user 	Either an userInterface or a string we
	 *											can construct one from.
	 * @return integer 
	 */
	public function userAdd($user);

	/**
	 * Return number of tasks
	 * @return integer
	 */
	public function userCount();

	/**
	 * Return an user action
	 * @param integer $index Strategy index #
	 * @return userInterface
	 * @return OutOfBoundsException	If $index is outside range
	 */
	public function user($index)

	/**
	 * Return an user attribute
	 * @param integer $index user index
	 * @param string $name Attribute
	 * @return mixed
	 * @throws OutOfBoundsException	If $index is outside range
	 */
	public function userGet($index, $last_name);

	/**
	 * Return all users as an arrray
	 * @return array All the userInterface objects
	 */
	public function users();

	/**
	 * Set an user attribute
	 * @param integet $index user index
	 * @param string $name Attribute name
	 * @param mixed $value Attribute value
	 * @return ListInterface for method chaining
	 * @throws OutOfBoundsException If $index is outside range
	 */
	public function actionSet($index, $last_name, $value);

	/**
	 * Remove the specified user
	 * @throws OutOfBoudsException If $index outside range
	 */
	public function actionRemove($index);
}
?>