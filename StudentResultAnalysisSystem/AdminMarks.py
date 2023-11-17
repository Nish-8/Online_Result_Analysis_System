# THIS PAGE IS ALSO USE FOR ADDING NEW MARKS
# TODO ADD BACK BUTTON DONE
import tkinter as tk
import webbrowser
from tkinter import ttk
from tkinter import messagebox
from tkinter.ttk import Style
from pyisemail import is_email
import psycopg2
import psycopg2.extras

import AdminHome
count=0

hostnamedb = "localhost"
databasedb = "ResultAnalysis"
usernamedb = "postgres"
pwddb = "5302"
port_iddb = 5432


class AdminMarksUpdation(tk.Tk):

    def __init__(self, firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad):
        self.firstname=firstnamedb_ad
        self.lastname=lastnamedb_ad
        self.phno=phonenodb_ad
        self.email=emaildb_ad
        super().__init__()
        self.title("AdminMarksUpdation")
        self.geometry("2560x1920+0+0")
        self.config(background="#2e363b")
        self.style1 = Style(self)
        self.style1.configure("U.TButton", font=("Helvetica", 15), foreground="red", background="pink")
        self.style = Style(self)
        self.style.configure("A.TButton", font=("Helvetica", 15), foreground="#2e363b",
                             background="#f89b1e")

        # creation of widgets
        logo = tk.PhotoImage(file="logo.png")
        self.logo_label = ttk.Label(self, image=logo)
        self.title_label = ttk.Label(self, text="Marks addition and updation page", font=("Helvetica", 30),
                                     background="#2e363b", foreground="#eebd3e")
        self.welcome_label = ttk.Label(self, text="Welcome Admin : ", font=("Helvetica", 25), background="#2e363b",
                                       foreground="#fbe18d")
        self.adminname_label = ttk.Label(self, text=firstnamedb_ad+" "+lastnamedb_ad, font=("Helvetica", 25), background="#2e363b",
                                         foreground="#fbe18d")

        self.enterexamid_label = ttk.Label(self, text="Enter Exam ID : ", font=("Helvetica", 20), background="#2e363b",
                                           foreground="#fbe18d")
        # self.enterexamid_entry = ttk.Entry(self, font=("Helvetica", 15))


        #exam id option menu
        self.eid=tk.StringVar()
        self.eid.set("Select a ExamID")
        eids=[]
        conn=None
        cur=None
        try:
            conn = psycopg2.connect(
                host=hostnamedb,
                dbname=databasedb,
                user=usernamedb,
                password=pwddb,
                port=port_iddb
            )
            cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            select_script = """select DISTINCT examid from exam"""
            cur.execute(select_script)
            for records in cur.fetchall():
                admissionnumbers = records['examid']

                if not admissionnumbers == "":
                    eids.append(admissionnumbers)
            print(eids)

        except Exception as error:
            print(error)
        finally:
            if cur is not None:
                cur.close()
            if conn is not None:
                conn.close()

        self.eid_options=tk.OptionMenu(self,self.eid,*eids)
        self.eid_options.config(height=1, width=17, font=("Helvetica", 15))


















        #ends

        self.enterstudentname_label = ttk.Label(self, text="Enter Student Name : ", font=("Helvetica", 20),
                                                background="#2e363b", foreground="#fbe18d")
        self.enterstudentname_entry = ttk.Entry(self, font=("Helvetica", 15))

        self.enterstudentadmno_label = ttk.Label(self, text="Enter Student AdmNo : ", font=("Helvetica", 20),
                                                 background="#2e363b", foreground="#fbe18d")
        self.enterstudentadmno_entry = ttk.Entry(self, font=("Helvetica", 15))
        self.selectsubject_label = ttk.Label(self, text="Select a Subject : ", font=("Helvetica", 20),
                                             background="#2e363b", foreground="#fbe18d")
        self.menu = tk.StringVar()
        self.menu.set("Select a Subject")
        self.subjects = ["Please select a exam"]
        self.selectsubject_option = tk.OptionMenu(self, self.menu, *self.subjects)
        self.selectsubject_option.config(height=1, width=17, font=("Helvetica", 15))

        self.entermarks_label = ttk.Label(self, text="Enter Marks Scored : ", font=("Helvetica", 20),
                                          background="#2e363b", foreground="#fbe18d")
        self.entermarks_entry = ttk.Entry(self, font=("Helvetica", 15))

        self.update_button = ttk.Button(self, text="Update Marks", style="U.TButton")
        self.addnewmarks_button = ttk.Button(self, text="Add New", style="U.TButton")
        self.reset_button = ttk.Button(self, text="Reset", style="U.TButton")

        self.back_button = ttk.Button(self, text="Back", style="U.TButton")



        self.enter_division_label=ttk.Label(self,text="Enter Division : ",font=("Helvetica", 20),background="#2e363b", foreground="#fbe18d")
        self.div=tk.StringVar()
        self.div.set("Select a Division")
        self.divisions=["A","B"]
        self.division_option=tk.OptionMenu(self,self.div,*self.divisions)
        self.division_option.config(height=1, width=17, font=("Helvetica", 15))
        # placing or gridding of widgets
        self.logo_label.image = logo
        self.logo_label.place(x=0, y=0)
        self.title_label.place(x=575, y=0)
        self.welcome_label.place(x=165, y=75)
        self.adminname_label.place(x=435, y=75)
        self.enterexamid_label.grid(row=0, column=0, pady=(220, 0), sticky=tk.W)
        self.eid_options.grid(row=0, column=1, pady=(220, 0), padx=(10, 0), sticky=tk.W)
        self.enterstudentname_label.grid(row=1, column=0, pady=(20, 0), sticky=tk.W)
        self.enterstudentname_entry.grid(row=1, column=1, pady=(20, 0), padx=(10, 0), sticky=tk.W)
        self.enterstudentadmno_label.grid(row=2, column=0, pady=(20, 0), sticky=tk.W)
        self.enterstudentadmno_entry.grid(row=2, column=1, pady=(20, 0), padx=(10, 0), sticky=tk.W)
        self.enter_division_label.grid(row=3, column=0, pady=(20, 0), sticky=tk.W)
        self.division_option.grid(row=3,column=1, pady=(20, 0), padx=(10, 0), sticky=tk.W)
        self.selectsubject_label.grid(row=4, column=0, pady=(20, 0), sticky=tk.W)
        self.selectsubject_option.grid(row=4, column=1, pady=(20, 0), padx=(10, 0), sticky=tk.W)
        self.entermarks_label.grid(row=5, column=0, pady=(20, 0), sticky=tk.W)
        self.entermarks_entry.grid(row=5, column=1, pady=(20, 0), padx=(10, 0), sticky=tk.W)
        self.update_button.place(x=100, y=600)
        self.addnewmarks_button.place(x=275, y=600)
        self.reset_button.place(x=185, y=650)
        self.back_button.place(x=1550, y=30)
        # Commands for buttons and labels are called here either config or bind method are used
        self.reset_button.config(command=lambda: reset(self))
        self.back_button.config(command=lambda: back(self,self.firstname, self.lastname,self.phno,self.email))
        self.update_button.config(command=lambda: update(self))
        self.addnewmarks_button.config(command=lambda :addnew(self))


        self.getsubjects_button=ttk.Button(self,text="Get Subjects",style="A.TButton")
        self.getsubjects_button.grid(row=0, column=3, pady=(220, 0),padx=(10,0), sticky=tk.W)
        self.getsubjects_button.config(command=lambda :getsubjects(self,self.eid.get()))


