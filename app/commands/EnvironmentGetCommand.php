<?php

use Illuminate\Console\Command;

class EnvironmentGetCommand extends EnvironmentCommand {

	protected $name = 'environment.get';

	protected $description = 'Gets host and environment';

	public function fire()
	{
		$this->line(trim('
			<comment>Host:</comment>
			<info>' . $this->getHost() . '</info>
		'));

		$this->line(trim('
			<comment>Environment:</comment>
			<info>' . $this->getEnvironment() . '</info>
		'));
	}
}