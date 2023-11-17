import tkinter as tk
from tkinter import ttk
from tkinter import *
from tkinter import messagebox
import psycopg2
import psycopg2.extras
import pyisemail

import StudentHome

hostnamedb = "localhost"
databasedb = "ResultAnalysis"
usernamedb = "postgres"
pwddb = "5302"
port_iddb = 5432
lcount = 0
count = 0


class Greivance(tk.Tk):
    def __init__(self, firstnamedb, lastnamedb, emaildb, admissionnodb, semesterdb):
        super().__init__()

        self.config(background="#2e363b")

        # logo should be changed
        logo = tk.PhotoImage(file="logo.png")
        self.logo_label = ttk.Label(self, image=logo)
        self.head_label = ttk.Label(self, text="Grievance Page", font=("Helvetica", 35, "bold"), background="#2e363b",
                                    foreground="#eebd3e")
        self.welcome_label = ttk.Label(self, text="Welcome Student :", font=("Helvetica", 20, "bold"),
                                       background="#2e363b",
                                       foreground="#eebd3e")
        self.namd_tbd_label = ttk.Label(self, text=firstnamedb + " " + lastnamedb, font=("Helvetica", 20, "bold"),
                                        background="#2e363b",
                                        foreground="#eebd3e")
        self.title("Grievance Page")
        self.geometry("1920x1080+0+0")
        # labels
        self.name_label = ttk.Label(self, text="Name*", font=("Helvetica", 15), background="#2e363b",
                                    foreground="#fbe18d")
        self.email_label = ttk.Label(self, text="Email Id*", font=("Helvetica", 15), background="#2e363b",
                                     foreground="#fbe18d")
        self.ph_label = ttk.Label(self, text="Phone No*", font=("Helvetica", 15), background="#2e363b",
                                  foreground="#fbe18d")
        self.admission_label = ttk.Label(self, text="Admission No*", font=("Helvetica", 15), background="#2e363b",
                                         foreground="#fbe18d")
        self.exam_label = ttk.Label(self, text="Exam No*", font=("Helvetica", 15), background="#2e363b",
                                    foreground="#fbe18d")
        self.subject_label = ttk.Label(self, text="Subject Name*", font=("Helvetica", 15), background="#2e363b",
                                       foreground="#fbe18d")
        self.marks_got_label = ttk.Label(self, text="Marks Scored*", font=("Helvetica", 15), background="#2e363b",
                                         foreground="#fbe18d")
        self.marks_expected_label = ttk.Label(self, text="Marks Expected*", font=("Helvetica", 15),
                                              background="#2e363b", foreground="#fbe18d")
        self.comments_label = ttk.Label(self, text="Comments*", font=("Helvetica", 15), background="#2e363b",
                                        foreground="#fbe18d")

        # Entries
        self.name_entry = ttk.Entry(self, background="Black", width=30)
        self.email_entry = ttk.Entry(self, width=30)
        self.phone_entry = ttk.Entry(self, width=30)
        self.admission_entry = ttk.Entry(self, width=30)
        self.exam_entry = ttk.Entry(self, width=30)
        self.subject_entry = ttk.Entry(self, width=30)
        self.marks_expected_entry = ttk.Entry(self, width=30)
        self.marks_got_entry = ttk.Entry(self, width=30)

        # TextField
        self.comments_textField = tk.Text(self, height=4, width=53, bd=2, relief=SUNKEN)

        # Buttons

        self.submit_button = tk.Button(self, text="Submit", background="#0AC886", foreground="#FFFFFF",
                                       font=("Helvetica", 10, "bold"))
        self.rest_button = tk.Button(self, text="Reset", background="#F60A6A", foreground="Black",
                                     font=("Helvetica", 10, "bold"))
        self.back_button = tk.Button(self, text="Back", background="#6495ED", foreground="White",
                                     font=("Helvetica", 10, "bold"))
        self.show_status = tk.Button(self, text="Status", background="#85929E", foreground="Black",
                                     font=("Helvetica", 10, "bold"))
        # Frames

        # self.frame1 = tk.Frame(self, bg="#F0F0EB", bd=2, relief=SUNKEN, height=200, width=400)
        # self.frame1.place(x=1000, y=100)
        #
        # self.frame2 = tk.Frame(self, bg="#F0F0EB", bd=2, relief=SUNKEN, height=200, width=400)
        # self.frame2.place(x=1000, y=350)

        self.treeviewframe = tk.Frame(self, bg="light blue", bd=4, relief=SUNKEN, height=450, width=800,
                                      background="#fbe18d")
        self.treeviewframe.place(x=550, y=100)

        self.frame3 = tk.Frame(self, bg="#F0F0EB", bd=4, relief=SUNKEN, height=800, width=3)
        self.frame3.place(x=525, y=100)

        self.logo_label.image = logo
        self.logo_label.place(x=0, y=0)
        self.welcome_label.place(x=160, y=60)
        self.namd_tbd_label.place(x=410, y=60)
        self.comments_label.grid(row=8, column=0, sticky=tk.W, pady=(30, 0), padx=(170, 0))
        self.comments_textField.place(x=40, y=585)

        self.head_label.place(x=650, y=5)

        self.submit_button.place(x=1020, y=850, height=30, width=60)
        self.back_button.place(x=1090, y=850, height=30, width=60)
        self.rest_button.place(x=1160, y=850, height=30, width=60)
        self.show_status.place(x=1230, y=850, height=30, width=60)

        self.name_label.grid(row=0, column=0, pady=(180, 0), sticky=tk.W, padx=(50, 0))
        self.name_entry.grid(row=1, column=0, padx=(10, 0), pady=(20, 0))

        self.email_label.grid(row=0, column=1, pady=(180, 0), sticky=tk.W, padx=(10, 0))
        self.email_entry.grid(row=1, column=1, padx=(10, 0), pady=(20, 0))

        self.ph_label.grid(row=2, column=0, pady=(20, 0), sticky=tk.W, padx=(50, 0))
        self.phone_entry.grid(row=3, column=0, padx=(10, 0), pady=(20, 0))

        self.admission_label.grid(row=2, column=1, pady=(20, 0), sticky=tk.W, padx=(10, 0))
        self.admission_entry.grid(row=3, column=1, padx=(10, 0), pady=(20, 0))

        self.exam_label.grid(row=4, column=0, pady=(20, 0), sticky=tk.W, padx=(50, 0))
        self.exam_entry.grid(row=5, column=0, padx=(10, 0), pady=(20, 0))

        self.subject_label.grid(row=4, column=1, pady=(20, 0), sticky=tk.W, padx=(10, 0))
        self.subject_entry.grid(row=5, column=1, padx=(10, 0), pady=(20, 0))

        self.marks_got_label.grid(row=6, column=0, pady=(20, 0), sticky=tk.W, padx=(50, 0))
        self.marks_got_entry.grid(row=7, column=0, padx=(10, 0), pady=(20, 0))

        self.marks_expected_label.grid(row=6, column=1, pady=(20, 0), sticky=tk.W, padx=(10, 0))
        self.marks_expected_entry.grid(row=7, column=1, padx=(10, 0), pady=(20, 0))

        # Tree View
        # Style for the tree view
        self.styletree = ttk.Style()
        # self.styletree.theme_use("default")
        self.styletree.configure("T.Treeview", background="#fbe18d", foreground="black", rowheight=35,
                                 fieldbackground="#fbe18d")
        self.styletree.map("T.Treeview", background=[('selected', '#f89b1e')])

        self.greTree = ttk.Treeview(self.treeviewframe, height=15, style="T.Treeview")

        self.greTree['columns'] = (
            "Name", "Email", "Admission No", "Exam No", "Subject", "Marks Scored", "Marks Expected", "Comments",
            "Status")
        # defining columns
        self.greTree.column("#0", width=0, stretch=NO)
        self.greTree.column("Name", anchor=tk.W, width=120, stretch=NO)
        self.greTree.column("Email", anchor=tk.CENTER, width=200, stretch=NO)

        self.greTree.column("Admission No", anchor=tk.CENTER, width=120, stretch=NO)
        self.greTree.column("Exam No", anchor=tk.CENTER, width=120, stretch=NO)
        self.greTree.column("Subject", anchor=tk.CENTER, width=120, stretch=NO)
        self.greTree.column("Marks Scored", anchor=tk.CENTER, width=120, stretch=NO)
        self.greTree.column("Marks Expected", anchor=tk.CENTER, width=120, stretch=NO)
        self.greTree.column("Comments", anchor=tk.CENTER, width=120, stretch=NO)
        self.greTree.column("Status", anchor=tk.CENTER, width=120, stretch=NO)

        # defining headings

        self.greTree.heading("#0", text="", anchor=tk.W)
        self.greTree.heading("Name", text="Name", anchor=tk.W)
        self.greTree.heading("Email", text="Email", anchor=tk.CENTER)

        self.greTree.heading("Admission No", text="Admission No", anchor=tk.CENTER)
        self.greTree.heading("Exam No", text="Exam No", anchor=tk.CENTER)
        self.greTree.heading("Subject", text="Subject", anchor=tk.CENTER)
        self.greTree.heading("Marks Scored", text="Marks Scored", anchor=tk.CENTER)
        self.greTree.heading("Marks Expected", text="Marks Expected", anchor=tk.CENTER)
        self.greTree.heading("Comments", text="Comments", anchor=tk.CENTER)
        self.greTree.heading("Status", text="Status", anchor=tk.CENTER)

        # adding data will be done through database

        self.greTree.pack(pady=10)

        # Commands

        self.submit_button.config(
            command=lambda: submit(self, self.name_entry.get(), self.email_entry.get(), self.phone_entry.get(),
                                   self.admission_entry.get(), self.exam_entry.get(),
                                   self.subject_entry.get(),
                                   self.marks_got_entry.get(),
                                   self.marks_expected_entry.get(),
                                   self.comments_textField.get('1.0', END)))
        self.rest_button.config(command=lambda: reset(self))
        self.back_button.config(command=lambda: back(self, firstnamedb, lastnamedb, emaildb, admissionnodb, semesterdb))
        self.show_status.config(command=lambda: showstatus(self, firstnamedb, lastnamedb))


