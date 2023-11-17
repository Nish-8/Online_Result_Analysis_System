from tkinter import *
import tkinter as tk
import webbrowser
from tkinter import ttk
from tkinter import messagebox
from tkinter.ttk import Style
import psycopg2
import psycopg2.extras
import re

import AdminGrievance
import AdminMarks
import LoginPage

hostnamedb = "localhost"
databasedb = "ResultAnalysis"
usernamedb = "postgres"
pwddb = "5302"
port_iddb = 5432


class AdminHome(tk.Tk):
    def __init__(self, firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad):
        super().__init__()
        self.firstname = firstnamedb_ad
        self.lastname = lastnamedb_ad
        self.phno = phonenodb_ad
        self.email = emaildb_ad

        self.title("Welcome to Admin Home Page")
        self.geometry("1920x1080+0+0")
        self.config(background="#2e363b")
        # logo

        self.logo = tk.PhotoImage(file="logo.png")
        self.logo_Label = ttk.Label(self, image=self.logo).place(x=0, y=0)

        self.head_Label = ttk.Label(self, text="ADMIN HOME PAGE", font=("Helvetica", 35, "bold"), foreground="#eebd3e",
                                    background="#2e363b")
        self.head_Label.place(x=600, y=10)
        # style for buttons

        self.style0 = Style(self)
        self.style0.configure("U.TButton", font=("Helvetica", 15), foreground="red", background="grey")

        self.style2 = Style(self)
        self.style2.configure("M.TButton", font=("Helvetica", 15), foreground="red", background="grey")

        self.style3 = Style(self)
        self.style3.configure("T.TButton", font=("Helvetica", 15), foreground="red", background="grey")

        self.style4 = Style(self)
        self.style4.configure("E.REntry", font=("Helvetica", 20))

        # labels

        self.name_Label = ttk.Label(self, text="Name:   " + firstnamedb_ad + " " + lastnamedb_ad,
                                    font=("Helvetica", 25),
                                    background="#2e363b", foreground="#fbe18d")
        self.name_Label.grid(row=0, column=0, pady=(250, 0), sticky=tk.W, padx=(20, 0))

        self.email_Label = ttk.Label(self, text="Email Id:   " + emaildb_ad, font=("Helvitica", 25),
                                     background="#2e363b", foreground="#fbe18d")
        self.email_Label.grid(row=1, column=0, pady=(20, 0), sticky=tk.W, padx=(20, 0))

        self.phno_Label = ttk.Label(self, text="Phone No.:   " + phonenodb_ad, font=("Helvetica", 25),
                                    background="#2e363b", foreground="#fbe18d")
        self.phno_Label.grid(row=2, column=0, pady=(20, 0), sticky=tk.W, padx=(20, 0))

        self.gre_Label = ttk.Label(self, text="ADD EXAM", font=("Helvetica", 20, "underline"), background="#2e363b",
                                   foreground="#f89b1e")
        self.gre_Label.place(x=1150, y=125)

        self.exam_Label = ttk.Label(self, text="Exam Name :-", font=("Helvetica", 20), background="#2e363b",
                                    foreground="#fbe18d")
        self.exam_Label.place(x=950, y=200)

        self.examId_Label = ttk.Label(self, text="Exam Id :-", font=("Helvetica", 20), background="#2e363b",
                                      foreground="#fbe18d")
        self.examId_Label.place(x=950, y=250)

        self.examMarks_Label = ttk.Label(self, text="Exams Marks :-", font=("Helvetica", 20), background="#2e363b",
                                         foreground="#fbe18d")
        self.examMarks_Label.place(x=950, y=300)

        self.sem_Label = ttk.Label(self, text="Semester :-", font=("Helvetica", 20), background="#2e363b",
                                   foreground="#fbe18d")
        self.sem_Label.place(x=950, y=350)

        self.subject_Label = ttk.Label(self, text="Branch :- ", font=("Helvetica", 20), background="#2e363b",
                                       foreground="#fbe18d")
        self.subject_Label.place(x=950, y=400)

        # Entry
        self.examname = tk.StringVar()
        self.exam_Entry = tk.Entry(self, width=20, font=("Helvetica", 20), textvariable=self.examname)
        self.exam_Entry.place(x=1160, y=200)

        self.examid = tk.StringVar()
        self.examId_Entry = tk.Entry(self, width=20, font=("Helvetica", 20), textvariable=self.examid)
        self.examId_Entry.place(x=1160, y=250)

        self.exammarks = tk.StringVar()
        self.examMarks_Entry = tk.Entry(self, width=20, font=("Helvetica", 20), textvariable=self.exammarks)
        self.examMarks_Entry.place(x=1160, y=300)

        # self.sem_Entry = ttk.Entry(self, width=30)
        # self.sem_Entry.place(x=1160, y=360)
        self.menu = tk.StringVar()
        self.menu.set("SELECT SEMESTER")
        semester = ["Semester I", "Semester II", "Semester III", "Semester IV"]
        self.sem_Option = tk.OptionMenu(self, self.menu, *semester)
        self.abc = self.sem_Option.nametowidget(self.sem_Option.menuname)
        self.abc.config(font=("Helvetica", 15))
        self.sem_Option.place(x=1160, y=355)
        self.sem_Option.config(height=1, width=24, font=15)
        # self.subject_Entry = ttk.Entry(self, width=30)
        # self.subject_Entry.place(x=1160, y=410)
        self.menu1 = tk.StringVar()
        self.menu1.set("SELECT BRANCH")
        branch = ["Information Technology"]
        self.branch_Option = tk.OptionMenu(self, self.menu1, *branch)
        self.abc = self.sem_Option.nametowidget(self.branch_Option.menuname)
        self.abc.config(font=("Helvetica", 15))
        self.branch_Option.config(height=1, width=24, font=15)
        self.branch_Option.place(x=1160, y=410)

        # Button

        self.update_button = ttk.Button(self, text="UPDATE", style="U.TButton", )
        self.update_button.place(x=100, y=700)

        self.marks_button = ttk.Button(self, text="NEW MARKS", style="M.TButton")
        self.marks_button.place(x=250, y=700)

        self.grie_page_Button = ttk.Button(self, text="GO TO GRIEVANCE PAGE", style="T.TButton")
        self.grie_page_Button.place(x=400, y=700)

        self.newExam_Button = ttk.Button(self, text=" ADD NEW EXAM", style="T.TButton")
        self.newExam_Button.place(x=950, y=700)

        self.reset_Button = ttk.Button(self, text="RESET", style="T.TButton")
        self.reset_Button.place(x=1150, y=700)

        self.logout_Button = tk.Button(self, text="LOGOUT", background="black", foreground="red",
                                       font=("Helvetica", 15))
        self.logout_Button.place(x=1600, y=0)

        # Frames
        self.frame3 = tk.Frame(self, bg="#F0F0EB", bd=4, relief=SUNKEN, height=750, width=3, background="#f89b1e")
        self.frame3.place(x=800, y=150)

        # commands
        self.reset_Button.config(command=lambda: resetexam(self))
        self.grie_page_Button.config(command=lambda: gotogreviencepage(self,firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad))
        self.update_button.config(
            command=lambda: gotoupdate(self, firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad))
        self.marks_button.config(command=lambda: gotoupdate(self, self.firstname, self.lastname, self.phno, self.email))
        self.logout_Button.config(command=lambda: logout(self))
        self.newExam_Button.config(
            command=lambda: newexam(self, self.exam_Entry.get(), self.examId_Entry.get(), self.examMarks_Entry.get(),
                                    self.menu.get(), self.menu1.get()))


