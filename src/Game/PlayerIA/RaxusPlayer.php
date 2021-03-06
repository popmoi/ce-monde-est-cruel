<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class RaxusPlayers
 * @package Hackathon\PlayerIA
 * @author Victor Seguin
 */

/*
J'ai voulu voir si mon adversaire faisait beaucoup de fois le même coup et le contrer dans ce cas là
et sinon je regarde tout simplement son dernier coup et je joue celui qui peut le battre.

*/

class RaxusPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

        // sleep(1);
        // echo "test";




        if ($this->result->getStatsFor($this->mySide)["rock"] > $this->result->getStatsFor($this->mySide)["paper"] and $this->result->getStatsFor($this->mySide)["rock"] > $this->result->getStatsFor($this->mySide)["scissors"]){
            return parent::paperChoice();
        }

        else if ($this->result->getStatsFor($this->mySide)["paper"] > $this->result->getStatsFor($this->mySide)["rock"] and $this->result->getStatsFor($this->mySide)["paper"] > $this->result->getStatsFor($this->mySide)["scissors"]){
            return parent::scissorsChoice();
        }

        else if ($this->result->getStatsFor($this->mySide)["scissors"] > $this->result->getStatsFor($this->mySide)["rock"] and $this->result->getStatsFor($this->mySide)["scissors"] > $this->result->getStatsFor($this->mySide)["paper"]){
            return parent::rockChoice();
        }

        else if ($this->result->getLastChoiceFor($this->opponentSide) == "rock"){
          return parent::paperChoice();
        }

        else if ($this->result->getLastChoiceFor($this->opponentSide) == "paper"){
          return parent::scissorsChoice();
        }

        else {
          return parent::rockChoice();
        }

        // var_dump($this->result->getStatsFor($this->mySide)["rock"] > 1);
        // print_r ($name);


        return parent::rockChoice();


    }
};
