import requests
from bs4 import BeautifulSoup
from urllib.parse import quote
import pymysql
import json
import sys
import io
import locale
sys.stdout = io.TextIOWrapper(sys.stdout.detach(), encoding = "utf-8")
sys.stderr = io.TextIOWrapper(sys.stderr.detach(), encoding = "utf-8")

conn = None
cur = None

conn = pymysql.connect(
    host="uws7-028.cafe24.com",
    port=3306,
    user="movieverse",
    password="ww970714**",
    db="movieverse",
    charset="utf8"
)
#cur = conn.cursor() #커서생성 (?)
cur = conn.cursor(pymysql.cursors.DictCursor)
##################### DB에서 필드(row) for문으로 배열 호출해서 저장 ######################
conn.query("set character_set_connection=utf8;")
conn.query("set character_set_server=utf8;")
conn.query("set character_set_client=utf8;")
conn.query("set character_set_results=utf8;")
conn.query("set character_set_database=utf8;")

sql = "UPDATE movie SET age = %s"
#cur.execute("set names utf8")

mAge = ["12세 관람가", "12세 관람가", "12세 관람가", "전체 관람가", "15세 관람가", "전체 관람가", "전체 관람가", "12세 관람가", "12세 관람가", "액션 모험판타지SF", "청소년 관람불가", "12세 관람가", "12세 관람가", "12세 관람가", "12세 관람가", "12세 관람가", "12세 관람가", "12세 관람가", "12세 관람가", "12세 관람가", "액션범죄", "12세 관람가", "12세 관람가", "전체 관람가", "12세 관람가", "15세 관람가", "12세 관람가", "청소년 관람불가", "12세 관람가", "전체 관람가", "12세 관람가", "전체 관람가", "15세 관람가", "전체 관람가", "12세 관람가", "전체 관람가", "15세 관람가", "15세 관람가", "12세 관람가", "15세 관람가", "12세 관람가", "12세 관람가", "전체 관람가", "15세 관람가", "15세 관람가", "전체 관람가", "12세 관람가", "15세 관람가", "청소년 관람불가", "공포", "청소년 관람불가", "15세 관람가", "전체 관람가", "청소년 관람불가", "전체 관람가", "전체 관람가", "12세 관람가", "애니메이션", "15세 관람가", "15세 관람가", "미국", "15세 관람가", "12세 관람가", "15세 관람가", "15세 관람가", "청소년 관람불가", "청소년 관람불가", "액션", "15세 관람가"]


for i in range(0,len(mAge)):
    conn = pymysql.connect(
        host="uws7-028.cafe24.com",
        port=3306,
        user="movieverse",
        password="ww970714**",
        db="movieverse",
        charset="utf8"
    )
    cur.execute(sql, f'{(mAge[i])}')
    conn.commit()
    print(mAge[i])
conn.close()
        #커서로 sql문 실행
"""
movieName=[]

while True:
    row = cur.fetchone()
    if row == None:
        break
    movie_n = row[10]
    movieName.append(movie_n)
print(len(movieName))
"""