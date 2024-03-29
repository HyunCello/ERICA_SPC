# 크롤링을 이용해 정치공약 사이트 내 정보를 뽑아내기

## 구상

현재 구성하려는 사이트에 필요한 것은 내용인데 그 내용은 우리가 만들어내는것이 아니라 실제 국회의원이나 유권자들이 제시한 내용을 기준으로 사용해야 하는 것이였다.

그러기 위해서는 다른 사이트가 아니라 공식 사이트를 이용해야 한다고 생각했고

http://policy.nec.go.kr/svc/policy/PolicyList.do

이 사이트의 내용들을 가져오기로 생각했다.

(현재 이 사이트는 개편으로 인해 폐쇄된 상태이다..밑에 설명이 있다)

크게는 두가지의 컨텐츠를 선정했고

1. 제 19대 대통령 선거
2. 제 20대 국회의원 선거

이 두가지로 선정하였다.

## 방법

일단 기본적인 크롤링의 방식 자체도 몰랐기 때문에 하나하나 알아가면서 웹 크롤링을 시도하기로 하였다.

방식은 
https://webnautes.tistory.com/779

이 블로그의 글을 따라가고

파이썬 코딩에 대해서 모르겠다 싶으면 

https://wikidocs.net/book/1

'점프 투 파이썬' 책에 내용들에서 찾아서 적었다.

## 사용언어

사용 언어는 파이썬인데 아무래도 C++이나 자바보다 더 빨리 습득할 수 있는 언어였고
또한 크롤링에는 파이썬을 썼었다 라는 내용을 자주 접했었던 것 같아서 사용하였다

## 순서

1. 크롤링 하기
2. 문서로 저장하기
3. 웹페이지에서 불러오기

의 순서로 진행을 하기로 계획했다.

## 기본적인 크롤링 방법

```
sudo pip install requests beautifulsoap4
```
두 가지를 설치해 준다.

두 가지의 용도는
requests 패키지 안의 urlopen이라는 함수를 사용하여 주소로부터 웹페이지를 가져오고,

그것을 Beautifulsoap 객채로 변환을 시키는 것에 있다고 한다.

현재 코드는 example.py에 구성되어 있다.

BeautifulSoup 객체는 웹문서를 파싱한 상태이다. 

웹 문서가 태그 별로 분해되어 태그로 구성된 트리가 구성된다고 한다.

포함하는 태그가 부모가 되고 포함된 태그가 자식이 되어 트리를 구성하고 있다고 한다.

**파싱이란 일련의 문자열로 구성된 문서를 의미 있는 토큰(token)으로 분해하고  토큰으로 구성된 파스 트리(parse tree)를 만드는 것을 뜻한다고 한다** 


```
from urllib.request import urlopen
from bs4 import BeautifulSoup

html = urlopen("http://www.naver.com")  

bsObject = BeautifulSoup(html, "html.parser") 


print(bsObject) # 웹 문서 전체가 출력됩니다. 
```

이 코드를 기본으로 하였는데

이 코드를 실행하게 되면 커멘드 창에 파싱된 데이터가 다 뜨게 된다.

## 문서로 저장하는 방법

파싱을 해 온건 텍스트 파일로 확인을 하였는데... 이것을 저장을 해야 사용할 수 있다고 생각을 하였다

왜냐하면 파이썬 코드는 웹페이지에 들어가지 않으니깐...
웹페이지는 HTML, CSS, JavaScript로 구성이 되기 떄문에 파이썬 코드는 들어갈 수 없고

txt 파일이나 다른 파일들을 JavaScript나 php를 통해서 읽는것만 가능하다고 알고 있다.

그래서 파이썬으로 만든 자료를 txt파일로 저장하는 방법도 찾아보았고 코드는 다음과 같다

```
f = open("/home/yh/git/SPC/crawling/file_edit/new.txt", 'w')
for i in range(1, 11):
    data = "%d번째 줄입니다.\n" % i
    f.write(data)
f.close()
```

이 코드를 이용하면 줄들을 txt파일로 저장할 수 있고

이 코드와 이전 코드를 합치면 크롤링 된 파일들을 저장할 수 있겠다 라고 생각했다.

그래서 제작한 코드는 example.py에 있다.

## 웹페이지에서 불러오는 방법

현재 2학기 수업으로 웹 앱 프로그래밍 과목을 수강하고 있는데

기본적인 html 및 css 사용법을 배웠고

php를 이용한 서버사이드 코딩에 관해서 배웠다

그러하여 파일을 읽어들이는 것을 php로 구현하기로 하고

코드를 제작하였다.

![php code](../screenshots/KakaoTalk_20191222_213829330.png)

이러한 코드는 m3u 파일로 구성된 자료들을 각각의 div에 p 안으로 넣어주는 코드이다
결과는 이런식으로 나오게 되었다.

![php결과창](../screenshots/KakaoTalk_20191222_213741647.png)

따로 노가다를 해서 적을 필요 없이 크롤링한 데이터만으로 이렇게 구성을 할 수 있게 되었다.

# 그런데 

문제가 생겼다
사이트가 개편을 해버려서 더이상 html 내에 정보를 저장한 것이 아니라

js 파일을 통한 파일 읽기로 변형이 되어버려

단순한 html 코드 크롤링으로는 데이터를 뺴낼 수 없게 되었다

사실 여기에서 사용된 pdf 안의 내용도 이전에는 html코드로 구성이 되어 있어 크롤링을 통해 가져올 수 있겠다라고 생각이 되어

시작하게 되었는데 그 방법이 막혀버린 것이다

그래서 크롤링은 결국 여기서 멈출 수밖에 없었다.

## 하지만
웹 크롤링을 한번도 해 보지 못했던 것과 달리

이제는 크롤링을 어떻게 하면 될지 방법을 알게 되어서

의미있는 프로젝트 성과라고 생각하고 있다.