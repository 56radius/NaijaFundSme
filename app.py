from flask import Flask, render_template, request, flash, url_for, redirect
from create_table import *
from _func_ import *
import json
import random
import string
import sqlite3


create_database()

def random_user_id():
    stri = []
    for i in range(0, 300):
        a = random.choice(string.ascii_letters)
        stri.append(a)
    new_string = ''.join(map(str, stri))

    a = random.choice(string.ascii_letters)
    b = random.choice(string.ascii_letters)
    c = random.choice(string.ascii_letters)
    d = random.choice(string.ascii_letters)
    e = random.choice(string.ascii_letters)
    f = random.choice(string.ascii_letters)

    user_id = a + b + c+ d +e + f
    return new_string

test = None
name = "wisom"

app = Flask(__name__)


app.secret_key = "RapManPenis"


@app.route("/")
def home():
    return render_template("index.html")



@app.route("/Get_started")
def get_started():
    return render_template("Get_started.html")

############## SIGN UP PART ################

@app.route("/sign_up", methods=["POST", "GET"])
def sign_up():
    conn = sqlite3.connect("naijafundsme.sql", timeout=11)
    wis = conn.cursor()
    if request.method == "POST":
        id = generate_table_id_for_ssme()
        user_id = random_user_id()
        full_name = request.form["full_name"]
        email = request.form['email']
        phone_number = request.form['phoneno']
        password = request.form['password']
        c_password = request.form['c_password']
        nin = request.form['nin']
        town = request.form['town']
        target_amount = request.form['target']
        balance = 0
        description = request.form['description']
        if password != c_password:
            r =f"<script>alert('erx: Password and Re-Type Password Field do not match  !!');</script>"
            return r
        else:
            #print(f'{full_name} {email} {phone_number} {password} {nin} {description} {town}')
            val = (id, full_name, phone_number, email, password, nin, user_id, town, target_amount, description, balance, )
            wis.execute("INSERT INTO sign_up_tables_ssme VALUES(?,?,?,?,?,?,?,?,?,?,?)", val)
            conn.commit()
            conn.commit()
            another_conn = sqlite3.connect("email_dert.sql")
            another_wis = another_conn.cursor()
            another_id = 1
            another_val = (email, another_id, )
            another_wis.execute("UPDATE email_dert SET email= ? WHERE id =?", another_val)
            another_conn.commit()
            return redirect(url_for("ssme_dashbaord", user_name=full_name, user_key_id=user_id))
            #return redirect(url_for("login_ssme"))
            #return f'<h1>Worked {description}</h1>'
    
    else:
        return render_template("Sign_up_2.html")

@app.route("/sign_up_investors", methods=["POST", "GET"])
def sign_up_investors():
    conn = sqlite3.connect("naijafundsme.sql", timeout=10)
    wis = conn.cursor()
    if request.method == "POST":
        id = generate_table_id_for_investors()
        full_name = request.form["fname"]
        password = request.form['password']
        c_password = request.form['cpassword']
        phone_number = request.form['phoneno']
        email = request.form['email']
        zip_code = request.form['zipcode']
        nin = request.form['nin']
        company_name = request.form['companyname']
        company_id = request.form['companyid']
        investor_user_id = random_user_id()
        balance = 0
        if password != c_password:
            r =f"<script>alert('erx: Password and Re-Type Password Field do not match  !!');</script>"
            return r
        else:
            #print(f'{full_name} {email} {phone_number} {password} {nin}')
            val = (id, full_name, password, phone_number, email, zip_code, nin, company_name, company_id, investor_user_id, balance)
            wis.execute("INSERT INTO sign_up_table_investors VALUES(?,?,?,?,?,?,?,?,?,?,?)", val)
            conn.commit()
            return redirect(url_for("investors_dashbaord", user_key_id=investor_user_id, alert=1))

    else:
        return render_template("Sign_up_2_investor.html")

##################### DASHBOARD PART #####################

