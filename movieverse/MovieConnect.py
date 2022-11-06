
import requests
from bs4 import BeautifulSoup
from urllib.request import urlopen
import json
import sys
import io

key = '13e4eba426cd07a638195e968ac8cf19'

def movieListPrint(lastPage = 1) :
    page = 1
    while page <= lastPage:
        url = f'https://api.themoviedb.org/3/discover/movie?api_key={key}&with_watch_providers=8&watch_region=KR&language=ko&page={page}'

        httpResponse = urlopen(url)
        jsondata = json.load(httpResponse)
        res_num = len(jsondata['results'])
        print(page)

        if res_num :
            for resCount in range(res_num):
                print(jsondata['results'][resCount]['title'])
        page = page + 1

movieListPrint(3)
print("aaaaa")


            # <?php
            #     $aa = 1;
            #     $bb;
            #     $output;
            #     // exec("python MovieConnect.py ".$aa." ", $output);
            #     exec("python MovieConnect.py", $output);
            #     echo '$output : ';
            #     print_r($output);
            #     echo '<br>';
            # ?>


            # response = requests.get(url)
    # if response.status_code == 200 :
    #     html = response.text
    #     soup = BeautifulSoup(html, 'html.parser')
    #     print(soup.get("results"))
    #     if soup.get("results") != [] :
    #         #print(soup)
    #         i = i + 1
    #     print('=============================')
    # else :
    #     print(response.status_code)
    # for dataList in jsondata :
    #     print(dataList['page'])
    # print(jsondata)
# 출처: https://prup.tistory.com/66?category=993695 [prup:티스토리]

# 스토리보드
# ERD, 디자인 (화면캡쳐)
