<?php

require dirname(__FILE__) . '/Beta.php';
class Alpha {
	protected $beta;
	public function __construct($beta) {
	 $this->beta = $beta;
	}
	public function cromulate($deltas) {
	 foreach($deltas as $delta) {
		 $this->beta->process($delta);
	 }
	}
}