def submit(self, name1, email1, phno1, admno1, exam1, subject1, marksscored1, marksexp1, comments):
    if name1 == "" or email1 == "" or phno1 == "" or admno1 == "" or exam1 == "" or subject1 == "" or marksscored1 == "" or marksexp1 == "":
        messagebox.showerror(title="Error", message="Please fill all required fields")

    else:
        if not pyisemail.is_email(email1):
            messagebox.showerror(title="Error", message="Please fill a valid Email ID")

        elif not phno1.isdigit():
            messagebox.showerror(title="Error", message="Please fill a valid Phone No")

        elif not marksscored1.isdigit() or len(marksscored1) != 2:
            messagebox.showerror(title="Error", message="Please Enter the correct marks")

        elif not marksexp1.isdigit() or len(marksexp1) != 2:
            messagebox.showerror(title="Error", message="Please Enter the correct marks")

        else:
            conn = None
            cur = None
            cur1 = None

            try:
                conn = psycopg2.connect(
                    host=hostnamedb,
                    dbname=databasedb,
                    user=usernamedb,
                    password=pwddb,
                    port=port_iddb
                )
                global count
                cur = conn.cursor()
                #condition to eliminate multiple same grievances
                cur1 = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
                selectscript = """select count(*) from grievance where name=%s and admissionno=%s and marksscored=%s and marksexpected=%s and subjectlabel=%s and examlabel=%s"""
                selectvalues=(name1,admno1,marksscored1,marksexp1,subject1,exam1)
                cur1.execute(selectscript,selectvalues)
                for rel in cur1.fetchall():
                    count=rel['count']
                if count >= 1:
                    messagebox.showerror(title="Grievance already exists",
                                         message="The following grievance already exists")
                else:
                    grievancescript = """insert into grievance values (%s,%s,%s,%s,%s,%s,%s,%s,%s)"""
                    grievancevalues = (name1, email1, phno1, admno1, exam1, subject1, marksscored1, marksexp1, comments)
                    cur.execute(grievancescript, grievancevalues)
                    messagebox.showinfo(title="Grievance",
                                        message="Your Grievance has been registered successfully")
                conn.commit()

            except Exception as error:
                print(error)
            finally:
                if cur1 is not None:
                    cur1.close()
                if cur is not None:
                    cur.close()
                if conn is not None:
                    conn.close()


