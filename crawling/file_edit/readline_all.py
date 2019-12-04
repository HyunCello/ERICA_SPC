f = open("/home/yh/git/SPC/crawling/file_edit/new.txt", 'r')
while True:
    line = f.readline()
    if not line: break
    print(line)
f.close()

'''
리스트로 받는 방법
f = open("/home/yh/git/SPC/crawling/file_edit/new.txt", 'r')
lines = f.readlines()
for line in lines:
    print(line)
f.close()
'''
'''
전체를 문자열로 반환
f = open("C:/doit/새파일.txt", 'r')
data = f.read()
print(data)
f.close()
'''