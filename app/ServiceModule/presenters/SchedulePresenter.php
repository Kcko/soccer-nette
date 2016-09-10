<?php

namespace App\ServiceModule\Presenters;

use Nette,
	Cardbook,
	App\Model;



class SchedulePresenter extends BasePresenter
{

	const COMPETITION_ID = 1;
	const SEASON_ID = 1;



	public function actionDefault()
	{

		$list = array(

			// stage ID => teams
			3  => array(1, 2, 3, 4), // sk. A = > Brazilie, Mexico, Chorvatsko, Kamerun,
			4  => array(5, 6, 7, 8), // sk. B = > Nizozemsko, Chile, Španělsko, Austrálie,
			5  => array(9, 10, 11, 12), // sk. C = > Kolumbie, Řecko, Pobřeží Slonoviny, Japonsko,
			6  => array(13, 14, 15, 16), // sk. D = > Uruguay, Kostarika, Anglie, Itálie,
			7  => array(17, 18, 19, 20), // sk. E = > Švýcarsko, Ekvádor, Francie, Honduras,
			8  => array(21, 22, 23, 24), // sk. F = > Argentina, Bosna & Herceg., Iran, Nigérie,
			9  => array(25, 26, 27, 28), // sk. G = > Německo, Portugalsko, Ghana, USA,
			10 => array(29, 30, 31, 32), // sk. H = > Belgie, Alzirsko, Rusko, N. Korea,

		);


		foreach ($list as $stageId => $teams)
		{
			$this->generateSchedule($teams, $stageId);
		}


		$this->terminate();

	}



	public function generateSchedule($teams, $stageId)
	{
	
		shuffle($teams);
		$teamsTotal = count($teams);
		$arr        = $this->createFixtures($teamsTotal);
		$schedule   = $this->assignNumberToPlayers($teams);
		
			
		// doma
		for($i = 1; $i <= count($arr); $i++)
		{
		
			for($q=1; $q <= count($arr[$i]); $q++)
			{
				
				$insert["team_home_id"]   = $schedule[$arr[$i][$q][1]];
				$insert["team_away_id"]   = $schedule[$arr[$i][$q][2]];
				$insert["competition_id"] = self::COMPETITION_ID;
				$insert["season_id"]      = self::SEASON_ID;
				$insert["stage_list_id"]  = $stageId;
				

				// ulozit zapas
				$this->addMatch($insert);	
				
			}
		}
		
		// // venku
		// for($i = 1; $i <= count($arr); $i++)
		// {

		// 	for($q=1; $q <= count($arr[$i]); $q++)
		// 	{
		// 		$insert["team_home_id"]     = $schedule[$arr[$i][$q][2]];
		// 		$insert["team_away_id"]      = $schedule[$arr[$i][$q][1]];
		// 			$insert["competition_id"] = COMPETITION_ID
		// 			$insert["season_id"]      = SEASON_ID
		// 			$insert["stage_list_id"]  = STAGE_ID;
					
		// 		// ulozit zapas
		// 		$this->addMatch($insert);
				
		// 	}
		// }		
		

		

	}


	protected function addMatch($insert)
	{
		$this->database->table("match")->insert($insert);
	}

	protected function assignNumberToPlayers($teams = array())
	{
		$i		   = 0;
	 	$positions = array();
	 	
		foreach ($teams as $teamId)
		{ 
			$i++;
			$positions[$i] = $teamId;
		}
	    
		return $positions;
	}

	protected function createFixtures($count)
	{
	    $arr = Array();
	    $line = Array();
	      
	      if(($count % 2) != 0)
	        $count++;
	    $str = ($count/2);
	    
	    $str1 = $str;
	    $round = ($count-1);
	    $start = 1;
	    for($i = 1; $i < $count; $i ++)
	    {        
	        if(($i%2)==0)
	            $str2 = $str1;
	        else
	            $str2 = $start++;
	            
	            
	        for($q = 1; $q < ($count/2+1); $q++)
	        {
	            
	            if($str2 == ($count))
	                $str2=1;
	                        
	            if($round == 0)
	                $round = ($count-1);
	                
	            if(($i%2) == 0)
	            {
	                if($q == 1)
	                {
	                    $str1++;
	                    $arr[$i][$q][1] = $count;
	                    $arr[$i][$q][2] = $str1;
	                    $str2++;
	                    $str2++;
	                }
	                else
	                {
	                    $arr[$i][$q][1] = $str2++;
	                    $arr[$i][$q][2] = $round--;
	                }
	                #echo $str2;
	            }
	            else
	            {
	                if($q == 1)
	                {
	                    $arr[$i][$q][1] = $str2++;
	                    $arr[$i][$q][2] = $count;
	                }
	                else
	                {
	                    $arr[$i][$q][1] = $str2++;
	                    $arr[$i][$q][2] = $round--;
	                }
	            }
	            
	        }
	    } 
			return $arr;
	}

}
