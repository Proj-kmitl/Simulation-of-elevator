import pymysql

def connect():
    try:
        # Connect to the database
        connection = pymysql.connect(host='localhost',
                                     user='root',
                                     password='',
                                     db='project65',
                                     charset='utf8mb4',
                                     cursorclass=pymysql.cursors.DictCursor)
        return connection
    except pymysql.err.OperationalError as e:
        print("Error while connecting to MySQL:", e)
        return None
