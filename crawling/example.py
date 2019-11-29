
from urllib.request import urlopen
from bs4 import BeautifulSoup

html = urlopen("http://policy.nec.go.kr/svc/policy/PolicyContent119.do")
bsObject = BeautifulSoup(html, "html.parser")

for link in bsObject.find_all('dt'):
    print(link.text.strip(), link.get('href'))