<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Datadom extends Eloquent {
	protected $collection = 'datadom_temp';
	protected $pimaryKey = 'no';
}