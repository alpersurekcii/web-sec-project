#! C:\Users\Dell\AppData\Local\Programs\Python\Python37-32\python.exe

from cryptography.fernet import Fernet
import sys
import random
import pymysql
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
        binary_msg += (format(ord(i), '08b'))
    binary_msg += '1'
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
        if len(extract_char) == 8:
            if extract_char[0] == '1':
                break
            msg += chr(int(extract_char, 2))
            extract_char = ''
        extract_char += bin(img[i])[-1]
    return msg


if __name__ == "__main__":
    recev = sys.argv[1]
    sender = sys.argv[2]
    x = random.randint(1000000, 1800000)
    y = str(x)
    i = str(random.randint(1, 21))

    # database connection
    # print(x)
    connection = pymysql.connect(
        host="localhost", user="root", passwd="Alper389938.", database="web-sec-project")
    cursor = connection.cursor()

    retrive = "Select * from messagetable;"

    # executing the quires
    cursor.execute(retrive)
    rows = cursor.fetchall()
    t = 0
    for row in rows:
        t += 1

    arow = list(rows[t-1])

    key = Fernet.generate_key()
    fernet = Fernet(key)
    dir2 = "images/"+y+".png"
    retrive2 = "Insert Into imagetable(email, dirimage, sender, kymnt) values (%s, %s, %s, %s) "
    val = (recev, dir2, sender, key)
    cursor.execute(retrive2, val)
    connection.commit()
    connection.close()

    #snd = arow[2].split("@")

    newintp = "C:/xampp/htdocs/web-sec-project/images/"+y+".png"
    img = "C:/xampp/htdocs/web-sec-project/enimages/"+i+".png"
    message = arow[1]

    encMessage = fernet.encrypt(message.encode())

    # input1 = "C:/xampp/htdocs/web-sec-project/images/"+arow[0]+""+snd[0]+".png
    message1 = str(encMessage)
    x1 = message1.split("'")

    img = encode_msg(x1[1], img)
    img.save(newintp)
