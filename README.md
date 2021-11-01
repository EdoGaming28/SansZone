# SansZone
a plugin like SansSmpS5 (SansZone) -> Wilderness / Safe_Zone

# How To Use
- Install the plugin 
- then put the plugin into the plugins folder
- and restart your server

# System
Indonesia:
- jika player berada di dalam land player lain ataupun berada di land sendiri, data akan di set ke Safe_Zone
- Dan jika player berada di luar land maka data akan di set ke Wilderness
- pakailah juga SansZoneAddon untuk Scorehud supaya bisa mengecek Wilderness Or Safe_Zone

English:
- Coming Soon //males translate

# CheckLand
- For developers who want to remake this plugin
```php
public function onCheckLand($player){
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
```

