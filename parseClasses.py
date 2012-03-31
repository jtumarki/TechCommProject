import httplib2
from BeautifulSoup import BeautifulSoup

cache = httplib2.Http(".cache")

def get_courses():
    http = "http://www.tylerhedrick.com/classes.html"
    page = cache.request(http,"GET")
    
    soup = BeautifulSoup(page[1])
    classes = soup.findAll('tr')
    length = len(classes)
    parsed = [[]]*length
    for x in xrange(4,length-1,2):
        course_num = classes[x].contents[0].string
        course_name = classes[x].contents[1].string
        units = classes[x].contents[2].string
        section = classes[x].contents[3].string
        days = classes[x].contents[4].string
        begin = classes[x].contents[5].string
        end = classes[x].contents[6].string
        room = classes[x].contents[7].string
        try:
            instructor = classes[x].contents[8].string
        except IndexError:
            instructor = None
        if (course_num == "&nbsp;" or course_num == None):
            course_num = parsed[x-1][0]
            course_name = parsed[x-1][1]
            units = parsed[x-1][2]
            if (section == "&nbsp;" or section == None):
                section = parsed[x-1][3]
            if (begin == "&nbsp;" or begin == None):
                begin = parsed[x-1][5]
            if (end == "&nbsp;" or end == None):
                end = parsed[x-1][6]
            if (days == "&nbsp;" or days == None):
                days = parsed[x-1][4]
            if (room == "&nbsp;" or room == None):
                room = parsed[x-1][7]
            if (instructor == "&nbsp;" or instructor == None):
                instructor = parsed[x-1][8]
        course_id = str(course_num) + str(section)
        parsed[x] = ([course_num,course_name,units,section,days,begin,end,room,instructor,course_id])
        ncourse_num = classes[x+1].contents[0].string
        ncourse_name = classes[x+1].contents[1].string
        nunits = classes[x+1].contents[2].string
        nsection = classes[x+1].contents[3].string
        ndays = classes[x+1].contents[4].string
        nbegin = classes[x+1].contents[5].string
        nend = classes[x+1].contents[6].string
        nroom = classes[x+1].contents[7].string
        try:
            ninstructor = classes[x+1].contents[8].string
        except IndexError:
            ninstructor = None
        if (ncourse_num == "&nbsp;"):
            ncourse_num = course_num
            ncourse_name = course_name
            nunits = units
            if (nbegin == "&nbsp;" or nbegin == None):
                nbegin = begin
            if (nend == "&nbsp;" or nend == None):
                nend = end
            if (ndays == "&nbsp;" or ndays == None):
                ndays = days
            if (nroom == "&nbsp;" or nroom == None):
                nroom = room
            if (ninstructor == "&nbsp;" or ninstructor == None):
                ninstrucotr = instructor
            if (nsection == "&nbsp;" or nsection == None):
                nsection = section
        ncourse_id = str(ncourse_num) + str(nsection)
        parsed[x+1] = ([str(ncourse_num),str(ncourse_name),nunits,nsection,ndays,nbegin,nend,nroom,ninstructor,ncourse_id])
    instructs = []
    for item in parsed:
        try:
            if (item[8] in instructs):
                continue
            else:
                instructs.append(item[8])
        except IndexError:
            continue
    final = []
    for prof in instructs:
        try:
            multiples = prof.split(',');
            for m in multiples:
                final.append(m.split())
        except:
            continue
    courses = []
    current = []
    for item in parsed:
        try:
            current.append(item[0])
            current.append(item[1])
            if (current in courses):
                continue
                current = []
            else:
                courses.append(current)
                current = []
        except IndexError:
            continue
            current = []
    return (parsed,final,courses)

(total,professors,courses) = get_courses()
         
#for p in professors:
#    print 'mysql_query("INSERT INTO instructors (instructor) VALUES (' + "'" + p[0] + "'" + ')");'

for c in courses:
    print 'mysql_query("INSERT INTO courses (course_num,course_name) VALUES (' + "'" + c[0] + "'"+ ",'" + c[1] + "'" + ')");'

# for c in (total):
#       if (len(c) < 9): 
#           continue
#       else:
#           print 'mysql_query("INSERT INTO classData (course_id,course_num,title,units,section,days,begin,end,room,instructor,semester)'
#           print "VALUES ('" + str(c[9]) + "','" + str(c[0]) + "','" + str(c[1]) + "','"+ str(c[2]) + "','"+ str(c[3]) + "','"+ str(c[4]) + "','"+ str(c[5]) + "','"+ str(c[6]) + "','"+ str(c[7]) + "','"+ str(c[8]) + "','" + "Spring')" + '");'
#     
    