def reset(self):
    self.eid.set("Select a ExamID")
    self.enterstudentname_entry.delete(0, tk.END)
    self.enterstudentadmno_entry.delete(0, tk.END)
    self.div.set("Select a Division")
    self.entermarks_entry.delete(0, tk.END)
    self.menu.set("Select a Subject")


def back(self, firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad):
    self.destroy()
    obj = AdminHome.AdminHome(firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad)


def update(self):
    entry1 = self.eid.get()
    entry2 = self.enterstudentname_entry.get()
    entry3 = self.enterstudentadmno_entry.get()
    entry4 = self.menu.get()
    entry5 = self.entermarks_entry.get()
    entry6 = self.div.get()
    if self.eid.get() == "Select a ExamID" or self.enterstudentname_entry.get() == "" or self.enterstudentadmno_entry.get() == "" or self.entermarks_entry.get() == "" or self.div.get() == "Select a Division" or self.menu.get() == "Select a Subject":
        messagebox.showinfo(title="Wait", message="Please fill all the details!!")
    elif not entry5.isdigit() or len(entry5) != 2:
        messagebox.showerror(title="Error", message="Please Enter the correct marks")
    elif not entry3.isalnum() or len(entry3)!=10:
        messagebox.showerror(title="Error", message="Please Enter valid Admission Number")
    else:
        entry1 = self.eid.get()
        entry2 = self.enterstudentname_entry.get()
        entry3 = self.enterstudentadmno_entry.get()
        entry4 = self.menu.get()
        entry5 = int(self.entermarks_entry.get())
        entry6 = self.div.get()
        cur = None
        cur1 = None
        conn = None

        try:

            conn = psycopg2.connect(

                host=hostnamedb,
                dbname=databasedb,
                user=usernamedb,
                password=pwddb,
                port=port_iddb
            )
            cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            cur1=conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            adminscript = """UPDATE marks SET marks_scored=%s where exam_id=%s and student_name=%s and student_admno=%s and subject=%s and division=%s"""
            adminvalues = (int(entry5),entry1, entry2, entry3, entry4,entry6)
            abc=cur.execute(adminscript, adminvalues)
            print(abc)

            selectscript="""select * from marks"""
            cur1.execute(selectscript)
            global count
            for records in cur1.fetchall():
                if records['exam_id']==self.eid.get() and records['student_name']==self.enterstudentname_entry.get() and records['student_admno']==self.enterstudentadmno_entry.get() and records['subject']==self.menu.get() and records['marks_scored']==int(self.entermarks_entry.get()) and records['division']==self.div.get():
                    count+=1
            print(count)

            if count==0:
                messagebox.showerror(title="Error",message="Please check the details entered for marks updation")
            elif count==1:
                messagebox.showinfo(title="Admin", message="The marks have been updated successfully")
                count=0

            # cur.execute(create_script,insert_value)
            # messagebox.showinfo("alert","Executed successfully")

            conn.commit()

        except Exception as error:
            print(error)
        finally:
            if cur is not None:
                cur.close()
            if conn is not None:
                conn.close()


