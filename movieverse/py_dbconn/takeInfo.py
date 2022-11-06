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
    str_list = []
    soup = BeautifulSoup(html, 'html.parser')
    try:
        #for i in range(1, 10):  감독이랑 출연진 가져올때만
        D_select = soup.select_one('#main_pack > div.sc_new.cs_common_module.case_empasis.color_15._au_movie_content_wrap > div.cm_content_wrap > div.cm_content_area._cm_content_area_info > div > div.detail_info > dl > div:nth-child(2) > dd').get_text()
        #D_select = soup.select_one('#main_pack > div.sc_new.cs_common_module.case_empasis.color_20._au_movie_content_wrap > div.cm_content_wrap > div.cm_content_area._cm_content_area_info > div > div.detail_info > dl > div:nth-child(2) > dd').get_text()
        #str_list.append(D_select)
        #result = listToString(str_list)
        director_list.append(D_select)
        print(D_select)
    except AttributeError as e:
        try:
            #for i in range(1, 10):  감독이랑 출연진 가져올때만
            #D_select = soup.select_one('#main_pack > div.sc_new.cs_common_module.case_empasis.color_15._au_movie_content_wrap > div.cm_content_wrap > div.cm_content_area._cm_content_area_info > div > div.detail_info > dl > div:nth-child(2) > dd').get_text()
            D_select = soup.select_one('#main_pack > div.sc_new.cs_common_module.case_empasis.color_20._au_movie_content_wrap > div.cm_content_wrap > div.cm_content_area._cm_content_area_info > div > div.detail_info > dl > div:nth-child(2) > dd').get_text()
                                        #main_pack > div.sc_new.cs_common_module.case_empasis.color_7._au_movie_content_wrap > div.cm_content_wrap > div.cm_content_area._cm_content_area_info > div > div.detail_info > dl > div:nth-child(2) > dd
            #str_list.append(D_select)
            #result = listToString(str_list)
            director_list.append(D_select)
            print(D_select)
        except AttributeError as e:
            try:
                #for i in range(1, 10):  감독이랑 출연진 가져올때만
                #D_select = soup.select_one('#main_pack > div.sc_new.cs_common_module.case_empasis.color_15._au_movie_content_wrap > div.cm_content_wrap > div.cm_content_area._cm_content_area_info > div > div.detail_info > dl > div:nth-child(2) > dd').get_text()
                D_select = soup.select_one('#main_pack > div.sc_new.cs_common_module.case_empasis.color_8._au_movie_content_wrap > div.cm_content_wrap > div.cm_content_area._cm_content_area_info > div > div.detail_info > dl > div:nth-child(2) > dd').get_text()
                #str_list.append(D_select)
                #result = listToString(str_list)
                director_list.append(D_select)
                print(D_select)
            except AttributeError as e:
                D_select = pymysql.NULL
                director_list.append(D_select)              
'''

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
    print(cast_list[i])

##################### mariaDB 접속코드 #####################

conn = None
cur = None

conn = pymysql.connect(
    host='localhost',
    port=3306,
    user='movieverse',
    password='1234',
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

cast_list = []

for i in range(0,len(movieName)):
    needed_headers = {'User-Agent': "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36"}
    needed_headers = {'User-Agent':'Chrome/66.0.3359.181'}
    needed_headers = {'User-Agent':'Mozilla/5.0', 'referer' : 'https://naver.com'}
    r = requests.get(f'https://search.naver.com/search.naver?where=nexearch&sm=top_hty&fbm=0&ie=utf8&query={movieName[i]} 정보', headers = needed_headers )
    html = r.text

    get_Director()
print(len(director_list))
print(director_list)