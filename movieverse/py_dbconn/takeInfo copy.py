import requests
from bs4 import BeautifulSoup
import pymysql
import json
import sys
import io
import locale
sys.stdout = io.TextIOWrapper(sys.stdout.detach(), encoding = 'utf-8')
sys.stderr = io.TextIOWrapper(sys.stderr.detach(), encoding = 'utf-8')
##########################################################함수선언

def takeDirector():
    soup = BeautifulSoup(html, 'html.parser')

    D_select = soup.select('main_pack > div.sc_new.cs_common_module.case_empasis.color_15._au_movie_content_wrap > div.cm_content_wrap > div.cm_content_area._cm_content_area_info > div > div.detail_info > dl > div:nth-child(2) > dd').text()
    director_list.append(D_select)
    print(D_select)
    


##################### mariaDB 접속코드 #####################

conn = None
cur = None

conn = pymysql.connect(
    host='uws7-028.cafe24.com',
    port=3306,
    user='movieverse',
    password='ww970714**',
    db='movieverse',
    charset='utf8'
)
cur = conn.cursor() #커서생성 (?)
##################### DB에서 필드(row) for문으로 배열 호출해서 저장 ######################
conn.query("set character_set_connection=utf8;")
conn.query("set character_set_server=utf8;")
conn.query("set character_set_client=utf8;")
conn.query("set character_set_results=utf8;")
conn.query("set character_set_database=utf8;")

#sql = "select * from movie"
cur.execute("set names utf8")
cur.execute("select * from movie")  #커서로 sql문 실행

movieName=[]

while True:
    row = cur.fetchone()
    if row == None:
        break
    movie_n = row[10]
    movieName.append(movie_n)
print(len(movieName))
#print(movieName)

director_list = []


needed_headers = {'User-Agent': "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36"}
needed_headers = {'User-Agent':'Chrome/66.0.3359.181'}
needed_headers = {'User-Agent':'Mozilla/5.0', 'referer' : 'https://search.naver.com'}
r = requests.get(f'https://search.naver.com/search.naver?where=nexearch&sm=top_hty&fbm=0&ie=utf8&query=캐리비안의 해적: 블랙펄의 저주', headers = needed_headers )
html = r.content
soup = BeautifulSoup(html, 'html.parser')
a = soup.select('main_pack > div.sc_new.cs_common_module.case_empasis.color_15._au_movie_content_wrap > div.cm_content_wrap > div.cm_content_area._cm_content_area_info > div > div.detail_info > dl > div:nth-child(2) > dd')
print(a)
#takeDirector()
#print(director_list)