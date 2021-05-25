<?php
$memcache_obj = new Memcache;
$memcache_obj->addServer('unix:///home/a0196439/tmp/memcached.sock', 0);
$status = $memcache_obj->getStats();
$MBUsed= (real)$status["bytes"]/(1024*1024);
$MBSize=(real) $status["limit_maxbytes"]/(1024*1024);
?>

Статистика Memcache:
<table border='1'>
   <tr><td>Версия Memcache сервера</td><td> <?=$status ["version"];?></td></tr>
   <tr><td>Время работы Memcache (в секундах) </td><td><?=$status ["uptime"];?></td></tr>
   <tr><td>Максимальный объем памяти для Memcache</td><td><?=$MBSize;?> Мб</td></tr>
   <tr><td>Используется памяти</td><td><? printf("%.2f",$MBUsed);?> Мб</td></tr>
</table>