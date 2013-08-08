<?php

/**
*  Test the `Validator` class.
*/
class Str_Test extends PHPUnit_Framework_TestCase {


	/**
	* Test `Str::has` method.
	*/
	function test_has() {

		$this->assertTrue( Str::has( 'World', 'Hello World' ) );

	}

	/**
	* Test `Str::remove_extension` method.
	*/
	function test_remove_extension() {

		// $filename = 'sample-file.zip';
		$this->assertEquals( Str::remove_extension( 'sample-file.zip' ), 'sample-file' );

	}

	/**
	* Test `Str::get_basename` method.
	*/
	function test_get_basename() {


	}

	/**
	* Test `Str::add_before_extension` method.
	*/
	function test_add_before_extension() {


	}

	/**
	* Test `Str::lenght` method.
	*/
	function test_lenght() {


	}

	/**
	* Test `Str::limit` method.
	*/
	function test_limit() {


	}

	/**
	* Test `Str::limit_exact` method.
	*/
	function test_limit_exact() {


	}

	/**
	* Test `Str::words` method.
	*/
	function test_words() {


	}

	/**
	* Test `Str::pluralize` method.
	*/
	function test_pluralize() {


	}

}


?>