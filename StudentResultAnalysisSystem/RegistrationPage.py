import tkinter as tk
from tkinter import ttk
from tkinter import *
from tkinter import messagebox
from tkinter.ttk import Style

import psycopg2
import pyisemail

import LoginPage

hostnamedb = "localhost"
databasedb = "ResultAnalysis"
usernamedb = "postgres"
pwddb = "5302"
port_iddb = 5432


class Registration(tk.Tk):
    def __init__(self):
        super().__init__()

        var1 = StringVar()
        var2 = StringVar()
        var3 = StringVar()
        var4 = StringVar()
        var5 = StringVar()
        var6 = StringVar()

        var7 = StringVar()
        var8 = StringVar()
        var9 = StringVar()
        var10 = StringVar()
        var11 = StringVar()
        var12 = StringVar()

        # creating labels and entries
        self.style = Style(self)
        self.style.configure("E.TButton", font=("Helvetica", 10), foreground="red",
                             background="#b02a2a", bg="#b02a2a")
        self.style1 = Style(self)
        self.style1.configure("R.TButton", font=("Helvetica", 15, "underline"), foreground="blue",
                              background="#3789bd", bg="#b02a2a")

        logo = tk.PhotoImage(file="logo.png")
        self.title("Registration Form")
        self.config(background="#2e363b")
        self.geometry("2560x1440+0+0")
        self.logo_label = ttk.Label(self, image=logo)
        self.curricualrs_label = ttk.Label(self, text="Extra Curriculars",
                                           font=("Helvetica", 15), background="#2e363b", foreground="#fbe18d")

        self.head_label = ttk.Label(self, text="Welcome to result analysis portal",
                                    font=("Helvetica", 30, "bold"), foreground="#eebd3e", background="#2e363b")

        self.name_label = ttk.Label(self, text="Name*", font=("Helvetica", 20), background="#2e363b",
                                    foreground="#fbe18d")
        self.firstName_entry = ttk.Entry(self, font=("Helvetica", 13))
        self.lastName_entry = ttk.Entry(self, font=("Helvetica", 13))
        self.email_label = ttk.Label(self, text="Email*", font=("Helvetica", 20), background="#2e363b",
                                     foreground="#fbe18d")
        self.email_entry = ttk.Entry(self, font=("Helvetica", 13))
        self.phNo_label = ttk.Label(self, text="Phone No*", font=("Helvetica", 20), background="#2e363b",
                                    foreground="#fbe18d")
        self.phNo_entry = ttk.Entry(self, font=("Helvetica", 13))
        self.admNo_label = ttk.Label(self, text="Admission No*", font=("Helvetica", 20), background="#2e363b",
                                     foreground="#fbe18d")
        self.admNo_entry = ttk.Entry(self, font=("Helvetica", 13))
        self.dep_label = ttk.Label(self, text="Department*", font=("Helvetica", 20), background="#2e363b",
                                   foreground="#fbe18d")
        self.dep_entry = ttk.Entry(self, font=("Helvetica", 13))
        self.currY_label = ttk.Label(self, text="Current Year*", font=("Helvetica", 20), background="#2e363b",
                                     foreground="#fbe18d")
        self.currY_entry = ttk.Entry(self, font=("Helvetica", 13))
        self.dob_label = ttk.Label(self, text="Date Of Birth*", font=("Helvetica", 20), background="#2e363b",
                                   foreground="#fbe18d")
        self.dob_entry = ttk.Entry(self, font=("Helvetica", 13))
        self.address_label = ttk.Label(self, text="Address*", font=("Helvetica", 20), background="#2e363b",
                                       foreground="#fbe18d")
        self.address_entry = ttk.Entry(self, font=("Helvetica", 13))
        self.gaurdPhNo_Label = ttk.Label(self, text="Gaurdian Phone No*", font=("Helvetica", 20), background="#2e363b",
                                         foreground="#fbe18d")
        self.gaurdPhNo_entry = ttk.Entry(self, font=("Helvetica", 13))
        self.bloodG_label = ttk.Label(self, text="Blood Group*", font=("Helvetica", 20), background="#2e363b",
                                      foreground="#fbe18d")
        self.bloodG_entry = ttk.Entry(self, font=("Helvetica", 13))
        self.semester_Label = ttk.Label(self, text="Semester*", font=("Helvetica", 20), background="#2e363b",
                                        foreground="#fbe18d")
        self.semester_Entry = ttk.Entry(self, font=("Helvetica", 13))
        self.password_Label = ttk.Label(self, text="Password*", font=("Helvetica", 20), background="#2e363b",
                                        foreground="#fbe18d")
        self.password_entry = ttk.Entry(self, font=("Helvetica", 13))

        # labels and entries for curricular section along with message label to appear on not filling details

        self.sports_label = ttk.Label(self, text="Sports", font=("Helvetica", 12), background="#2e363b",
                                      foreground="#fbe18d")
        self.skills_label = ttk.Label(self, text="Skills/Interest", font=("Helvetica", 12), background="#2e363b",
                                      foreground="#fbe18d")
        self.others1_label = ttk.Label(self, text="Others*", font=("Helvetica", 10), background="#2e363b",
                                       foreground="#fbe18d")
        self.others1_entry = ttk.Entry(self)
        self.others2_label = ttk.Label(self, text="Others*", font=("Helvetica", 10), background="#2e363b",
                                       foreground="#fbe18d")
        self.others2_entry = ttk.Entry(self)

        # creating function for dialogue boxes to appear on screen

        self.registration_button = ttk.Button(self, command=click, text="Register", style="R.TButton", width=25)
        self.back_button = ttk.Button(self, command=back_button, text="Back", style="E.TButton")
        self.reset_button = ttk.Button(self, command=reset, text="Reset", style="E.TButton")

        # check boxes department (1-6) along with its placement in window

        self.check_box1 = tk.Checkbutton(self, text="Cricket", variable=var1, background="#2e363b",
                                         foreground="#fbe18d")
        self.check_box1.place(x=1200, y=265)
        self.check_box2 = tk.Checkbutton(self, text="Football", variable=var2, background="#2e363b",
                                         foreground="#fbe18d")
        self.check_box2.place(x=1300, y=265)
        self.check_box3 = tk.Checkbutton(self, text="Badminton", variable=var3, background="#2e363b",
                                         foreground="#fbe18d")
        self.check_box3.place(x=1200, y=285)
        self.check_box4 = tk.Checkbutton(self, text="Volleyball", variable=var4, background="#2e363b",
                                         foreground="#fbe18d")
        self.check_box4.place(x=1300, y=285)
        self.check_box5 = tk.Checkbutton(self, text="Table Tennis", variable=var5, background="#2e363b",
                                         foreground="#fbe18d")
        self.check_box5.place(x=1200, y=305)
        self.check_box6 = tk.Checkbutton(self, text="Basket Ball", variable=var6, background="#2e363b",
                                         foreground="#fbe18d")
        self.check_box6.place(x=1300, y=305)

        # check boxes department (6-12) along with its placement in window

        self.check_box7 = tk.Checkbutton(self, text="Dance", variable=var7, background="#2e363b", foreground="#fbe18d")
        self.check_box7.place(x=1200, y=440)
        self.check_box8 = tk.Checkbutton(self, text="Music", variable=var8, background="#2e363b", foreground="#fbe18d")
        self.check_box8.place(x=1300, y=440)
        self.check_box9 = tk.Checkbutton(self, text="Singing", variable=var9, background="#2e363b",
                                         foreground="#fbe18d")
        self.check_box9.place(x=1200, y=460)
        self.check_box10 = tk.Checkbutton(self, text="Treking", variable=var10, background="#2e363b",
                                          foreground="#fbe18d")
        self.check_box10.place(x=1300, y=460)
        self.check_box11 = tk.Checkbutton(self, text="Travelling", variable=var11, background="#2e363b",
                                          foreground="#fbe18d")
        self.check_box11.place(x=1200, y=480)
        self.check_box12 = tk.Checkbutton(self, text="Public Speaking", variable=var12, background="#2e363b",
                                          foreground="#fbe18d")
        self.check_box12.place(x=1300, y=480)

        # Placing labels and entries (Left side elements)

        self.head_label.place(x=550, y=10)
        self.name_label.grid(row=0, column=0, pady=(190, 0), sticky=tk.W, padx=(10, 0))

        self.firstName_entry.grid(row=0, column=1, pady=(190, 0), padx=(20, 0))
        self.lastName_entry.grid(row=0, column=2, pady=(190, 0), padx=(20, 0))

        self.email_label.grid(row=1, column=0, pady=(15, 0), sticky=tk.W, padx=(10, 0))
        self.email_entry.grid(row=1, column=1, padx=(20, 0), pady=(15, 0))

        self.phNo_label.grid(row=2, column=0, pady=(15, 0), sticky=tk.W, padx=(10, 0))
        self.phNo_entry.grid(row=2, column=1, padx=(20, 0), pady=(15, 0))

        self.admNo_label.grid(row=3, column=0, pady=(15, 0), sticky=tk.W, padx=(10, 0))
        self.admNo_entry.grid(row=3, column=1, padx=(20, 0), pady=(15, 0))

        self.dep_label.grid(row=4, column=0, pady=(15, 0), sticky=tk.W, padx=(10, 0))
        self.dep_entry.grid(row=4, column=1, padx=(20, 0), pady=(15, 0))

        self.currY_label.grid(row=5, column=0, pady=(15, 0), sticky=tk.W, padx=(10, 0))
        self.currY_entry.grid(row=5, column=1, padx=(20, 0), pady=(15, 0))

        self.dob_label.grid(row=6, column=0, pady=(15, 0), sticky=tk.W, padx=(10, 0))
        self.dob_entry.grid(row=6, column=1, padx=(20, 0), pady=(15, 0))

        self.address_label.grid(row=7, column=0, pady=(15, 0), sticky=tk.W, padx=(10, 0))
        self.address_entry.grid(row=7, column=1, padx=(20, 0), pady=(15, 0))

        self.gaurdPhNo_Label.grid(row=8, column=0, pady=(15, 0), sticky=tk.W, padx=(10, 0))
        self.gaurdPhNo_entry.grid(row=8, column=1, padx=(20, 0), pady=(15, 0))

        self.bloodG_label.grid(row=9, column=0, pady=(15, 0), sticky=tk.W, padx=(10, 0))
        self.bloodG_entry.grid(row=9, column=1, padx=(20, 0), pady=(15, 0))

        self.semester_Label.grid(row=10, column=0, pady=(15, 0), sticky=tk.W, padx=(10, 0))
        self.semester_Entry.grid(row=10, column=1, padx=(20, 0), pady=(15, 0))

        self.password_Label.grid(row=11, column=0, pady=(15, 0), sticky=tk.W, padx=(10, 0))
        self.password_entry.grid(row=11, column=1, padx=(20, 0), pady=(15, 0))

        self.logo_label.image = logo
        self.logo_label.place(x=0, y=0)

        # Frame

        self.frame3 = tk.Frame(self, bg="#f89b1e", bd=4, relief=SUNKEN, height=750, width=3)
        self.frame3.place(x=950, y=185)

        # placing curricular labels and entries along with buttons

        self.curricualrs_label.place(x=1200, y=185)
        self.sports_label.place(x=1200, y=235)
        self.others1_label.place(x=1200, y=335)
        self.others1_entry.place(x=1260, y=337, )
        self.others2_label.place(x=1200, y=510)
        self.others2_entry.place(x=1260, y=512, )
        self.skills_label.place(x=1200, y=400)
        self.registration_button.place(x=1050, y=750, height=30, width=80)
        self.back_button.place(x=1150, y=750, height=30, width=80)
        self.reset_button.place(x=1250, y=750, height=30, width=80)

        # Commands

        self.registration_button.config(command=lambda: click(self))
        self.reset_button.config(command=lambda: reset(self))
        self.back_button.config(command=lambda: back_button(self))
        self.registration_button.config(
            command=lambda: register1(self, self.firstName_entry.get(), self.lastName_entry.get(),
                                      self.email_entry.get(), self.phNo_entry.get(), self.admNo_entry.get(),
                                      self.dep_entry.get(), self.currY_entry.get(), self.dob_entry.get(),
                                      self.address_entry.get(), self.gaurdPhNo_entry.get(), self.bloodG_entry.get(),
                                      self.semester_Entry.get(), self.password_entry.get()))


