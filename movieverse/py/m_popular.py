'''from tmdbv3api import TMDb
tmdb = TMDb()
tmdb.api_key = 'ab4dba23e29d3a417e7bb541323f3e81'

from tmdbv3api import Movie
tmdb.language = 'ko'
tmdb.debug = True

movie = Movie()
popular = movie.popular()

for p in popular:
    print(p.id)
    print(p.title)
    print(p.overview)
    print(p.poster_path)
'''
'''
import requests


response = requests.get("https://api.themoviedb.org/3/movie/popular?api_key=ab4dba23e29d3a417e7bb541323f3e81&language=ko")
print(response.json())
'''

import requests

# requests.get(이 안에는 url이 들어가야 한다)
Base_Url = 'https://api.themoviedb.org/3'
path = '/movie/popular'
# 쿼리스트링을 입력 할 때 params를 이용한다.
params = {
    'api_key': 'ab4dba23e29d3a417e7bb541323f3e81',  # required
    'language': 'ko',	# optional
    'page' : "490",
    #'region' : "KR"
}
response = requests.get(Base_Url + path, params = params).json()
print(response)

