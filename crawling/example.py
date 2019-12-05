
from urllib.request import urlopen
from bs4 import BeautifulSoup

html = urlopen("http://policy.nec.go.kr/svc/policy/PolicyContent119.do")
bsObject = BeautifulSoup(html, "html.parser")
f = open("/home/yh/git/SPC/crawling/crawlled/제19대대통령후보전체.txt", 'w')
for link in bsObject.find_all():
    data = link.text.strip()+"\n"
    f.write(data)
    print(link.text.strip(), link.get('href'))
f.close()