@app.route("/ssme_dashbaord/<user_key_id>")##PrOBlem Hedcowpijsdfiohsgions
def ssme_dashbaord(user_key_id):
    conn = sqlite3.connect("naijafundsme.sql")
    wis = conn.cursor()
    wis.execute("SELECT full_name FROM sign_up_tables_ssme WHERE ssme_id=?", (user_key_id, ))
    ssme_username = wis.fetchone()

    wis.execute("SELECT balance FROM sign_up_tables_ssme WHERE ssme_id=?", (user_key_id, ))
    balance = wis.fetchone()

    wis.execute("SELECT target FROM sign_up_tables_ssme WHERE ssme_id=?", (user_key_id, ))
    target_amount = wis.fetchone()
    divi = balance[0] / target_amount[0]
    percentage = divi * 100
    return render_template("dashboard.html", display_ssme_user_name=ssme_username[0], ssme_user_id =user_key_id, display_balance=int(balance[0]), 
                                            display_percentage=int(percentage))


@app.route("/investors_dashboard/<user_key_id>/<alert>",  methods=["POST", "GET"])
def investors_dashbaord(user_key_id,alert):
    conn = sqlite3.connect("naijafundsme.sql")
    wis = conn.cursor()

    another_conn = sqlite3.connect("email_dert.sql")
    another_wis = another_conn.cursor()
    another_wis.execute("SELECT email FROM email_dert WHERE id =?", (1, ))
    result = str(another_wis.fetchall()[0][0])
    print(result)
    #ssme_email = "merit@gmail.com"
    ssme_email = result
    if request.method == "POST":
        amount_transfer = int(request.form['amount_fund'])
        wis.execute("SELECT balance FROM sign_up_table_investors WHERE investor_id=?", (user_key_id, ))
        investors_balance = int(wis.fetchone()[0])
        if investors_balance == 0:
            r =f"<script>alert('Insufficient Balance');</script>"
            return redirect(url_for("investors_dashbaord", user_key_id=user_key_id, alert=0))
        elif investors_balance < amount_transfer:
            s =f"<script>alert('Insufficient Balance');</script>"
            return redirect(url_for("investors_dashbaord", user_key_id=user_key_id, alert=0))
        else:
            wis.execute("UPDATE sign_up_tables_ssme SET balance = balance + ? WHERE email = ?", (amount_transfer, ssme_email, ))
            wis.execute("UPDATE sign_up_table_investors SET balance = balance - ? WHERE investor_id = ?", (amount_transfer, user_key_id, ))
            conn.commit()
            #print(int(amount_transfer))
            return redirect(url_for("investors_dashbaord", user_key_id=user_key_id, alert=2))
    else:
        wis.execute("SELECT full_name FROM sign_up_table_investors WHERE investor_id=?", (user_key_id, ))
        investor_name = wis.fetchone()
        wis.execute("SELECT company_name FROM sign_up_table_investors WHERE investor_id=?", (user_key_id, ))
        #print(wis.fetchone())
        company_name = wis.fetchone()
        wis.execute("SELECT balance FROM sign_up_table_investors WHERE investor_id=?", (user_key_id, ))
        balance = wis.fetchone()[0]
        the_string = investor_name[0]
        first_name_investor = the_string.split(" ")

        #THIS PART IS FOR THE ATIVE SSME PART [MERIT OLUMIUDE PART] 
        wis.execute("SELECT full_name FROM sign_up_tables_ssme WHERE email=?", (ssme_email, ))
        ssme_name = wis.fetchone()[0]
        wis.execute("SELECT description FROM sign_up_tables_ssme WHERE email=?", (ssme_email, ))
        ssme_description = wis.fetchone()[0]
        wis.execute("SELECT phone_number FROM sign_up_tables_ssme WHERE email=?", (ssme_email, ))
        ssme_phone_number = wis.fetchone()[0]
        wis.execute("SELECT town FROM sign_up_tables_ssme WHERE email=?", (ssme_email, ))
        ssme_town = wis.fetchone()[0]
        wis.execute("SELECT target FROM sign_up_tables_ssme WHERE email=?", (ssme_email, ))
        ssme_target = int(wis.fetchone()[0])
        wis.execute("SELECT balance FROM sign_up_tables_ssme WHERE email=?", (ssme_email, ))
        ssme_balance = int(wis.fetchone()[0])
        percentage = (ssme_balance/ssme_target) * 100
        format_ssme_target = format_number(ssme_target)
        format_ssme_balance = format_number(ssme_balance)
        #print(f'{ssme_name} {ssme_description} {ssme_phone_number} {ssme_town}')

        #LIST OF ACTIVE ACCOUNTS
        active_ssme_accounts = []
        wis.execute("SELECT * FROM sign_up_tables_ssme")
        result = wis.fetchall()
        for i in result:
            if i[0] == 7:
                pass
            else:
                #target: {str(1[8])}
                #balance: {str(i[10])}
                active_percentage = int((int(i[10]) / int(i[8])) * 100)
                active_format_target = format_number(i[8])
                active_format_balance = format_number(i[10])
                data1 = [i[1], str(i[2]), str(i[3]), i[7], i[8], i[9], i[10], i[6], active_percentage, active_format_target, active_format_balance]
                data = f'''
                Name: {i[1]}
                phone_num: {i[2]}
                email: {i[3]}
                town: {i[7]}
                description: {i[9]}

                '''
                active_ssme_accounts.append(data1)
                #print(data)
        #print(active_ssme_accounts)
        error = alert
        alert=1
        return render_template("investors_dashboard.html", display_investors_user_name=the_string, 
                                                        investors_id=user_key_id, display_company_id =company_name, display_balance=balance,
                                                        display_ssme_name=ssme_name, display_ssme_desc=ssme_description, 
                                        display_ssme_phone=str(ssme_phone_number), display_ssme_town=ssme_town,
                                        display_ssme_email=ssme_email, display_ssme_target=format_ssme_target, display_ssme_balance=format_ssme_balance,
                                            display_ssme_percentage =percentage, display_ssme_data=active_ssme_accounts, display_alert=int(error))


