<?php
namespace roi611\set;
class Main extends \pocketmine\plugin\PluginBase{
    public function onEnable():void{
        date_default_timezone_set("Asia/Tokyo");
        $path = php_ini_loaded_file();
        if($path === false) return;
        copy($path,$path.".backup.ini");
        $data = file($path);
        $new = [];
        foreach($data as $setting){
            if(strpos((string)$setting,'date.timezone=') !== false){
                $setting = "date.timezone='Asia/Tokyo'\n";
                $this->getLogger()->info("§9Asia/Tokyoに変更しました");
            }
            array_push($new,$setting);
        }
        file_put_contents($path,$new);
    }
}

