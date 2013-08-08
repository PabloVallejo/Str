<?php
/**
*
* Helper string methods.
*
*/


/**
*  String helper methods
*/
class Str {


	/**
	* Finds whether a string has a substring.
	*
	* <code>
	*
	*	 // Check whether 'string' is present in `sample string`
	*    if ( Str::has( 'string', 'sample string' ) ) {
	*
	*		// 'sample string' contains 'string'
	*
	*	 }
	*
	* </code>
	*
	* @param { str } original string
	* @param { str } String to find
	* @return { bool } whether the string has the substring.
	*/
	public static function has( $find, $target ) {
		return strpos( $target, $find ) !== false;
	}


	/**
	* Remove the extension of a filename
	*
	* <code>
	*
	*	 // Return "my-file"
	*    echo Str::remove_extension( 'my-file.zip' );
	*
	* </code>
	*
	* @param { str } filename or path
	* @return { str || false } filename without ext or false on invalid filename.
	*/
	public static function remove_extension( $file = null ) {

		if ( ! is_string( $file ) )
			return false;

		return preg_replace( '/\.[^.]+$/', '', $file );

	}

	/**
	* Get the filename of a file path.
	*
	* <code>
	*
	*	 // Return "my-file"
	*    echo Str::get_basename( 'C:/xampp/htdocs/my-file.zip' );
	*
	*	 // Return "my-file.zip"
	*    echo Str::get_basename( 'C:/xampp/htdocs/my-file.zip', true );
	*
	* </code>
	*
	* By default the extension is removed.
	* @param { str } filename
	* @param { bool } whether to remove the extension
	* @return { str || false } filename or false on invalid filename
	*/
	public static function get_basename( $file = null, $remove_ext = true ) {

		if ( ! is_string( $file ) )
			return false;

		$basename = basename( $file );
		if ( $remove_ext == true )
			$basename = remove_extension( $basename );

		return $basename;
	}


	/**
	* Add a string before a file extension.
	*
	* <code>
	*
	*	 // Return "my-file-v1.zip"
	*    echo Str::add_before_extension( 'my-file.zip', 'v1' );
	*
	* </code>
	*
	* @param { str } filename to add the string before extion to
	* @param { str } the string to add before extension.
	* @return { str || false } parsed filename or false on invalid filename.
	*/
	public static function add_before_extension( $filename = null, $str = null ) {

		if ( ! is_string( $filename ) || ! is_string( $str ) )
			return false;

		$ext = pathinfo( $filename, PATHINFO_EXTENSION );
		$file_no_ext = remove_extension( $filename );

		// Add string before extension
		$parsed = sprintf( '%s%s.%s', $file_no_ext, $str, $ext );

		return $parsed;

	}

	/**
	* Get the length of a string.
	*
	* <code>
	*
	*		// Get the length of a string
	*		$length = Str::length( 'Taylor Otwell' );
	*
	* </code>
	*
	* @param { str } string to measure
	* @return { int } String length
	*/
	public static function length( $value ) {

		return strlen( $value );
	}

	/**
	* Limit the number of characters in a string.
	*
	* <code>
	*
	*		// Return "Tay..."
	*		echo Str::limit( "Taylor Otwell", 3 );
	*
	*		// Limit the number of characters and append a custom ending.
	* 		echo Str::limit( 'Taylor Otwell', 3, '---' );
	*
	* </code>
	*
	* @param { str } String to limit
	* @param { int } Characters to get
	* @param { str } Ending
	* @return { str }
	*/
	public static function limit( $value, $limit = 100, $end = '...' ) {

		if ( static::length( $value ) <= $limit ) return $value;

		return substr( $value, 0, $limit ) . $end;
	}

	/**
	* Limit the number of characters in a string including custom ending
	*
	* <code>
	*
	*		// Return "Taylor..."
	*		echo Str::limit_exact( 'Taylor Otwell', 9 );
	*
	*		// Limit the number of characters and append a custom ending
	*		echo Str::limit_exact( 'Taylor Otwell', 9, '---' );
	*
	* </code>
	*
	* @param { str } String to limit
	* @param { int } Characters to get
	* @param { str } Ending
	* @return { str }
	*/
	public static function limit_exact( $value, $limit = 100, $end = '...' ) {

		if ( static::length( $value ) <= $limit ) return $value;

		$limit -= static::length( $end );
		return static::limit( $value, $limit, $end );

	}

	/**
	* Limit the number of words in a string.
	* Adapted from laravel https://github.com/laravel/framework.
	*
	* <code>
	*		// Return "This is a..."
	*		echo Str::words( 'This is a sentence.', 3 );
	*
	*		// Limit the number of words and append a custom ending.
	*		echo Str::words( 'This is a sentence.', 3, '---' );
	*
	* </code>
	*
	* @param { str } String to limit
	* @param { int } Number of words to gets
	* @param { str } Ending
	* @return { string }
	*/
	public static function words( $value, $words = 100, $end = '...' ) {

		if ( trim( $value ) == '' ) return '';

		preg_match( '/^\s*+(?:\S++\s*+){1,' . $words . '}/u', $value, $matches );

		if ( static::length( $value ) == static::length( $matches[ 0 ] ) )
			$end = '';

		return rtrim( $matches[ 0 ] ) . $end;
	}


	/**
	* Helper for plural word handling with dynamic content
	* like "1 comment", "2 comments" etc
	*
	* <code>
	*
	*		// Return "Items"
	*		echo Str::pluralize( 10, 'item', 'items' );
	*
	*		// Return "Item"
	*		echo Str::pluralize( 1, 'item', 'items' );
	*
	* </code>
	*
	* @param { int } Number to determine whether what word to use
	* @param { string } Word to use when single
	* @param { string } Word to use when plural
	* @return { string } Pluralized string
	*/
	function pluralize( $num, $single_word, $plural_word ) {

		return sprintf( ngettext( $single_word, $plural_word, $num ), $num );
	}

}


?>