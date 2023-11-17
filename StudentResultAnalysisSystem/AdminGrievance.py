# TODO ADD BACK BUTTON

from tkinter import *
import tkinter as tk
import webbrowser
from tkinter import ttk
from tkinter import messagebox
from tkinter.ttk import Style

import psycopg2
import psycopg2.extras

import AdminHome

lcount = 0

hostnamedb = "localhost"
databasedb = "ResultAnalysis"
usernamedb = "postgres"
pwddb = "5302"
port_iddb = 5432


class AdminGrievance(tk.Tk):
    def __init__(self,firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad):
        super().__init__()

        self.title("Welcome to Grievance Request Page")
        self.geometry("2560x1440+0+0")
        self.config(background="#2e363b")

        # logo-------------

        self.logo = tk.PhotoImage(file="logo.png")
        self.logo_Label = ttk.Label(self, image=self.logo).place(x=0, y=0)

        self.head_Label = ttk.Label(self, text="Admin Request Page", font=("Helvetica", 35), foreground="#eebd3e",
                                    background="#2e363b")
        self.head_Label.place(x=600, y=20)

        # Frame----------------------------------

        self.frame1 = tk.Frame(self, bg="light blue", bd=4, relief=SUNKEN, height=450, width=800, background="#fbe18d")
        self.frame1.place(x=520, y=150)

        self.frame2 = tk.Frame(self, bg="light blue", bd=4, relief=SUNKEN, height=850, width=4, background="#f89b1e")
        self.frame2.place(x=510, y=150)

        # optionmenu
        admissionnos = []
        try:
            conn = psycopg2.connect(
                host=hostnamedb,
                dbname=databasedb,
                user=usernamedb,
                password=pwddb,
                port=port_iddb
            )
            cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            select_script = """select DISTINCT  admissionno from grievance"""
            cur.execute(select_script)
            for records in cur.fetchall():
                admissionnumbers = records['admissionno']
                if not admissionnumbers == "":
                    admissionnos.append(admissionnumbers)


        except Exception as error:
            print(error)
        finally:
            if cur is not None:
                cur.close()
            if conn is not None:
                conn.close()

        self.menu = tk.StringVar()
        self.menu.set("ADMISSION NO.")

        self.adm_option = tk.OptionMenu(self, self.menu, *admissionnos)
        self.adm_option.config(height=1, width=15, font=("Helvetica", 15), foreground="blue", background="#59c9cf",
                               activebackground="#59c9cf")
        self.adm_option.place(x=200, y=350)

        # style for buttons-------

        # Style for the tree view
        self.styletree = ttk.Style()
        # self.styletree.theme_use("default")
        self.styletree.configure("T.Treeview", background="#fbe18d", foreground="black", rowheight=35,
                                 fieldbackground="#fbe18d")
        self.styletree.map("T.Treeview", background=[('selected', '#f89b1e')])

        self.style = Style(self)
        self.style.configure("U.TButton", font=("Helvetica", 15), foreground="#28571e", background="green")

        self.style = Style(self)
        self.style.configure("M.TButton", font=("Helvetica", 15), foreground="#b02a2a", background="red")

        self.style = Style(self)
        self.style.configure("W.TButton", font=("Helvetica", 15), foreground="blue", background="blue")
        # Buttons------
        self.show_button = ttk.Button(self, text="SHOW", style="W.TButton")
        self.show_button.place(x=203, y=450)
        self.update_button = ttk.Button(self, text="APPROVE", style="U.TButton")
        self.update_button.place(x=203, y=550)

        self.marks_button = ttk.Button(self, text="REJECT", style="M.TButton")
        self.marks_button.place(x=203, y=650)

        # components inside the frame

        # self.studentname_label = ttk.Label(self.frame1, text="Name : Nishith Dubey", font=("Helvetica", 15),background="#fbe18d")
        # self.studentname_label.grid(row=0, column=0, padx=(10, 0), pady=(20, 0), sticky=tk.W)
        # self.studentemail_label = ttk.Label(self.frame1, text="Email : ndubey@gmail.com", font=("Helvetica", 15),background="#fbe18d")
        # self.studentemail_label.grid(row=0, column=1, padx=(30, 0), pady=(20, 0), sticky=tk.W)
        # self.studentadm_label = ttk.Label(self.frame1, text="Admission Number : 2020PE1234", font=("Helvetica", 15),background="#fbe18d")
        # self.studentadm_label.grid(row=0, column=2, padx=(30, 0), pady=(20, 0), sticky=tk.W)
        # self.examno_label = ttk.Label(self.frame1, text="Exam No : E101", font=("Helvetica", 15),background="#fbe18d")
        # self.examno_label.grid(row=1, column=0, padx=(10, 0), pady=(40, 0), sticky=tk.W)
        # self.marksscored_label = ttk.Label(self.frame1, text="Marks Scored : 35", font=("Helvetica", 15),background="#fbe18d")
        # self.marksscored_label.grid(row=1, column=1, padx=(30, 0), pady=(40, 0), sticky=tk.W)
        # self.marksexpected_label = ttk.Label(self.frame1, text="Marks Expected : 40", font=("Helvetica", 15),background="#fbe18d")
        # self.marksexpected_label.grid(row=1, column=2, padx=(30, 0), pady=(40, 0), sticky=tk.W)
        # self.comments_label = ttk.Label(self, text="Comments : ", font=("Helvetica", 15),background="#fbe18d")
        # self.comments_label.place(x=850, y=460)

        self.greTree = ttk.Treeview(self.frame1, height=15, style="T.Treeview")

        # defining the coloumns
        self.greTree['columns'] = (
            "Name", "Email", "Admission No", "Exam No", "Subject", "Marks Scored", "Marks Expected", "Comments",
            "Status")

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

        # create hedaings
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

        # add data

        self.greTree.tag_configure('oddrow', background="black")
        self.greTree.tag_configure('evenrow', background="#fbe18d")
        self.greTree.pack(pady=(10, 0))

        self.show_button.config(command=lambda: showgrievance(self, self.menu.get()))
        self.update_button.config(command=lambda: accept(self,self.menu.get()))
        self.marks_button.config(command=lambda :reject(self,self.menu.get()))


        self.back_button=ttk.Button(self,text="Back", style="M.TButton")
        self.back_button.place(x=1550,y=20)
        self.back_button.config(command=lambda :back(self,firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad))


