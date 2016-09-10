<?

namespace App\Domain;

use Nette;


class DomainResolver extends Nette\Object
{
    protected $domain;

    public function init()
    {
        // nejake rozhodnuti jakou domenu to bude vracet, asi pole dle URL, zatim 1
        $this->domain = 1;
        
    }


    public function getDomain()
    {
        return $this->domain;
    }

}