###############  LOGIN AS SSME PART ########################
@app.route("/login_ssme/<alert>", methods=["POST", "GET"])
def login_ssme(alert):
    conn = sqlite3.connect("naijafundsme.sql")
    wis = conn.cursor()
    if request.method == "POST":
        email = request.form['email']
        password = request.form['password']

        wis.execute("SELECT email FROM sign_up_tables_ssme WHERE email=?", (email, ))
        get_email = wis.fetchone()

        wis.execute("SELECT password FROM sign_up_tables_ssme WHERE password=?", (password, ))
        get_password = wis.fetchone()

        #print(f"{get_email}  {get_password}")
        if get_email == None or get_password == None:
            #FIX HERE NOW!!!!!!
            r =f"<script>alert('erx: Username or Password is incorrect !!');window.location='http://127.0.0.1:5000/login_ssme';</script>"
            return redirect(url_for("login_ssme", alert=0))
        else:
             wis.execute("SELECT ssme_id FROM sign_up_tables_ssme WHERE email=?", (email, ))
             ssme_id = wis.fetchone()
             return redirect(url_for("ssme_dashbaord", user_key_id=ssme_id[0]))
    else:
        return render_template("Login.html", display_alert=int(alert))


###############  LOGIN AS INVESTOR PART ########################
@app.route("/login_investor/<alert>", methods=["POST", "GET"])
def login_investor(alert):
    conn = sqlite3.connect("naijafundsme.sql")
    wis = conn.cursor()
    if request.method == "POST":
        email = request.form['email']
        password = request.form['password']

        wis.execute("SELECT email FROM sign_up_table_investors WHERE email=?", (email, ))
        get_email = wis.fetchone()

        wis.execute("SELECT password FROM sign_up_table_investors WHERE password=?", (password, ))
        get_password = wis.fetchone()

        #print(f"{get_email}  {get_password}")
        if get_email == None or get_password == None:
            r =f"<script>alert('erx: Username or Password is incorrect !!');window.location='http://127.0.0.1:5000/login_ssme';</script>"
            return redirect(url_for("login_investor", alert=0))
        else:
             wis.execute("SELECT investor_id FROM sign_up_table_investors WHERE email=?", (email, ))
             investor_id = wis.fetchone()
             return redirect(url_for("investors_dashbaord", user_key_id=investor_id[0], alert=1))
    else:
        return render_template("Login_investors.html", display_alert=int(alert))




