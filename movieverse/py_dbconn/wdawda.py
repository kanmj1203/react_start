import requests
from bs4 import BeautifulSoup
from urllib.parse import quote
import pymysql
import json
import sys
import io
import locale
sys.stdout = io.TextIOWrapper(sys.stdout.detach(), encoding = 'utf-8')
sys.stderr = io.TextIOWrapper(sys.stderr.detach(), encoding = 'utf-8')
##########################################################함수선언
def listToString(str_list):
    result = ""
    for s in str_list:
        result += s + "/"
    return result.strip()

'''
def get_Director():
    soup = BeautifulSoup(html, 'html.parser')
    for k in range(0, 30):
        try:
            D_select = soup.select_one(f'#main_pack > div.sc_new.cs_common_module.case_empasis.color_{k}._au_movie_content_wrap > div.cm_content_wrap > div.cm_content_area._cm_content_area_info > div > div.detail_info > dl > div:nth-child(2) > dd').get_text()
        except AttributeError as e:
            continue
        if not D_select:
            D_select = pymysql.NULL
            director_list.append(D_select)
        director_list.append(D_select)
        print(D_select)
'''
def get_director():
    str_list = []
    soup = BeautifulSoup(html, 'html.parser')
    try:
        for i in range(1,10):
            director_select = soup.select_one(f'#cast_scroller > ol > li:nth-child({i}) > p:nth-child(2) > a').get_text()
            str_list.append(director_select)
        result = listToString(str_list)
        director_list.append(result)
    except AttributeError as e:
        director_select = pymysql.NULL
        director_list.append(director_select)

def get_cast():
    str_list = []
    soup = BeautifulSoup(html, 'html.parser')
    try:
        for i in range(1,10):
            cast_select = soup.select_one(f'#cast_scroller > ol > li:nth-child({i}) > p:nth-child(2) > a').get_text()
            str_list.append(cast_select)
        result = listToString(str_list)
        cast_list.append(result)
    except AttributeError as e:
        cast_select = pymysql.NULL
        cast_list.append(cast_select)   


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

director_list = []
cast_list = []

for i in range(0,len(movieName)):
    needed_headers = {'User-Agent': "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36"}
    needed_headers = {'User-Agent':'Chrome/66.0.3359.181'}
    needed_headers = {'User-Agent':'Mozilla/5.0', 'referer' : 'https://naver.com'}
    r = requests.get(f'https://search.naver.com/search.naver?where=nexearch&sm=top_hty&fbm=0&ie=utf8&query={movieName[i]} 정보', headers = needed_headers )
    html = r.text