def resetexam(self):
    self.exam_Entry.delete(0, tk.END)
    self.examId_Entry.delete(0, tk.END)
    self.examMarks_Entry.delete(0, tk.END)
    self.menu.set("SELECT SEMESTER")
    self.menu1.set("SELECT BRANCH")


def gotogreviencepage(self,firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad):
    self.destroy()
    obj = AdminGrievance.AdminGrievance(firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad)


def gotoupdate(self, firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad):
    self.destroy()
    obj = AdminMarks.AdminMarksUpdation(firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad)


def logout(self):
    self.destroy()
    obj = LoginPage.Login()


def newexam(self, examname, examid, exammarks, examsemester, ebranch):
    if len(str(examname)) == 0 or len(str(examid)) == 0 or str(examsemester) == "SELECT SEMESTER" or str(
            ebranch) == "SELECT BRANCH":
        messagebox.showinfo(title="Error", message="Please fill all required fields")
    elif not (exammarks.isdigit()):
        messagebox.showinfo(title="Error", message="Marks Should be numeric")
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
            cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            selectscript = """select examid from exam"""
            cur.execute(selectscript)
            for record in cur.fetchall():
                if record['examid'] == examid:
                    count += 1
            if count == 1:
                messagebox.showinfo(title="Error", message="Exam already exists")
            else:
                newexamscript = """insert into exam values (%s,%s,%s,%s,%s)"""
                newexamvalues = (str(examid), str(examname), str(exammarks), str(examsemester), str(ebranch))
                cur.execute(newexamscript, newexamvalues)
                messagebox.showinfo(title="New Exam", message="New Exam Created Successfully")
            conn.commit()

        except Exception as error:
            print(error)
        finally:
            if cur is not None:
                cur.close()
            if conn is not None:
                conn.close()


if __name__ == "__main__":
    adm = AdminHome("abc", "aaa", "aaa", "aaa")
    adm.mainloop()

    # self.style = Style(self)
    # self.style.configure("A.TButton", font=("Helvetica", 15), foreground="red",
    #                      background="pink")
