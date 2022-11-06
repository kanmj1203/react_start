from pickle import NONE
import requests
from bs4 import BeautifulSoup
import pymysql
import json
import sys
import io
import locale
sys.stdout = io.TextIOWrapper(sys.stdout.detach(), encoding = 'utf-8')
sys.stderr = io.TextIOWrapper(sys.stderr.detach(), encoding = 'utf-8')



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

#sql = "select * from tv"
cur.execute("select * from tv")  #커서로 sql문 실행

tvId=[]

while True:
    row = cur.fetchone()
    if row == None:
        break
    tv_id = row[2]
    a = tv_id.decode('utf-8')
    print(a.strip("[""]"))