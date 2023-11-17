import tkinter as tk
import webbrowser
from tkinter import ttk
from tkinter import messagebox
from tkinter.ttk import Style
from pyisemail import is_email
import psycopg2
import psycopg2.extras

from RegistrationPage import *
import StudentHome
import AdminHome

# database components
hostnamedb = "localhost"
databasedb = "ResultAnalysis"
usernamedb = "postgres"
pwddb = "5302"
port_iddb = 5432


class Login(tk.Tk):
    url = "www.pce.ac.in"

    def __init__(self, url="www.pce.ac.in"):
        super().__init__()
        # window_image=tk.PhotoImage(file="campus.jpg")
        self.x = tk.IntVar()
        self.title("Login Page")
        self.iconbitmap("logo.ico")
        self.config(background="#2e363b")
        self.geometry("2560x1440+0+0")

        logo = tk.PhotoImage(file="logo1.png")
        username = tk.PhotoImage(file="username.png")
        # login1=tk.PhotoImage(file="login.png")
        # admin = tk.PhotoImage(file="admin.jpg")
        self.style = Style(self)
        self.style.configure("E.TButton", font=("Times New Roman", 15, "underline"), foreground="red",
                             background="#b02a2a", bg="#b02a2a")
        self.style1 = Style(self)
        self.style1.configure("L.TButton", font=("Times New Roman", 15, "underline"), foreground="blue",
                              background="#3789bd")

        # Creation Of the widgets
        self.icon_label = ttk.Label(self, image=logo, border=1.5)

        self.welcome_label = ttk.Label(self, text="Welcome to PCE Result Analysis Portal",
                                       font=("Times New Roman", 38, "bold"), background="#2e363b", foreground="#eebd3e")

        self.website_label = ttk.Label(self, text="Website : www.pce.ac.in", font=("Times New Roman", 25, "bold"),
                                       background="#2e363b", foreground="#fbe18d", cursor="hand2")

        self.phno_label = ttk.Label(self, text="Phno: 022 – 2745 6030", font=("Times New Roman", 25, "bold"),
                                    background="#2e363b", foreground="#fbe18d")

        self.admin_rb = tk.Radiobutton(self, text="Admin", font=("Times New Roman", 15, "bold"), variable=self.x,
                                       value=1, background="#2e363b", foreground="#f89b1e")
        self.student_rb = tk.Radiobutton(self, text="Student", font=("Times New Roman", 15, "bold"), variable=self.x,
                                         value=2, background="#2e363b", foreground="#f89b1e")

        self.username_label = ttk.Label(self, text="Enter Username", font=("Times New Roman", 18), background="#2e363b",
                                        foreground="#fbe18d")
        self.username_entry = ttk.Entry(self, font=("Times New Roman", 18), width=25)
        self.password_label = ttk.Label(self, text="Enter Password", font=("Times New Roman", 18), background="#2e363b",
                                        foreground="#fbe18d")
        self.password_entry = ttk.Entry(self, show="*", font=("Times New Roman", 18), width=25)
        self.login_button = ttk.Button(self, text="Login", command=login1, width=15, style="L.TButton")
        self.exit_button = ttk.Button(self, text="Exit", width=15, style="E.TButton")

        self.registrationQuestion_label = ttk.Label(self, text="Not a user ?    SIGN UP", font=("Times New Roman", 18),
                                                    foreground="#f89b1e", background="#2e363b", cursor="hand2")

        self.icon_label.image = logo  # refrence holding of the image else the garbage collector will delete the image
        # Packing of the widgets
        self.icon_label.pack()
        self.welcome_label.pack(pady=(17, 0))
        self.website_label.pack(pady=10, anchor="nw")
        self.phno_label.place(x=1375, y=190)
        self.admin_rb.place(x=700, y=334)
        self.student_rb.place(x=915, y=334)

        self.username_label.pack(pady=(120, 0), padx=(0, 150))
        self.username_entry.pack(pady=(10, 10))
        self.password_label.pack(pady=(10, 0), padx=(0, 150))
        self.password_entry.pack(pady=(10, 10))
        self.login_button.pack(pady=(30, 0))
        self.exit_button.pack(pady=(15, 0))

        # Commands for buttons and labels are called here either config or bind method are used

        self.website_label.bind("<Button-1>", lambda e: open_url(self))
        self.login_button.config(
            command=lambda: login1(self, self.username_entry.get(), self.password_entry.get(), self.x.get()))

        self.admin_rb.config(command=lambda: selection(self, self.x))
        self.student_rb.config(command=lambda: selection(self, self.x))
        self.exit_button.config(command=lambda: exit1(self))


        # final styling
        style_img=tk.PhotoImage(file="loginpageimg1.png")
        self.styleimg1=tk.Label(self,image=style_img)

        self.styleimg1.image=style_img
        self.styleimg1.place(x=50,y=375)

        style_img2 = tk.PhotoImage(file="loginpageimg2.png")
        self.styleimg1 = tk.Label(self, image=style_img2)

        self.styleimg1.image = style_img2
        self.styleimg1.place(x=1350, y=375)


