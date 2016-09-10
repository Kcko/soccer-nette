<?php

namespace App\Model;

use Nette;

class Competition extends BaseModel 
{
		
	protected $tableName = 'stage_list';
	protected $tree;

	public function getStages($competitionId, $seasonId)
	{

		$rows = $this->database->table('stage_list')->order('parent')->order('rank');

		foreach ($rows as $r)
		{
			$this->tree['parent'][$r->parent][] = $r->id;
			$this->tree['child2parent'][$r->id] = $r->parent;
			$this->tree['item'][$r->id]         = $r->toArray();			
			$this->tree['name'][$r->id]         = $r->stage->name;		
		}


		return $this->getStagesFromTree(0);

	}


	public function getStagesFromTree($parent)
	{

        if (!isset($this->tree['parent'][$parent]))
            return;

        $out  = array();
        foreach($this->tree['parent'][$parent] as $nodeID)
        {

        	$item = $this->tree['item'][$nodeID];
        	

            $out[$nodeID] = array(

							'id'    => $item['id'],
							'row'   => $item,
							'name'  => $this->tree['name'][$nodeID]
            );

    	    if( array_key_exists($nodeID, $this->tree['parent']))
            {
                $childs = $this->getStagesFromTree($nodeID);

                foreach ($childs as $k => $v)
                    $out[$k] = $v;
            }
        }
        
        return $out;
	}




}
	