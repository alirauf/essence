<?php

/**
 *	@author Félix Girault <felix.girault@gmail.com>
 *	@license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */

namespace fg\Essence\Provider\OpenGraph;



/**
 *	TED provider (http://www.ted.com).
 *
 *	@package fg.Essence.Provider.OpenGraph
 */

class Ted extends \fg\Essence\Provider\OpenGraph {

	/**
	 *	Constructor.
	 */

	public function __construct( ) {

		parent::__construct( '#ted\\.com/talks#i' );
	}
}
