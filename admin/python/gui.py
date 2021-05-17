import tkinter as tk
from tkinter import *
import mysql.connector

mydb = mysql.connector.connect(host="localhost", user="mjdr3247_admin", passwd="semogacepatlulus2021", database="mjdr3247_adminpanel", auth_plugin="mysql_native_password")
cursor = mydb.cursor()

def addcustomer():
    cname = ent.get()
    age = ent2.get()
    email = ent3.get()
    sql = "INSERT INTO customer VALUES(%s, %s, %s)"
    cursor.execute(sql, (cname, age, email))
    mydb.commit()
    print("Customer Added")
    return True

win = Tk()

frm1=Frame(win)
frm1.pack(side=tk.LEFT, padx=20)

var1 = StringVar()
cname = StringVar()
var2 = StringVar()
age = StringVar()
var3 = StringVar()
email = StringVar()

 

    
"localhost","mjdr3247_admin","semogacepatlulus2021","mjdr3247_adminpanel"