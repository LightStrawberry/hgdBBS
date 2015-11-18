<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
	protected $hidden = array('created_at', 'updated_at', 'parent_id');

    public function topics()
    {
        return $this->hasMany('App\Topic');
    }

    public function nodes()
    {
    	return $this;
    }

    public static function main_node()
    {
    	$node = Node::where('parent_id', '=' ,0)->get();
    	//$node = Node::where('parent_id', '=' ,0)->get()->toArray();
    	return $node;
    }
}