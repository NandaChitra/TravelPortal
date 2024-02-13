import anvil.server
import mysql.connector as mysql

def CallAnvil():
    anvil.server.connect('6LJAAZRZP4Y6UBMN5PMMHLW3-PUKW36C37UBYQQW4')
    anvil.server.wait_forever()

@anvil.server.callable
def GetCartData(cartid):
    try:
        db_connect = mysql.connect(host="localhost",database="NandaAcademies",user="root", passwd="admin", use_pure=True)
        mycursor = db_connect.cursor()
        cartid = str(cartid)
        sql = "Select Cartid, Prodname, Price From Cart Where Cartid = " + "'"+cartid+"'"
        mycursor.execute(sql)
        cartdata = mycursor.fetchall()
        return [{'Cartid':item[0],'Prodname':item[1],'Price':item[2]}
            for item in cartdata
        ]
    except Exception as Err:
        print(Err)
        return Err

CallAnvil()    