def open_url(self):
    webbrowser.open_new_tab(self.url)


def selection(self, x, ):
    if x.get() == 2:
        self.registrationQuestion_label.pack(pady=(15, 0))
        self.registrationQuestion_label.bind("<Button-1>", lambda e: gotoregistration(self))

    elif x.get() == 1:
        self.registrationQuestion_label.pack_forget()
    else:
        pass


def login1(self, username, password, x):
    conn = None
    cur = None
    if x == 2:
        passfromdb = None
        firstnamedb = None
        lastnamedb = None
        emaildb = None
        admissionnodb = None
        semesterdb = None
        try:
            conn = psycopg2.connect(
                host=hostnamedb,
                dbname=databasedb,
                user=usernamedb,
                password=pwddb,
                port=port_iddb
            )
            cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            login_script = '''select passwd,firstname,lastname,email,admissionno,semester from student where email=%s
            '''
            login_value = (username,)
            cur.execute(login_script, login_value)
            for record in cur.fetchall():
                passfromdb = record['passwd']
                firstnamedb = record['firstname']

                lastnamedb = record['lastname']

                emaildb = record['email']

                admissionnodb = record['admissionno']

                semesterdb = record['semester']

            if passfromdb == password:
                messagebox.showinfo(title="Login", message="Login Successfull")
                self.destroy()
                studenthome = StudentHome.StudentHome(firstnamedb, lastnamedb, emaildb, admissionnodb, semesterdb)
            else:
                messagebox.showerror(title="Login", message="Invalid Userid or Password \n Please try again")

        except Exception as error:
            print(error)
        finally:
            if cur is not None:
                cur.close()
            if conn is not None:
                conn.close()
    elif x == 1:
        passfromdb_ad = None
        firstnamedb_ad = None
        lastnamedb_ad = None
        emaildb_ad = None
        phonenodb_ad = None
        try:
            conn = psycopg2.connect(
                host=hostnamedb,
                dbname=databasedb,
                user=usernamedb,
                password=pwddb,
                port=port_iddb
            )
            cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            login_script1 = '''select email_ad,passwd_ad,firstname_ad,lastname_ad,phoneno_ad from admin1 
            where email_ad=%s'''
            login_value = (username,)
            cur.execute(login_script1, login_value)
            for record1 in cur.fetchall():
                passfromdb_ad = record1['passwd_ad']
                print(passfromdb_ad)
                emaildb_ad = record1['email_ad']
                print(emaildb_ad)
                firstnamedb_ad = record1['firstname_ad']
                print(firstnamedb_ad)
                lastnamedb_ad = record1['lastname_ad']
                print(firstnamedb_ad)
                phonenodb_ad = record1['phoneno_ad']
                print(phonenodb_ad)

            if passfromdb_ad == password:
                messagebox.showinfo(title="Login", message="Login Successfull")
                self.destroy()
                adminhome = AdminHome.AdminHome(firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad)
            else:
                messagebox.showerror(title="Login", message="Invalid Userid or Password \n Please try again")





        except Exception as error:
            print(error)

        finally:
            if cur is not None:
                cur.close()
            if conn is not None:
                conn.close()

    else:
        messagebox.showinfo(title="Login", message="Please select if you are student or admin")


def gotoregistration(self):
    self.destroy()
    register = Registration()


def exit1(self):
    answer = messagebox.askokcancel(title="Exit Message", message="Do You Want To Exit ?")

    if answer:
        self.destroy()
    else:
        return


if __name__ == "__main__":
    login = Login()
    login.mainloop()