def addnew(self):
    entry1 = self.eid.get()
    entry2 = self.enterstudentname_entry.get()
    entry3 = self.enterstudentadmno_entry.get()
    entry4 = self.menu.get()
    entry5 =self.entermarks_entry.get()
    entry6 = self.div.get()
    if self.eid.get() == "Select a ExamID" or self.enterstudentname_entry.get() == "" or self.enterstudentadmno_entry.get() == "" or self.entermarks_entry.get() == "" or self.div.get() == "Select a Division" or self.menu.get() == "Select a Subject":
        messagebox.showinfo(title="Wait", message="Please fill all the details!!")
    elif not entry5.isdigit() or len(entry5) != 2:
        messagebox.showerror(title="Error", message="Please Enter the correct marks")
    elif not entry3.isalnum() or len(entry3)!=10:
        messagebox.showerror(title="Error", message="Please Enter valid Admission Number")
    else:
        entry1 = self.eid.get()
        entry2 = self.enterstudentname_entry.get()
        entry3 = self.enterstudentadmno_entry.get()
        entry4 = self.menu.get()
        entry5 = int(self.entermarks_entry.get())
        entry6=self.div.get()
        cur = None
        conn = None
        count=None
        try:

            conn = psycopg2.connect(

                host=hostnamedb,
                dbname=databasedb,
                user=usernamedb,
                password=pwddb,
                port=port_iddb
            )
            cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            selectscript="""select count(*) from marks where exam_id=%s and student_name=%s and student_admno=%s and subject=%s and marks_scored=%s and division=%s"""
            selectvalues=(entry1,entry2,entry3,entry4,entry5,entry6)
            cur.execute(selectscript,selectvalues)
            for records in cur.fetchall():
                count=records['count']

            if count==0:
                adminscript = """insert into marks values (%s,%s,%s,%s,%s,%s)"""
                adminvalues = (entry1, entry2, entry3, entry4, entry5,entry6)
                cur.execute(adminscript, adminvalues)
                messagebox.showinfo(title="Admin", message="The marks have been registered successfully")
            else:
                messagebox.showerror(title="Admin",message="The marks already exists try update instead")

            # cur.execute(create_script,insert_value)
            # messagebox.showinfo("alert","Executed successfully")

            conn.commit()

        except Exception as error:
            print(error)
        finally:
            if cur is not None:
                cur.close()
            if conn is not None:
                conn.close()

def getsubjects(self,examid):
    if examid=="Select a ExamID":
        messagebox.showerror(title="Error",message="Please enter a ExamNo")
    else:
        cur = None
        conn = None
        semesterdb=None
        try:
            conn = psycopg2.connect(

                host=hostnamedb,
                dbname=databasedb,
                user=usernamedb,
                password=pwddb,
                port=port_iddb
            )
            cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            selectscript="""select semester from exam where examid=%s"""
            selectvalues=(examid,)
            cur.execute(selectscript,selectvalues)
            for record in cur.fetchall():
                semesterdb=record['semester']

            subjectscript="""select subjects from subjects where semester=%s"""
            subjectvalues=(semesterdb,)

            cur.execute(subjectscript,subjectvalues)
            self.subjects.clear()
            for records in cur.fetchall():
                self.subjects.append(records['subjects'])
            self.selectsubject_option.destroy()
            self.menu = tk.StringVar()
            self.menu.set("Select a Subject")

            self.selectsubject_option = tk.OptionMenu(self, self.menu, *self.subjects)
            self.selectsubject_option.config(height=1, width=17, font=("Helvetica", 15))
            self.selectsubject_option.grid(row=4, column=1, pady=(20, 0), padx=(10, 0), sticky=tk.W)





        except Exception as error:
            print(error)
        finally:
            if cur is not None:
                cur.close()
            if conn is not None:
                conn.close()



if __name__ == "__main__":
    obj = AdminMarksUpdation("abc","abc","abc","abc")
    obj.mainloop()
