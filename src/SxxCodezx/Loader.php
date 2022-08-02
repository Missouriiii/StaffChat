<?php

namespace SxxCodezx;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Server;

use SxxCodezx\Command\StaffChatCommand;

class Loader extends PluginBase implements Listener{

    public function onEnable(): void{
        $this->getLogger()->info("Plugin StaffChat Sussefully Enabled");
        Server::getInstance()->getCommandMap()->register("sc", new StaffChatCommand());
    }

    public function onPlayerJoin(PlayerJoinEvent $ev){
        $pl = $ev->getPlayer();
        $name = $pl->getName();
        foreach (Server::getInstance()->getOnlinePlayers() as $player){
            if($player->hasPermission("staffchat.cmd")){
                $player->sendMessage("§8[§4STAFFCHAT§7:§f".$name."§8] §7» Se Unio al Juego");
            }
        }
    }

    public function onPlayerQuit(PlayerQuitEvent $ev){
        $pl = $ev->getPlayer();
        $name = $pl->getName();
        foreach (Server::getInstance()->getOnlinePlayers() as $player){
            if($player->hasPermission("staffchat.cmd")){
                $player->sendMessage("§8[§4STAFFCHAT§7:§f".$name."§8] §7» Salio Del Juego");
            }
        }
    }
}