#! C:\Users\Dell\AppData\Local\Programs\Python\Python37-32\python.exe
from PIL import Image
import numpy as np

# Load image as flatten numpy array
def load_image(img):
    img = Image.open(img)
    arr = np.array(img)
    return arr.shape, arr.flatten()

# Convert message to binary
def convert_msg(msg):
    msg = msg
    binary_msg = ''
    for i in msg:
        binary_msg+=(format(ord(i), '08b'))
    binary_msg+='1'
    return binary_msg

# Change last bit of image pixel to message bit
def change_bit(img_pix, msg_bit):
    new_pix = int(img_pix[:-1] + str(msg_bit), 2)
    return new_pix

# Encode message to image
def encode_msg(msg, img):
    binary_msg = convert_msg(msg)
    shape, img = load_image(img)
    # Hide message in last bit of image pixel
    for i in range(len(binary_msg)):
        img[i] = change_bit(format(img[i], '08b'), binary_msg[i])
    return Image.fromarray(np.reshape(img, shape))
        
# Decode encoded message in image    
def decode_msg(img):
    shape, img = load_image(img)
    extract_char = ''
    msg = ''
    for i in range(len(img)):
        if len(extract_char)==8:
            if extract_char[0] == '1':
                break
            msg+=chr(int(extract_char,2))
            extract_char = ''
        extract_char+=bin(img[i])[-1]
    return msg
import sys
import pymysql   
from cryptography.fernet import Fernet     
if __name__=="__main__":
        img = sys.argv[1]
        addresi = img.split("/") 
        imgadd= addresi[4]+"/" + addresi[5]
         
        connection = pymysql.connect(host="localhost",user="root",passwd="Alper389938.",database="web-sec-project" )
        cursor = connection.cursor()
        retrive = "Select kymnt from imagetable where dirimage=%s;"
        cursor.execute(retrive, (imgadd))
        record = cursor.fetchall()
        
        ky = "" 
        for row in record:
            ky = row[0]
        
        #print("Secret Message: {}".format(decode_msg(img)))
        #print("")
        #print("\n Key olan",ky)
        msgnew = bytes(decode_msg(img), 'utf-8')
         
        fernet = Fernet(ky)
        
        decMessage = fernet.decrypt(msgnew).decode()
        print("DECRYPT MESSAGE : ", decMessage)
        