def register1(self, firstname, lastname, email1, phno, admno, dep, currentyear, dob, address, gphno, bloodg, semester,
              password1):
    if firstname == "" or lastname == "" or email1 == "" or phno == "" or admno == "" or dep == "" or currentyear == "" or dob == "" or address == "" or gphno == "" or bloodg == "" or semester == "" or password1 == "":
        messagebox.showerror(title="Error", message="Please fill all required fields")
    else:
        if not pyisemail.is_email(email1):
            messagebox.showerror(title="Error", message="Please fill a valid Email ID")

        elif not phno.isdigit():
            messagebox.showerror(title="Error", message="Please fill a valid Phone No")

        elif len(password1) < 5:
            messagebox.showerror(title="Error", message="The length of password should be greater than 5")

        else:
            conn = None
            cur = None
            count = 0
            try:
                conn = psycopg2.connect(
                    host=hostnamedb,
                    dbname=databasedb,
                    user=usernamedb,
                    password=pwddb,
                    port=port_iddb
                )
                cur = conn.cursor()
                registerscript = """insert into student values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"""
                registervalues = (
                email1, password1, firstname, lastname, phno, admno, dep, currentyear, dob, address,
                gphno, bloodg, semester)
                cur.execute(registerscript, registervalues)
                messagebox.showinfo(title="Registration", message="You have registered successfully")
                conn.commit()

            except Exception as error:
                print(error)
            finally:
                if cur is not None:
                    cur.close()
                if conn is not None:
                    conn.close()


def back(self):
    messagebox.showinfo(title="Redirect!!", message="Go to login page and login again")


def click(self):
    if messagebox.askyesno(title="Confirmation!!", message="Do you want to Register?", ):
        back()


def back_button(self):
    answer = messagebox.askyesno(title="exit", message="Are you sure you want to go back?")

    if answer:
        self.destroy()
        login = LoginPage.Login()


def reset(self):
    messagebox.showwarning(title="RESET!!!", message="Do you want to reset the progress?")
    self.firstName_entry.delete(0, END)
    self.lastName_entry.delete(0, END)
    self.email_entry.delete(0, END)
    self.phNo_entry.delete(0, END)
    self.admNo_entry.delete(0, END)
    self.dep_entry.delete(0, END)
    self.currY_entry.delete(0, END)
    self.dob_entry.delete(0, END)
    self.address_entry.delete(0, END)
    self.gaurdPhNo_entry.delete(0, END)
    self.bloodG_entry.delete(0, END)
    self.semester_Entry.delete(0, END)
    self.password_entry.delete(0, END)




if __name__ == "__main__":
    reg = Registration()
    reg.mainloop()
