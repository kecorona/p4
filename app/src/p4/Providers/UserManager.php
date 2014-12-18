<?php namespace p4\Providers;

use App;

class IdeaManager {

	/**
	 * Create a new Idea List
	 * @param string $id The basename of the list
	 * @param string $title The title of the list
	 * @param string ListInterface The newly created list
	 * @throws InvalidArgumentException If the list already exists
	 */
	public function makeList($id, $title)
	{
		$repository = App::make('UserRepositoryInterface');
		if($repository->exists($id)) {
			throw new \InvalidArgumentException("A list with id=$id already exists");
		}
		$list = App::make('ListInterface');
		$list->set('id', $id)
			 ->set('first_name', $first_name)
			 ->set('last_name', $last_name)
			 ->set('email', $email)
			 ->save();
		return $list;
	}

	/**
	 * Return a list of all lists
	 * @param boolean $archived Return archived lists?
	 * @return array of list ids
	 */
	public function allLists($archived = false)
	{
		$repository = App::make('UserRepositoryInterface');
		return $repository->getAll($archived);
	}

	/**
	 * Get the specified list
	 * @param string $id The list id
	 * @param boolean $archived Return archived lists?
	 * @return ListInterface
	 * @throws RuntimeException If list is not found
	 */
	public function get($id, $archived = false)
	{
		$repository = App::make('UserRepositoryInterface');
		if(!$repository->exists($id, $archived))
		{
			throw new \RuntimeException("List id=$id not found");
		}
		return $repository->load($id, $archived);
	}
}
?>