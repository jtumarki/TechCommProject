import tokenize
import httplib2
from BeautifulSoup import BeautifulSoup

cache = httplib2.Http(".cache")

def get_faculty():
    http = "http://www.tylerhedrick.com/tylerhedrick/faculty.html"
    page = cache.request(http,"GET")
    
    soup = BeautifulSoup(page[1])
    faculty = soup.findAll('a')
    fnames = []
    lnames = []
    depts = soup.findAll('td')
    for n in range(1,len(faculty)-1,2):
        fnames.append(faculty[n+1].string)
        lnames.append(faculty[n].string)   
    deps = []
    for d in range(4,len(depts),4):
        deps.append(str(str(depts[d].string).split()[0]))
    a = []
    for item in range(3,len(depts),4):
        final = ''
        l = str(depts[item].string).replace('&amp;','').replace('\n','').split()
        for s in l:
            final = final + s + " "
        a.append(final[:-1])
    return (fnames,lnames,a)
        
    
(f,l,a) = get_faculty()
instruct = {}

for x in xrange(len(a)):
	instruct[l[x]].append([f[x],tokenize.generate_tokens(a[x])])
	#print '"' + l[x] + '"' + ":" + "["+'"'+ f[x] + '"'+","+'"' + a[x] + '"'+"], "
    #print 'mysql_query("INSERT INTO instructors (fname,lname,dept) VALUES (' + "'" + f[x] + "'"+ ",'" + l[x] + "'" + ",'" + a[x] + "'"+ ')");'
	
print instruct;
#print "}"
