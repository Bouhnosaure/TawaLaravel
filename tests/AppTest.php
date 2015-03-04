<?php

class AppTest extends TestCase {

	/**
	 * test if app is bootable
	 *
	 * @return void
	 */
	public function testAvailability()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}



}