# TODO to create condition if the option menu is not selected
# TODO slove the error
def showgrievance(self, admno):
    for item in self.greTree.get_children():
        self.greTree.delete(item)
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
        if admno=="ADMISSION NO.":
            messagebox.showerror(title="Error",message="Please Select an Admission Number")
        else:
            cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            select_script = """select * from grievance where admissionno=%s"""
            select_values = (admno,)

            cur.execute(select_script, select_values)
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


def accept(self,admno):
    selected=self.greTree.focus()

    values=self.greTree.item(selected,'values')
    if len(values)==0:
        messagebox.showerror(title="Error",message="Please select a grievance")
    else:
        print(values)
        name=values[0]
        admission=values[2]
        scoredmarks=values[5]
        expectedmarks=values[6]
        subject=values[4]
        examid=values[3]
        print(name)
        print(admission)
        print(expectedmarks)
        print(subject)
        conn = None
        cur = None
        try:
            conn = psycopg2.connect(
                host=hostnamedb,
                dbname=databasedb,
                user=usernamedb,
                password=pwddb,
                port=port_iddb
            )
            cur=conn.cursor()
            updatescript="""update grievance set status='approved' where name=%s and admissionno=%s and marksscored=%s and marksexpected=%s and subjectlabel=%s and examlabel=%s"""
            updatevalues=(name,admission,scoredmarks,expectedmarks,subject,examid)
            cur.execute(updatescript,updatevalues)
            update_marks_script="""update marks set marks_scored=%s where student_name=%s and student_admno=%s and subject=%s"""
            update_marks_values=(int(expectedmarks),name,admission,subject)
            cur.execute(update_marks_script,update_marks_values)
            conn.commit()
            showgrievance(self,admno)
        except Exception as error:
            print(error)
        finally:
            if cur is not None:
                cur.close()
            if conn is not None:
                conn.close()

def reject(self,admno):
    selected = self.greTree.focus()

    values = self.greTree.item(selected, 'values')
    if len(values) == 0:
        messagebox.showerror(title="Error", message="Please select a grievance")
    else:
        print(values)
        name = values[0]
        admission = values[2]
        scoredmarks = values[5]
        expectedmarks = values[6]
        subject = values[4]
        examid = values[3]
        conn = None
        cur = None
        try:
            conn = psycopg2.connect(
                host=hostnamedb,
                dbname=databasedb,
                user=usernamedb,
                password=pwddb,
                port=port_iddb
            )
            cur = conn.cursor()
            updatescript = """update grievance set status='rejected' where name=%s and admissionno=%s and marksscored=%s and marksexpected=%s and subjectlabel=%s and examlabel=%s"""
            updatevalues = (name, admission, scoredmarks, expectedmarks, subject, examid)
            cur.execute(updatescript, updatevalues)
            conn.commit()
            showgrievance(self, admno)
        except Exception as error:
            print(error)
        finally:
            if cur is not None:
                cur.close()
            if conn is not None:
                conn.close()

def back(self,firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad):
    self.destroy()
    obj=AdminHome.AdminHome(firstnamedb_ad, lastnamedb_ad, phonenodb_ad, emaildb_ad)




if __name__ == "__main__":
    gre = AdminGrievance("Nitish","Palanivelu","9321021489","nitish532002@gmail.com")
    gre.mainloop()