def reset(self):
    answer = messagebox.showwarning(title="Confirmation!!", message="Are you sure you want to reset?", )
    if answer:
        # messagebox.showwarning(title="Confirmation!!", message="Are you sure you want to reset?", )
        self.name_entry.delete(0, END)
        self.email_entry.delete(0, END)
        self.phone_entry.delete(0, END)
        self.admission_entry.delete(0, END)
        self.exam_entry.delete(0, END)
        self.subject_entry.delete(0, END)
        self.marks_got_entry.delete(0, END)
        self.marks_expected_entry.delete(0, END)
        self.comments_textField.delete(1.0, END)


def back(self, firstnamedb, lastnamedb, emaildb, admissionnodb, semesterdb):
    answer = messagebox.askokcancel(title="Confirmation!!", message="Do you want to go back?", )
    if answer:
        self.destroy()
        obj = StudentHome.StudentHome(firstnamedb, lastnamedb, emaildb, admissionnodb, semesterdb)
    else:
        return


def showstatus(self, firstname, lastname):
    for item in self.greTree.get_children():
        self.greTree.delete(item)
    global admnodb
    admnodb = None
    conn = None
    cur = None
    global lcount
    try:
        conn = psycopg2.connect(
            host=hostnamedb,
            dbname=databasedb,
            user=usernamedb,
            password=pwddb,
            port=port_iddb
        )
        name1 = firstname + " " + lastname
        cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
        selectscript = """select admissionno from grievance where name= %s"""
        selectvalue = (name1,)

        cur.execute(selectscript, selectvalue)
        for record in cur.fetchall():
            admnodb = record['admissionno']

        selectscript2 = """select name,email,admissionno,examlabel,subjectlabel,marksscored,marksexpected,
        commentsgiven,status from grievance where admissionno= %s """
        selectvalue2 = (admnodb,)
        cur.execute(selectscript2, selectvalue2)

        for rep in cur.fetchall():
            self.greTree.insert(parent='', index='end', iid=lcount, values=(
                rep['name'], rep['email'], rep['admissionno'], rep['examlabel'], rep['subjectlabel'],
                rep['marksscored'], rep['marksexpected'], rep['commentsgiven'], rep['status']))

            lcount += 1



    except Exception as error:
        print(error)

    finally:
        if cur is not None:
            cur.close()
        if conn is not None:
            conn.close()


if __name__ == "__main__":
    gre = Greivance("Nitish", "Palanivelu", "email", "adminssiono", "semester")
    gre.mainloop()
