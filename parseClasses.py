import httplib2
from BeautifulSoup import BeautifulSoup

cache = httplib2.Http(".cache")

def get_courses():
deptdict = {"31":""Air Force ROTC",
"48":""Architecture",
"60":"Art",
"03":"Biological Sciences",
"42":"Biomedical Engineering",
"70":"Business Administration",
"62":"CFA Interdisciplinary",
"39":"CIT Interdisciplinary",
"99":"Carnegie Mellon University-Wide Studies",
"64":"Center for the Arts in Society",
"86":"CNBC: Center for the Neural Basis of Cognition",
"06":"Chemical Engineering",
"09":"Chemistry",
"12":"CEE: Civil & Environmental Engineering",
"02":"Computational Biology - Lane Center",
"15":"Computer Science Department",
"62":"Computer Science and Arts",
"93":"Creative Enterprise:Sch of Pub Pol & Mgt",
"51":"Design",
"54":"Drama",
"73":"Economics",
"18":"ECE: Electrical & Computer Engineering",
"20":"Electronic Commerce",
"19":"EPP: Engineering & Public Policy",
"76":"English",
"53":"ETC: Entertainment Technology Center",
"67":"H&SS Information Systems",
"66":"H&SS Interdisciplinary",
"94":"Heinz General & Administrative",
"79":"History",
"05":"HCII: Human-Computer Interaction",
"62":"Humanities and Arts",
"04":"Information & Communication Technology",
"14":"INI: Information Networking Institute",
 "95":"Information Systems:Sch of IS & Mgt",
"08":"ISR: Institute for Software Research",
"11":"Language Technologies Institute",
"38":"MCS Interdisciplinary",
"10":"MLD: Machine Learning Department",
"27":"MSE: Materials Science & Engineering",
"21":"Mathematical Sciences",
"24":"Mechanical Engineering",
"92":"Medical Management:Sch of Pub Pol & Mgt",
"30":"Military Science-ROTC",
"82":"Modern Languages",
"57":"Music",
"32":"Naval Science - ROTC",
"80":"Philosophy",
"69":"Physical Education",
"33":"Physics",
"85":"Psychology",
"91":"Public Management:Sch of Pub Pol & Mgt",
"90":"Public Policy & Mgt:Sch of Pub Pol & Mgt",
"16":"Robotics Institute",
"62":"Science and Arts",
"96":"Silicon Valley",
"88":"SDS: Social & Decision Sciences",
"17":"Software Engineering",
"36":"Statistics",
"98":"StuCo 'Student Led Courses'",
"45":"Tepper School of Business"}


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
		deptnum = course_id[0:2]
		dept = deptdict[deptnum]
		if(len(instruct[instructor] > 1):
			for i in instruct[instructor]:
				if(i[1].contains(dept)):
					fname = i[0]
					break
		else:
			fname = instruct[instructor][0]
		lname = instructor
        parsed[x] = ([course_num,course_name,units,fname,lname,dept])
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
				deptnum = ncourse_num[0:2]
				ndept = deptdict[deptnum]
				if(len(instruct[instructor] > 1):
					for i in instruct[instructor]:
						if(i[1].contains(dept)):
							nfname = i[0]
							break
				else:
					nfname = instruct[instructor][0]
				nlname = instructor
            if (nsection == "&nbsp;" or nsection == None):
                nsection = section
        ncourse_id = str(ncourse_num) + str(nsection)
        parsed[x+1] = ([ncourse_num,ncourse_name,nunits,nfname,nlname,ndept])
    instructs = []
	"""for item in parsed:
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
            current = []"""
    return (parsed,final,courses)

(total,professors,courses) = get_courses()
         
#for p in professors:
#    print 'mysql_query("INSERT INTO instructors (instructor) VALUES (' + "'" + p[0] + "'" + ')");'

#for c in courses:
#   print 'mysql_query("INSERT INTO courses (course_num,course_name) VALUES (' + "'" + c[0] + "'"+ ",'" + c[1] + "'" + ')");'

for c in (total):
       if (len(c) <5): 
           continue
       else:
           print 'mysql_query("INSERT INTO classDataNew (course_num,title,units, fname,lname,semester,dept)'
          print "VALUES ('" + str(c[0]) + "','" + str(c[1]) + "','" + str(c[2]) + "','"+ str(c[3]) + "','"+str(c[4])+ "','"+ "Spring"+"','" + str(c[5])')" + '");'
     
    