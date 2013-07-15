<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace Essence;

use Essence\Configurable;
use Essence\Cache\Volatile;



/**
 *	Base class for a Provider.
 *
 *	@package fg.Essence
 */

abstract class Provider {

	use Configurable;



	/**
	 *	Configuration options.
	 *
	 *	### Options
	 *
	 *	- 'prepare' callable( string $url ) A function to prepare the given URL.
	 *
	 *	@var array
	 */

	protected $_properties = array(
		'prepare' => 'trim'
	);



	/**
	 *	Constructs the Provider with a set of options to configure its behavior.
	 *
	 *	@param array $properties Configuration options.
	 */

	public function __construct( array $properties = array( )) {

		$this->mergeProperties( $properties );
	}



	/**
	 *	Fetches embed information from the given URL.
	 *
	 *	@param string $url URL to fetch informations from.
	 *	@param array $options Custom options to be interpreted by the provider.
	 *	@return Media|null Embed informations, or null if nothing could be
	 *		fetched.
	 */

	public final function embed( $url, array $options = array( )) {

		if ( is_callable( $this->prepare )) {
			$url = call_user_func( $this->prepare, $url );
		}

		$Media = $this->_embed( $url, $options );

		if ( $Media ) {
			$Media->setDefault( 'url', $url );
		}

		return $Media;
	}



	/**
	 *	Does the actual fetching of informations.
	 *
	 *	@param string $url URL to fetch informations from.
	 *	@param array $options Custom options to be interpreted by the provider.
	 *	@return Media Embed informations.
	 *	@throws Essence\Exception
	 */

	abstract protected function _embed( $url, $options );

}