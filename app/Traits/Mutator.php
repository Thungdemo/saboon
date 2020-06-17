<?php

namespace App\Traits;

use Illuminate\Contracts\Encryption\DecryptException;
use Carbon\Carbon;

trait Mutator {

	public function setAttribute($key, $value)
    {
    	parent::setAttribute($key,$value);

    	if($this->isEncryptable($key))
    	{
    		$this->attributes[$key] = $value ? encrypt($value) : null;
    	}

        if($this->isDatable($key))
        {
            $this->attributes[$key] = $value ? Carbon::parse($value) : null;
        }

    	return $this;
    }

    protected function isEncryptable($key)
    {
    	return in_array($key,$this->encryptable ?? []);
    }

    protected function isDatable($key)
    {
        return in_array($key,$this->datable ?? []);
    }

    public function getAttributeValue($key)
    {
    	$value = parent::getAttributeValue($key);

    	if($this->isEncryptable($key))
    	{
    		try 
    		{
    			$value = decrypt($value);
    		}
    		catch(DecryptException $e) {}
    	}

        if($this->isDatable($key))
        {
            $value = $value ? Carbon::parse($value)->format(config('soap.date_format','d-m-Y')) : null;
        }

    	return $value;
    }
}