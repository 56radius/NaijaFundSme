import sqlite3




def create_database():
    conn = sqlite3.connect("naijafundsme.sql")
    wis = conn.cursor()

    wis.execute("CREATE TABLE IF NOT EXISTS sign_up_tables_ssme(id INTEGER PRIMARY KEY, full_name text, phone_number INTEGER, email text UNIQUE, password text, national_id_card_number INTEGER UNIQUE, ssme_id text UNIQUE, town text, target INTEGER, description text, balance INTEGER default 0)")

    wis.execute("CREATE TABLE IF NOT EXISTS sign_up_table_investors(id INTEGER PRIMARY KEY, full_name text, password text, phone_number INTEGER, email text UNIQUE, zip_code text, national_id_card_number INTEGER UNIQUE, company_name text, company_id text, investor_id text, balance INTEGER default 0)")

    another_conn = sqlite3.connect("email_dert.sql")
    another_wis = another_conn.cursor()

    another_wis.execute("CREATE TABLE IF NOT EXISTS email_dert(id INTEGER, email text)")