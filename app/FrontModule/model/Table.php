<?php

namespace App\Model;

use Nette;

class Table extends BaseModel 
{
        
protected $tableName = '';


public function init($stageId)
{
    // dostupne tymy    
    $t = $this->database->query('                  
                                SELECT 
                                DISTINCT team_home_id as tym,
                                team.name,
                                team.logo

                                FROM `match` JOIN team ON team.id = `match`.team_home_id
                                
                                WHERE stage_list_id = ?
        
                                UNION 
        
                                SELECT 
                                DISTINCT team_away_id as tym,
                                team.name,
                                team.logo

                                FROM `match`
                                JOIN team ON team.id = `match`.team_away_id
                                WHERE stage_list_id = ?',
                            $stageId,
                            $stageId
                        )->fetchAll();
    
                               


    $teams = array();
    foreach ($t as $index => $r)
    {
        $teams[$r->tym] = array('tym' => $r->tym, 'name' => $r->name, 'logo' => $r->logo);
    }
    
    
    $tabulkoveHodnoty = array(
                              "pz", "w", "d", "l", "gf", "ga", "pts", "gdiff", "team", "faul_pts",
                            );
    $data = array();
    foreach ($teams as $tym)
    {
      foreach ($tabulkoveHodnoty as $hodnota)
      {
    
           if ($hodnota == "team")
           {
                $data[$tym['tym']][$hodnota] = $tym['tym'];           
                $data[$tym['tym']]['name'] = $tym['name'];           
                $data[$tym['tym']]['logo'] = $tym['logo'];           
           }
            
           else
           {
                $data[$tym['tym']][$hodnota] = 0;
           }
            
      }
    }
   
    
    return $data; 
 } 




