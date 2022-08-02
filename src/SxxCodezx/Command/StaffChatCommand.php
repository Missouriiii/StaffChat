<?php

namespace SxxCodezx\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;
use function implode;

class StaffChatCommand extends Command {

    public $prefix = "§l§4STAFFCHAT §r§7» ";

    public function __construct()
    {
        parent::__construct("sc", "Send Message To StaffChat", null, ["staffchat"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            if(!$sender->hasPermission("staffchat.cmd")){
                $sender->sendMessage($this->prefix."You Dont Have Permission To Enter In StaffChat");
                return false;
            }
            if(!isset($args[0])){
                $sender->sendMessage($this->prefix."You Need More Arguments");
                return false;
            }
            $message = implode(" ", $args);
            $name = $sender->getName();
            foreach (Server::getInstance()->getOnlinePlayers() as $player){
                if($player->hasPermission("staffchat.cmd")){
                    $player->sendMessage("§8[§4STAFFCHAT§7:§f".$name."§8] §7» ".$message);
                }
            }
        }else{

        }
    }
}