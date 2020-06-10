<?php

namespace App\Traits;

trait HasManySyncable
{
	public function hasManySync($relation,array $items)
    {
    	$currentIds = [];

    	foreach ($items as $item) 
    	{
    		$currentIds[] = $item->getKey();
    		$keyName = $item->getKeyName();
    	}

        $currentIds = array_filter($currentIds);
        
        $this->getHasManyRelation($relation)->whereNotIn($keyName,$currentIds)->delete();
        $this->getHasManyRelation($relation)->saveMany($items);
    }

    protected function getHasManyRelation($relation)
    {
    	return \call_user_func([$this,$relation]);
    }
}