<?

namespace App\FrontModule\Components;

use Nette\Application\UI,
	Nette,
	App;


interface MatchResultFactory
{
    /** @return MatchResult */
    public function create();
}


class MatchResult extends UI\Control 
{

    const TEMPLATE_FULL = 'full';
    const TEMPLATE_INLINE = 'inline';
    protected $evaluateMatch;


    

    public function renderFull($match = [])
    {
        $this->render($match, self::TEMPLATE_FULL);
    }

    public function renderInline($match = [])
    {
        $this->render($match, self::TEMPLATE_INLINE);
    }

    private function render($match, $templateName)
    {
        $template = $this->createTemplate();
        $template->setFile(__DIR__.'/../templates/components/MatchResult/'.$templateName.'.latte');
        $template->match = $this->evaluateResult($match);
        $template->render();
    }

	public function evaluateResult($match)
	{
		
			if ($match['played'] == 1 && $match['contumacy'] == 0)
			{
			    // pokud byly pencle tak je skore jine
			    if ($match["goal_home_penalty"] > 0  or $match["goal_away_penalty"] > 0)
			    {
	
			      $g1 = $match["goal_home_et"];
			      $g2 = $match["goal_away_et"];  
			      
				  if ($match["goal_home_penalty"] > $match["goal_away_penalty"])
			       {
			         // textovy detail je navyseni o gol aby to bylo jasne kdo vyhral
			         $result['text']['full_result']  = ($g1 + 1) . ":" . $g2 . " PEN";
			         $result['grt']['full_result']   = ($g1 + 1) . ":" . $g2;

			       }
			      else
				  {
					 // textovy detail je navyseni o gol aby to bylo jasne kdo vyhral
			         $result['text']['full_result']  = ($g1) . ":" . ($g2 + 1) . " PEN";
			         $result['grt']['full_result']   = ($g1) . ":" . ($g2 + 1);
			     
				  } 
				   
				   $result['match']['full_result'] = $g1 . ":" . $g2;
				   $result['match']['info']        = $match["goal_home_penalty"] . ":" . $match["goal_away_penalty"] . " pen.";
				   $result['match']['half_result'] = "(" . $match['goal_home_halftime'] . ":".  $match['goal_away_halftime'] . " , " . $match['goal_home_90'] . ":" . $match['goal_away_90']. ")";
			    }
			    // pencle nebyly takze nekdo vyhral v ET
			    elseif ($match["goal_home_et"] > 0 or $match["goal_away_et"] > 0)
			    {
			      $g1 = $match["goal_home_et"];
			      $g2 = $match["goal_away_et"]; 
			      
			      $result['text']['full_result']  = $g1 . ":" . $g2 . " ET";
			      $result['match']['full_result'] = $g1 . ":" . $g2;
			      $result['grt']['full_result']   = $g1 . ":" . $g2;
			      $result['match']['info']        = " po prodloužení";
			      $result['match']['half_result'] = "(" . $match['goal_home_halftime'] . ":".  $match['goal_away_halftime'] . " , " . $match['goal_home_90'] . ":" . $match['goal_away_90']. ")";
			    }
			    
			    else 
			    {
			    	// branky
				    $g1 = $match["goal_home_90"];
				    $g2 = $match["goal_away_90"];
				    
					$result['text']['full_result']   =  $g1 . ":" . $g2;
					$result['match']['full_result']  =  $g1 . ":" . $g2;
					$result['grt']['full_result']    =  $g1 . ":" . $g2;
				    $result['match']['half_result']  = "(" . $match['goal_home_halftime'] . ":".  $match['goal_away_halftime'] . ")";
			    	$result['match']['info']		 = '';
				
				}
			 }
			elseif ($match['played'] == 1 && $match['contumacy'] != 0)
			{
				// kontumacne vyhrali domaci
				if ($match['contumacy'] == 1)
				{
					$g1 = 3;
					$g2 = "K";
				}
				// kontumacne vyhrali hoste
				elseif ($match['contumacy'] == 2)
				{
					$g1 = "K";
					$g2 = "3";
				}
				// contumacy pro oba tymy!
				else
				{
					$g1 = "K";
					$g2 = "K";					
				}
				
			 	// textova podoba
				$result['text']['full_result'] =  $g1 . ":" . $g2;
				$result['text']['half_result'] =  $g1 . ":" . $g2;
				$result['text']['info']	       = ' kontumačně';
				
				// detail zapasu
				$result['match']['full_result'] =  $g1 . ":" . $g2;
				$result['match']['half_result'] =  $g1 . ":" . $g2;
				$result['match']['info']		= ' kontumačně';				
				
			}
			 // nic neni odehrane
			 else
			 {
			 	// textova podoba
				$result['text']['full_result'] = '-:-';
				$result['text']['half_result'] = '-:-';
				$result['text']['info']	       = '';
				
				// detail zapasu
				$result['match']['full_result'] = '-:-';
				$result['match']['half_result'] = '-:-';
				$result['match']['info']		= '';
				
				
				
			 }
		    	
		    return $result;
	}	


}
