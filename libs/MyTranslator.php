<?

namespace App\Localization;

use Nette,
    App;


class MyTranslator implements Nette\Localization\ITranslator
{
    protected $domain;

    public function __construct(App\Domain\DomainResolver $domain)
    {
        $this->domain = $domain;
    }

    public function translate($message, $count = NULL)
    {
        $translate = array();
        $translate[1]['test'] = "Objednal jste si počet ";
        $translate[2]['test'] = "TEST - doména 2";

        return $translate[$this->domain->getDomain()][$message];


    }
}