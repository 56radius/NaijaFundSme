import sqlite3
import random

def generate_table_id_for_ssme():
    conn = sqlite3.connect("naijafundsme.sql")
    wis = conn.cursor()
    wis.execute("SELECT * FROM sign_up_tables_ssme")
    count_id = len(wis.fetchall())
    op_id = count_id + 1
    return op_id

def generate_table_id_for_investors():
    conn = sqlite3.connect("naijafundsme.sql")
    wis = conn.cursor()
    wis.execute("SELECT * FROM sign_up_table_investors")
    count_id = len(wis.fetchall())
    op_id = count_id + 1
    return op_id


def generate_transaction_key():
    hash = random.getrandbits(128)

    return "%032x" % hash

def generate_otp():
    som = []

    for i in range(0, 6):
        random_num = random.randrange(0, 9)
        som.append(random_num)

    otp = ''.join(map(str, som))

    int_otp = int(otp)
    return int_otp

def format_number(number):
    val = "{:,}".format(number)
    return val



def luhn_checksum(card_number):
    def digits_of(n):
        return [int(d) for d in str(n)]
    digits = digits_of(card_number)
    odd_digits = digits[-1::-2]
    even_digits = digits[-2::-2]
    checksum = 0
    checksum += sum(odd_digits)
    for d in even_digits:
        checksum += sum(digits_of(d*2))
    
    if checksum % 10 == 0:
        return True
    else:return False