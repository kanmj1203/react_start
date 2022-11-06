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
    host='127.0.0.1',
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
#print(movieId)

##########배열 문자열로 변환 (띄어쓰기 /로 바꿈)
def listToString(str_list):
    result = ""
    for s in str_list:
        result += s + "/"
    return result.strip()

####### BeautifulSoup4로 api통해서 가져온 Movie ID 리스트로 각 사이트 정보 GET ########
def get_provider():
    soup = BeautifulSoup(html, 'html.parser')

    try:
        for k in soup.find("li", class_="ott_filter_best_price ott_filter_4k").find_all("div"):
            providerName_select = k.find("a")["title"]
            
            if "Netflix" in providerName_select:
                providerName_select = "8"
                providerName_list.append(providerName_select)
            elif "Disney Plus" in providerName_select:
                providerName_select = "337"
                providerName_list.append(providerName_select)
            elif "Watcha" in providerName_select:
                providerName_select = "97"
                providerName_list.append(providerName_select)
            else:
                providerName_select = pymysql.NULL
                providerName_list.append(providerName_select)
    except AttributeError as e:
        try:
            for k in soup.find("li", class_="ott_filter_best_price ott_filter_sd").find_all("div"):
                providerName_select = k.find("a")["title"]

                if "Netflix" in providerName_select:
                    providerName_select = "8"
                    providerName_list.append(providerName_select)
                elif "Disney Plus" in providerName_select:
                    providerName_select = "337"
                    providerName_list.append(providerName_select)
                elif "Watcha" in providerName_select:
                    providerName_select = "97"
                    providerName_list.append(providerName_select)
                else:
                    providerName_select = pymysql.NULL
                    providerName_list.append(providerName_select)

            for k in soup.find("li", class_="ott_filter_best_price ott_filter_hd").find_all("div"):
                providerName_select = k.find("a")["title"]

                if "Netflix" in providerName_select:
                    providerName_select = "8"
                    providerName_list.append(providerName_select)
                elif "Disney Plus" in providerName_select:
                    providerName_select = "337"
                    providerName_list.append(providerName_select)
                elif "Watcha" in providerName_select:
                    providerName_select = "97"
                    providerName_list.append(providerName_select)
                else:
                    providerName_select = pymysql.NULL
                    providerName_list.append(providerName_select)

        except AttributeError as e:
            providerName_select = pymysql.NULL
            providerName_list.append(providerName_select)

######################################
def get_site():
    soup = BeautifulSoup(html, 'html.parser')

    try:
        for i in soup.find("li", class_="ott_filter_best_price ott_filter_4k").find_all("div"):
            site_select = i.find("a")["href"]
            site_list.append(site_select)
    except AttributeError as e:
        try:
            for i in soup.find("li", class_="ott_filter_best_price ott_filter_sd").find_all("div"):
                site_select = i.find("a")["href"]
                site_list.append(site_select)
                
            for k in soup.find("li", class_="ott_filter_best_price ott_filter_hd").find_all("div"):
                site_select = k.find("a")["href"]
                site_list.append(site_select)
        except AttributeError as e:
            site_select = pymysql.NULL
            site_list.append(site_select)
########################
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
########################
def get_certification():
    str_list = []
    soup = BeautifulSoup(html, 'html.parser')
    try:
        certification_select = soup.select_one('#original_header > div.header_poster_wrapper.true > section > div.title.ott_true > div > span.certification').get_text()
        #result = listToString(str_list)
        certification_list.append(str_list)
    except AttributeError as e:
        certification_select = pymysql.NULL
        certification_list.append(certification_select)
##################### API url 통해 각 작품 tmdb 상세 사이트 GET ###################### 

providerName_list = []
site_list = []
cast_list= []
certification_list = []

for i in range(0,len(movieId)):
    j = movieId[i]
    needed_headers = {'User-Agent': "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36"}
    needed_headers = {'User-Agent':'Chrome/66.0.3359.181'}
    needed_headers = {'User-Agent':'Mozilla/5.0', 'referer' : 'http://www.themoviedb.org/movie/414906-the-batman/watch?locale=KR'}
    r = requests.get(f'https://www.themoviedb.org/movie/{i}', headers = needed_headers )
    html = r.content

    #get_provider()
    #get_site()    
    #get_cast()

#print(providerName_list)
#print(site_list)
#print(cast_list)
get_certification()
print(len(certification_list))
#print(len(providerName_list))
#print(len(site_list))
#print(len(cast_list))
