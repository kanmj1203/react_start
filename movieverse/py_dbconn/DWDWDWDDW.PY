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

needed_headers = {'User-Agent': "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36"}
needed_headers = {'User-Agent':'Chrome/66.0.3359.181'}
needed_headers = {'User-Agent':'Mozilla/5.0', 'referer' : 'https://naver.com'}
r = requests.get(f'https://search.naver.com/search.naver?where=nexearch&sm=tab_etc&mra=bkEw&pkid=68&os=1775060&qvt=0&query=캐리비안의 해적: 블랙펄의 저주 정보', headers = needed_headers )
html = r.text
soup = BeautifulSoup(html, 'html.parser')

#for i in range(1, 10):  감독이랑 출연진 가져올때만
D_select = soup.select_one('#main_pack > div.sc_new.cs_common_module.case_empasis.color_15._au_movie_content_wrap > div.cm_content_wrap > div.cm_content_area._cm_content_area_info > div > div.detail_info > dl > div:nth-child(2) > dd')
#str_list.append(D_select)
#result = listToString(str_list)
print(D_select)