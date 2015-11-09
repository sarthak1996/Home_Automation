from datetime import datetime
now =datetime.now()
print (now)
currentYear=now.year
currentMonth=now.month
currentDay=now.day
print("today's date:",currentYear,"-",currentMonth,"-",currentDay)
currentHour=now.hour
currentMinute=now.minute
currentSecond=now.second
currentSecond=currentSecond
currentMicrosecond=(now.microsecond)
print("time:",currentHour,":",currentMinute,":",currentSecond,".",currentMicrosecond)
f=open('in.txt','w')
f.write((str)(currentMonth)+"\n"+(str)(currentDay)+"\n"+(str)(currentHour)+"\n"+(str)(currentMinute)+"\n"+(str)(currentSecond)+"\n"+(str)(currentMicrosecond))
f.close()
