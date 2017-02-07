# NMG_netflow
東海資工網路流量管理介面

![image](https://github.com/akira9478/NMG_netflow/blob/master/demo.JPG)

 
 大學時期在東海資工系上網路管理小組時寫的流量控管的介面
 
 ## 採用技術:
 ***
 
 數據:cacti流量控管軟體
 
 後端:Linux,PHP,mysql
 
 前端:Bootstrap,jquery
 
 驗證:LDAP
 
 
##主要功能
***
### 實驗室流量圖
 大智慧科技大樓3F4F5F各資工系實驗室的流量  
 >lab.php,lab.3f.php,lab.4f5f.php  
 
### 流量TOP20
 IP流量前20名  
 >octet.php
 
### 連結數TOP20
 連接數前20名  
 >flow.php


## 後台額外功能
***
### Snort分析
 snort alert入侵偵測  
 >snort.php
 
###ARP watch
 分析各主機IP狀況  
 >arp_watch.php
 
### Switch Log
>switch_log.php  

### Port管理
 管理系上違規port  
 >Port_Management sw_220.php sw_230.php sw_240.php  
 
*此功能為小靳製作*
 
###Switch狀況
 圖示化各Switch連線狀況  
 >ping.php
  
*此功能為秉澤製作*
 
###違規名單公告
  公開違規名單給各實驗室  
  >ban_ins.php,action.php,action1.php
  
*此功能未完成*
