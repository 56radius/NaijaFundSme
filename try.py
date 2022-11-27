import random
import sqlite3



conn = sqlite3.connect("naijafundsme.sql")
wis = conn.cursor()

wis.execute("SELECT * FROM sign_up_tables_ssme")

result = wis.fetchall()

for i in result:
    data = f'''
    Name: {i[1]}
    phone_num: {i[2]}
    email: {i[3]}
    description: {i[9]}
    balance: {i[10]}
    '''

    print(data)