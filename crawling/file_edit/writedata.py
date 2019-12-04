f = open("/home/yh/git/SPC/crawling/file_edit/new.txt", 'w')
for i in range(1, 11):
    data = "%d번째 줄입니다.\n" % i
    f.write(data)
f.close()