	public  function reCount($stageId)
	{

		// prvotni INIT
		$data = array();
		$data = $this->init($stageId);
				
		// odehrane zapasy
		$matches = $this->database->query('SELECT * FROM `match` 
            							   WHERE  
                                           played = 1 AND
            							   stage_list_id = ? 
							   ', $stageId)->fetchAll();
							   
		foreach ($matches as $index => $r)
        {
          // nastaveni promennych
          $domaci 		= $r->team_home_id;
          $hoste  		= $r->team_away_id;
          $g1     		= $r->goal_home_90;
          $g2     		= $r->goal_away_90;
          $kontumace 	= 0;
          $trest1 		= 0;
          $trest2 		= 0;
          
          // vypocet
          
          
          $data[$domaci]["id"] = $domaci;
          $data[$hoste]["id"]  = $hoste;
          
          // domaci vyhrali
          if ($g1 > $g2 && $kontumace == 0)
          {
            // nastavime domaci
            $data[$domaci]["pz"]++;
            $data[$domaci]["w"]++;
            //$data[$domaci]["dl"]++;
            //$data[$domaci]["l"]++;
            $data[$domaci]["gf"] += $g1;
            $data[$domaci]["ga"] += $g2;
            $data[$domaci]["pts"] += 3;
            $data[$domaci]["faul_pts"] += $trest1;
            $data[$domaci]["gdiff"] += $g1 - $g2;
            
            
            
            // nastavime hosty
            $data[$hoste]["pz"]++;
            //$data[$hoste]["w"]++;
            //$data[$hoste]["dl"]++;
            $data[$hoste]["l"]++;
            $data[$hoste]["gf"] += $g2;
            $data[$hoste]["ga"] += $g1;
            $data[$hoste]["pts"] += 0;
            $data[$hoste]["faul_pts"] += $trest2;
            $data[$hoste]["gdiff"] += $g2 - $g1; 
            
          }
         // vyhrali hoste 
         elseif ($g1 < $g2 && $kontumace == 0)
         {
            // nastavime domaci
            $data[$domaci]["pz"]++;
            //$data[$domaci]["w"]++;
            //$data[$domaci]["dl"]++;
            $data[$domaci]["l"]++;
            $data[$domaci]["gf"] += $g1;
            $data[$domaci]["ga"] += $g2;
            $data[$domaci]["pts"] += 0;
            $data[$domaci]["faul_pts"] += $trest1;
            $data[$domaci]["gdiff"] += $g1 - $g2;
            
			// nastavime hosty
            $data[$hoste]["pz"]++;
            $data[$hoste]["w"]++;
            //$data[$hoste]["dl"]++;
            //$data[$hoste]["l"]++;
            $data[$hoste]["gf"] += $g2;
            $data[$hoste]["ga"] += $g1;
            $data[$hoste]["pts"] += 3; 
            $data[$hoste]["faul_pts"] += $trest2;  
			$data[$hoste]["gdiff"] += $g2 - $g1;     
         } 
        // remiza 
        elseif ($g1 == $g2 && $kontumace == 0)
        {
            // nastavime domaci
            $data[$domaci]["pz"]++;
            //$data[$domaci]["w"]++;
            $data[$domaci]["d"]++;
            //$data[$domaci]["l"]++;
            $data[$domaci]["gf"] += $g1;
            $data[$domaci]["ga"] += $g2;
            $data[$domaci]["pts"] += 1;
            $data[$domaci]["faul_pts"] += $trest1;
            $data[$domaci]["gdiff"] += $g1 - $g2;
            
            // nastavime hosty
            $data[$hoste]["pz"]++;
            //$data[$hoste]["w"]++;
            $data[$hoste]["d"]++;
            //$data[$hoste]["l"]++;
            $data[$hoste]["gf"] += $g2;
            $data[$hoste]["ga"] += $g1;
            $data[$hoste]["pts"] += 1; 
            $data[$hoste]["faul_pts"] += $trest2;  
			$data[$hoste]["gdiff"] += $g2 - $g1;               
        }
        // kontumace pro oba 
        elseif ($g1 == $g2 &&  $kontumace == 3)
        {
            // nastavime domaci
            $data[$domaci]["pz"]++;
            //$data[$domaci]["w"]++;
            //$data[$domaci]["dl"]++;
            $data[$domaci]["l"]++;
            $data[$domaci]["gf"] += 0;
            $data[$domaci]["ga"] += 3;
            $data[$domaci]["pts"] += 0;
            $data[$domaci]["faul_pts"] += $trest1;
            $data[$domaci]["gdiff"] += -3;
            
            // nastavime hosty
            $data[$hoste]["pz"]++;
            //$data[$hoste]["w"]++;
            //$data[$hoste]["dl"]++;
            $data[$hoste]["l"]++;
            $data[$hoste]["gf"] += 0;
            $data[$hoste]["ga"] += 3;
            $data[$hoste]["pts"] += 0;
            $data[$hoste]["faul_pts"] += $trest2;  
			$data[$hoste]["gdiff"] += -3;              
        }   
		
        // kontumace pro hosta
        elseif ($kontumace == 1)
        {
            // nastavime domaci
            $data[$domaci]["pz"]++;
            $data[$domaci]["w"]++;
            //$data[$domaci]["dl"]++;
            //$data[$domaci]["l"]++;
            $data[$domaci]["gf"] += 3;
            $data[$domaci]["ga"] += 0;
            $data[$domaci]["pts"] += 3;
            $data[$domaci]["faul_pts"] += $trest1;
            $data[$domaci]["gdiff"] += 3;
            
            
            
            // nastavime hosty
            $data[$hoste]["pz"]++;
            //$data[$hoste]["w"]++;
            //$data[$hoste]["dl"]++;
            $data[$hoste]["l"]++;
            $data[$hoste]["gf"] += 0;
            $data[$hoste]["ga"] += 3;
            $data[$hoste]["pts"] += 0;
            $data[$hoste]["faul_pts"] += $trest2;
            $data[$hoste]["gdiff"] += -3;              
        }
		
         // vyhrali hoste 
         elseif ($kontumace == 2)
         {
            // nastavime domaci
            $data[$domaci]["pz"]++;
            //$data[$domaci]["w"]++;
            //$data[$domaci]["dl"]++;
            $data[$domaci]["l"]++;
            $data[$domaci]["gf"] += 0;
            $data[$domaci]["ga"] += 3;
            $data[$domaci]["pts"] += 0;
            $data[$domaci]["faul_pts"] += $trest1;
            $data[$domaci]["gdiff"] += -3;
            
			// nastavime hosty
            $data[$hoste]["pz"]++;
            $data[$hoste]["w"]++;
            //$data[$hoste]["dl"]++;
            //$data[$hoste]["l"]++;
            $data[$hoste]["gf"] += 3;
            $data[$hoste]["ga"] += 0;
            $data[$hoste]["pts"] += 3; 
            $data[$hoste]["faul_pts"] += $trest2;  
			$data[$hoste]["gdiff"] += 3;     
         }		 	
		     
          
      }

            usort($data, array($this, 'sortTable'));
    		return $data;
	} 





public function sortTable($a, $b) 
{ 
    
    $a['pts_diff'] = $a['pts'] - $a['faul_pts'];
    $b['pts_diff'] = $b['pts'] - $b['faul_pts'];
    
    //debug($a);

    if ($a['pts_diff'] < $b['pts_diff']) return 1;
    if ($a['pts_diff'] > $b['pts_diff']) return -1;
     
    if ($a['gdiff'] < $b['gdiff']) return 1;
    if ($a['gdiff'] > $b['gdiff']) return -1;
    
    
    if ($a['gf'] < $b['gf']) return -1;
    if ($a['gf'] > $b['gf']) return 1;    
    
    if ($a['ga'] < $b['ga']) return -1;
    if ($a['ga'] > $b['ga']) return 1;        
    
    

     return 0; 
} 

}





