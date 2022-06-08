from cryptography.fernet import Fernet
import sys
import pymysql   
from cryptography.fernet import Fernet  
img = sys.argv[1]
addresi = img.split("/") 
imgadd= addresi[4]+"/" + addresi[5]
print(imgadd)
connection = pymysql.connect(host="localhost",user="root",passwd="Alper389938.",database="web-sec-project" )
cursor = connection.cursor()
retrive = "Select kymnt from imagetable where dirimage=%s;"
cursor.execute(retrive, (imgadd))
record = cursor.fetchall()
        
ky = "" 
for row in record:
    
    ky = row[0]