#############  VIEWING SSME FROM INVETORS ################
@app.route("/view_ssme")
def view_ssme():
    return render_template("view_sme's.html")

################# PAYMENT SECTION ####################

@app.route("/payment/<ip>/<alert>", methods=["POST", "GET"])
def payment(ip, alert):
    conn = sqlite3.connect("naijafundsme.sql")
    wis = conn.cursor()
    if request.method == "POST":
        card_num = request.form['card_num']
        card_expire= request.form['expiration']
        cvc = request.form['cvc']
        card_user_name = request.form['card_user_name']
        phone_num = request.form['phoneno']
        amount = int(request.form['amount'])
        investors_id = request.form['investors_id']
        otp = generate_otp()
        tranaction_key = generate_transaction_key()

        validate_card = luhn_checksum(int(card_num))
        if validate_card == False:
            #print("invalid Card Number")
            return redirect(url_for("payment", ip=ip, alert=0))
        else:
            data = {
                "transaction key": tranaction_key,
                "card number": card_num,
                "cvc": cvc,
                "card name": card_user_name,
                "phone number": phone_num,
                "amount": amount,
                "otp": otp

            }
            json_respnse = json.dumps(data, indent=8)
            #print(json_respnse)

            #print(f'{card_num} {card_expire} {cvc} {card_user_name} {phone_num}')
            return redirect(url_for("otp_request", user_id=investors_id, phoneno=phone_num, otp=otp, amount=amount, data=data, alert=1))
    else:
        return render_template("payment.html", ip=ip, display_alert=int(alert))

@app.route("/otp_request/<user_id>/<phoneno>/<otp>/<amount>/<data>/<alert>", methods=["POST", "GET"])
def otp_request(user_id, phoneno, otp, amount,data,alert):
    conn = sqlite3.connect("naijafundsme.sql")
    wis = conn.cursor()
    if request.method == "POST":
        correct_otp = int(otp)
        user_enters_otp = int(request.form['otp_confirm'])
        if user_enters_otp == correct_otp:
            wis.execute("SELECT balance FROM sign_up_table_investors WHERE investor_id=?", (user_id, ))
            balance = int(wis.fetchone()[0])
            pecen = (5 / 100) * float(amount)
            new_amount =  float(amount) - pecen
            new_balance = balance + int(new_amount)
            wis.execute("UPDATE sign_up_table_investors SET balance = ? WHERE investor_id = ?", (new_balance, user_id, ))
            conn.commit()
            #print(f'{user_enters_otp} {balance}')
            return redirect(url_for("investors_dashbaord", user_key_id=user_id, alert=1))
        else:
            return redirect(url_for("otp_request", user_id=user_id, phoneno=phoneno, otp=otp, amount=amount, data=data, alert=0))
    else:
        #print(otp)
        return render_template("OTP-PART.html", display_phone_no=int(phoneno), display_otp=otp, display_data=str(data), display_alert=int(alert))


@app.route("/test/<usr>/<key>")
def test(usr, key):
    return f'<h1>{usr}, and sign up key is {key}</h1>'





#wis.execute("UPDATE wallet SET balance = balance + ? WHERE pass_phrase = ?", (enter_income, enter_pass, ))