<?php

namespace SxxCodezx\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;
use SxxCodezx\Sounds;
use function implode;

class StaffChatCommand extends Command {

    public $prefix = "§8[§bStaffchat§8] §l§7»§r ";

    public function __construct()
    {
        parent::__construct("sc", "Send a message to the staff chat!", null, ["staffchat"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            if(!$sender->hasPermission("staffchat.cmd")){
                Sounds::addSound($sender, 'note.bass', 50, 1);
                $sender->sendMessage($this->prefix."You do not have permission to join the Staff Chat!");
                return false;
            }
            if(!isset($args[0])){
                $sender->sendMessage($this->prefix."You Need More Arguments");
                Sounds::addSound($sender, 'note.bass', 50, 1);
                return false;
            }
            $message = implode(" ", $args);
            $name = $sender->getName();
            foreach (Server::getInstance()->getOnlinePlayers() as $player){
                if($player->hasPermission("staffchat.cmd")){
                    $player->sendMessage("§8[§bStaffchat§8] ".$name." §l§7»§r ".$message);
                }
            }
        }else{

        }
    }
}
