from cgitb import text
from msilib import type_nullable
import pymysql
import requests
import json
import sys
import io
sys.stdout = io.TextIOWrapper(sys.stdout.detach(), encoding = 'utf-8')
sys.stderr = io.TextIOWrapper(sys.stderr.detach(), encoding = 'utf-8')

conn = None
cur = None

##################### mariaDB 접속코드 #####################
conn = pymysql.connect(
    host='localhost',
    port=3308,
    user='ssc',
    password='1234',
    db='sscdb',
    charset='utf8'
)
cur = conn.cursor() #커서생성 (?)
##################### DB에서 필드(row) for문으로 배열 호출해서 저장 ######################

#sql = "select * from movie"
cur.execute("select * from movie")  #커서로 sql문 실행

movieId=[]

while True:
    row = cur.fetchone()
    if row == None:
        break
    movie_id = row[3]
    movieId.append(movie_id)
    #print("%d" % (movie_id))

##################### API url 통해 JSON 호출 ######################
'''
movieId = 335787
requestData = requests.get(f'http://api.themoviedb.org/3/movie/{movieId}?api_key=b5e93145d28325f67dd399208c75630c&language=ko-KR')
jsonData = None
if requestData.status_code == 200:
    jsonData = requestData.json()
    print(jsonData.get("homepage"))
'''

### 1. 따로 파싱 (for문 돌아가면서 하나씩 새로 변수에 담김) ###
'''
for i in movieId:
    requestData = requests.get(f'http://api.themoviedb.org/3/movie/{i}?api_key=b5e93145d28325f67dd399208c75630c&language=ko-KR')
    jsonData = None
    if requestData.status_code == 200:
        jsonData = requestData.json()
        parseWhat = jsonData.get("homepage")

    print(parseWhat)
'''
### 2. 배열형태로 파싱 ###
def get_homepage():
    homepageList = []

    for i in movieId:
        requestData = requests.get(f'http://api.themoviedb.org/3/movie/{i}?api_key=b5e93145d28325f67dd399208c75630c&language=ko-KR')
        jsonData = None
        if requestData.status_code == 200:
            jsonData = requestData.json()
            parse_What = jsonData.get("homepage")
            homepageList.append(parse_What)

    print(homepageList[0])

def get_provider():
    providerList = []

    for i in movieId:
        requestData = requests.get(f'http://api.themoviedb.org/3/movie/{i}/watch/providers?api_key=b5e93145d28325f67dd399208c75630c&language=ko-KR')
        jsonData = None
        if requestData.status_code == 200:
            jsonData = requestData.json()
            parse_What = jsonData.get('results').get("KR")
            providerList.append(parse_What)
    print(type(parse_What))
    print(providerList[0])

get_homepage()
get_provider()

conn.commit()   # (삽입, 갱신 등 했을 때) 최종 저장

conn.close()    # 접속 종료