<?php

namespace SansZone\EdoGaming;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{
   
    private $eco;
    private $region;

    public function onEnable(){
        $this->getLogger()->info("plugin enable");
        $this->getServer()->getPluginManager ()->registerEvents($this, $this);
        $this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyLand");
        $this->region = new Config($this->getDataFolder() . "region.yml", Config::YAML);
    }
    
    public function onCheckLand(Player $player){
	    //$result = "";
	    if($this->region->get($player->getName()) == "Wilderness"){
	        //$result = "Wilderness";
	        return "Wilderness";
	    }
	    if($this->region->get($player->getName()) == "Safe_Zone"){
	        //$result = "Safe_Zone";
	        return "Safe_Zone";
	    }
	}
	
	public function onMove(PlayerMoveEvent $ev){
	    $sender = $ev->getPlayer();
	    $x = $sender->x;
		$z = $sender->z;
		$info = $this->eco->db->getByCoord($x, $z, $sender->getLevel()->getFolderName());
		if($info == true){
		    //unset($this->region[$sender->getName()]);
		    $this->region->set($sender->getName(), "Safe_Zone");
		    $this->region->save();
		    return true;
		}else if($info == false) {
		    //unset($this->region[$sender->getName()]);
		    $this->region->set($sender->getName(), "Wilderness");
		    $this->region->save();
		    return true;
		}
	}
}
