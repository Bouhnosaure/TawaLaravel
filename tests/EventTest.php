<?php

class EventTest extends TestCase {

	/**
	 * test if app is bootable
	 *
	 * @return void
	 */
	public function testCreateNewEventForm()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}



}
