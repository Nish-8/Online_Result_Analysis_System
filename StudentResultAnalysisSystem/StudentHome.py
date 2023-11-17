import tkinter as tk
import traceback
import webbrowser
from tkinter import ttk
from tkinter import messagebox
from tkinter.ttk import Style
from pyisemail import is_email
import psycopg2
import psycopg2.extras
import numpy as np
import matplotlib.pyplot as plt
from matplotlib.backends.backend_tkagg import FigureCanvasTkAgg

import GreivencePage
import LoginPage
hostnamedb = "localhost"
databasedb = "ResultAnalysis"
usernamedb = "postgres"
pwddb = "5302"
port_iddb = 5432


class StudentHome(tk.Tk):

    def __init__(self, firstnamedb, lastnamedb, emaildb, admissionnodb, semesterdb):
        super().__init__()

        self.title("Student Home Page")
        self.geometry("2560x1440+0+0")
        self.config(background="#2e363b")

        self.style = Style(self)
        self.style.configure("A.TButton", font=("Helvetica", 15), foreground="#2e363b",
                             background="#f89b1e")
        self.seperatorstyle = Style(self)
        self.seperatorstyle.configure("Line.TSeparator", background="blue")
        self.style3 = Style(self)
        self.style3.configure("RG.TButton", font=("Helvetica", 15), foreground="#2e363b", background="#f89b1e")
        # self.style4 = Style(self)
        # self.style4.configure("L.TButton", font=("Helvetica", 20), foreground="red", background="black", bg="black")

        logo = tk.PhotoImage(file="logo.png")
        # Creation Of the widgets
        self.icon_label = ttk.Label(self, image=logo)
        self.welcome_label = ttk.Label(self, text="Welcome Student: ", font=("Helvetica", 30, "bold"),
                                       background="#2e363b",
                                       foreground="#f89b1e")
        self.usernamename_label = ttk.Label(self, text=firstnamedb + " " + lastnamedb, font=("Helvetica", 30, "bold"),
                                            background="#2e363b",
                                            foreground="#f89b1e")
        self.name_label = ttk.Label(self, text="Name: ", font=("Helvetica", 20), background="#2e363b", justify=tk.LEFT,
                                    foreground="#eebd3e")
        self.name_tbd_label = ttk.Label(self, text=firstnamedb + " " + lastnamedb, font=("Helvetica", 20),
                                        background="#2e363b",
                                        foreground="#fbe18d", justify=tk.LEFT)
        self.emailid_label = ttk.Label(self, text="Email Id: ", font=("Helvetica", 20), background="#2e363b",
                                       justify=tk.LEFT, foreground="#eebd3e")
        self.emailid_tbd_label = ttk.Label(self, text=emaildb, font=("Helvetica", 20),
                                           background="#2e363b", justify=tk.LEFT, foreground="#fbe18d")
        self.admno_label = ttk.Label(self, text="Admission No: ", font=("Helvetica", 20),
                                     background="#2e363b", justify=tk.LEFT, foreground="#eebd3e")
        self.admno_tbd_label = ttk.Label(self, text=admissionnodb, font=("Helvetica", 20),
                                         background="#2e363b", justify=tk.LEFT, foreground="#fbe18d")
        self.semester_label = ttk.Label(self, text="Semester: ", font=("Helvetica", 20),
                                        background="#2e363b", justify=tk.LEFT, foreground="#eebd3e")
        self.semester_tbd_label = ttk.Label(self, text=semesterdb, font=("Helvetica", 20),
                                            background="#2e363b", justify=tk.LEFT, foreground="#fbe18d")
        # TODO Analysis Part--------------------------------------------------------------------------------
        self.analysis_label = ttk.Label(self, text="Analysis Portal", font=("Helvetica", 20, "bold"),
                                        background="#2e363b", justify=tk.LEFT, foreground="#f89b1e")

        self.analysis_frame = tk.Frame(self, height=450, width=600, background="#fbe18d", relief=tk.SUNKEN, bd=2)
        self.selectsem_label = ttk.Label(self.analysis_frame, text="Select Semester", font=("Helvetica", 15),
                                         background="#fbe18d")
        self.menu = tk.StringVar()
        self.menu.set("Select any exam")
        exams = ["Semester I", "Semester II", "Semester III", "Semester IV"]
        self.selectsem_option = tk.OptionMenu(self.analysis_frame, self.menu, *exams)
        self.selectsem_option.config(height=1, width=15)
        self.selectsubject_label = ttk.Label(self.analysis_frame, text="Select Subject", font=("Helvetica", 15),
                                             background="#fbe18d")

        self.menu1 = tk.StringVar()
        self.menu1.set("Select any subject")
        self.subjects=['']
        self.selectsubject_option = tk.OptionMenu(self.analysis_frame, self.menu1, *self.subjects)
        # TODO To change the subject according to the semester
        self.selectsubject_option.config(height=1, width=15)
        self.selectsubject_option.grid(row=1, column=1, padx=(70, 0), pady=(25, 0), sticky=tk.W)


        self.analyse_button = ttk.Button(self.analysis_frame, text="Analyse", style="A.TButton")
        # Analysis part ends----------------------------------------------------------------------
        self.note_label = ttk.Label(self,
                                    text="Note : The analysis will only be done if you have attempted the examination",
                                    font=("Helvetica", 10), foreground="#f89b1e", background="#2e363b")
        # Graph Part--------------------------------
        self.piechart_frame = tk.Frame(self, height=400, width=400, background="#f89b1e", relief=tk.SUNKEN, bd=2)
        self.piechart_label = ttk.Label(self, text="Pie Chart =>", font=("Helvetica", 25), foreground="#f89b1e",
                                        background="#2e363b")
        self.comparisongraph_frame = tk.Frame(self, height=400, width=400, background="#f89b1e", relief=tk.SUNKEN, bd=2)
        self.comparisongraph_label = ttk.Label(self, text="Bar Graph =>", font=("Helvetica", 25), foreground="#f89b1e",
                                               background="#2e363b")
        self.frame_seperator = ttk.Separator(self, orient="vertical", style="Line.TSeparator")

        self.raisegrivence_button = ttk.Button(self, text="Raise Grievance", style="RG.TButton")
        self.back_button = ttk.Button(self, text="Back", style="RG.TButton")
        self.logout_button = tk.Button(self, text="Logout", background="black", foreground="red",
                                       font=("Helvetica", 15))

        self.getsubjectbutton = ttk.Button(self.analysis_frame, text="Get Subjects", style="A.TButton")
        self.enter_examname_label=ttk.Label(self.analysis_frame,text="Enter a exam",font=("Helvetica", 15), background="#fbe18d")

        self.exam=tk.StringVar()
        self.exam.set("Select a exam")
        self.exams_list=['']
        self.exam_option=tk.OptionMenu(self.analysis_frame,self.exam,*self.exams_list)
        self.exam_option.config(height=1, width=15)

        self.enter_division_label = ttk.Label(self.analysis_frame, text="Enter Division : ", font=("Helvetica", 15), background="#fbe18d")
        self.div = tk.StringVar()
        self.div.set("Select a Division")
        self.divisions = ["A", "B"]
        self.division_option = tk.OptionMenu(self.analysis_frame, self.div, *self.divisions)
        self.division_option.config(height=1, width=15)
        # self.getsubjectbutton.place(x=485,y=480)

        # placing or packing of widgets
        self.icon_label.image = logo
        self.icon_label.place(x=0, y=0)
        self.welcome_label.place(x=160, y=55)
        self.usernamename_label.place(x=510, y=55)
        self.name_label.grid(row=0, column=0, pady=(200, 0), padx=(10, 0), sticky=tk.W)
        self.name_tbd_label.grid(row=0, column=1, pady=(200, 0), padx=(10, 0), sticky=tk.W)
        self.emailid_label.grid(row=1, column=0, pady=(10, 0), padx=(10, 0), sticky=tk.W)
        self.emailid_tbd_label.grid(row=1, column=1, pady=(10, 0), padx=(10, 0), sticky=tk.W)
        self.admno_label.grid(row=2, column=0, pady=(10, 0), padx=(10, 0), sticky=tk.W)
        self.admno_tbd_label.grid(row=2, column=1, pady=(10, 0), padx=(10, 0), sticky=tk.W)
        self.semester_label.grid(row=3, column=0, pady=(10, 0), padx=(10, 0), sticky=tk.W)
        self.semester_tbd_label.grid(row=3, column=1, pady=(10, 0), padx=(10, 0), sticky=tk.W)
        self.analysis_label.place(x=190, y=400)
        self.analysis_frame.place(x=105, y=450)
        self.analysis_frame.propagate(tk.FALSE)
        # Analysis Part ka packing
        self.selectsem_label.grid(row=0, column=0, padx=(10, 0), pady=(25, 0), sticky=tk.W)
        self.selectsem_option.grid(row=0, column=1, padx=(70, 0), pady=(25, 0), sticky=tk.W)
        self.getsubjectbutton.grid(row=0, column=2, padx=(70, 0), pady=(25, 0), sticky=tk.W)
        self.selectsubject_label.grid(row=1, column=0, padx=(10, 0), pady=(25, 0), sticky=tk.W)
        self.enter_examname_label.grid(row=2,column=0, padx=(10, 0), pady=(25, 0), sticky=tk.W)
        self.exam_option.grid(row=2,column=1, padx=(70, 0), pady=(25, 0), sticky=tk.W)
        self.enter_division_label.grid(row=3,column=0,padx=(10, 0), pady=(25, 0), sticky=tk.W)
        self.division_option.grid(row=3,column=1,padx=(70, 0), pady=(25, 0), sticky=tk.W)

        self.analyse_button.grid(row=4, column=0, rowspan=3, columnspan=3, pady=(40, 0))
        # Analysis Part ka packing ends------------------------------------------------
        self.note_label.place(x=170, y=780)
        # Graph part starts------------------------------------------------------------
        self.piechart_frame.place(x=900, y=30)
        self.piechart_label.place(x=705, y=200)
        self.comparisongraph_frame.place(x=900, y=450)
        self.comparisongraph_label.place(x=700, y=625)
        self.frame_seperator.place(x=700, y=30, relx=0, rely=0.1, relheight=0.80, relwidth=0)

        self.raisegrivence_button.place(x=105, y=825)
        self.back_button.place(x=340, y=825)
        self.logout_button.place(x=1600, y=0)

        # Commands for buttons and labels are called here either config or bind method are used
        self.logout_button.config(command=lambda: logout(self))
        self.raisegrivence_button.config(
            command=lambda: gotoGrievance(self, firstnamedb, lastnamedb, emaildb, admissionnodb, semesterdb))
        self.getsubjectbutton.config(command=lambda: subjects1(self, self.menu.get()))
        self.analyse_button.config(command=lambda :analyse(self,firstnamedb, lastnamedb,admissionnodb,))
        self.back_button.config(command=lambda :logout(self))


def logout(self):
    answer = messagebox.askyesno(title="Logout", message="Do you want to Logout ?")
    if answer:
        messagebox.showinfo(title="Logout", message="You have logged out successfully")
        self.destroy()
        obj = LoginPage.Login()
    else:
        return


def subjects1(self, menu):
    self.selectsubject_option.destroy()
    if menu == "Select any exam":
        messagebox.showerror(title="Error", message="Select a Semester")
        sem1list=[""]
        self.subjects = sem1list

    elif menu == "Semester I":
        sem1list = ["Physics", "Chemistry", "EM I", "Mechaincs", "BEE"]
        self.subjects=sem1list
    elif menu == "Semester II":
        sem1list = ["Physics", "Chemistry", "EM II", "Engineering Drawing", "C Programming"]
        self.subjects=sem1list
    elif menu == "Semester III":
        sem1list = ["DBMS", "PCPF", "EM III", "PC", "JAVA", "DSA"]
        self.subjects=sem1list
    elif menu == "Semester IV":
        sem1list = ["OS", "ATSS", "EM IV", "CND", "FWM"]
        self.subjects=sem1list

    self.menu1 = tk.StringVar()
    self.menu1.set("Select any subject")
    self.selectsubject_option = tk.OptionMenu(self.analysis_frame, self.menu1, *self.subjects)

    self.selectsubject_option.config(height=1, width=15)
    self.selectsubject_option.grid(row=1, column=1, padx=(70, 0), pady=(25, 0), sticky=tk.W)

    self.exam = tk.StringVar()
    self.exam.set("Select a exam")
    self.exams_list = ['']
    new_list=[]

    cur = None
    conn = None
    count = None
    try:
        conn = psycopg2.connect(

            host=hostnamedb,
            dbname=databasedb,
            user=usernamedb,
            password=pwddb,
            port=port_iddb
        )
        cur = conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
        selectscript="""select examename from exam where semester=%s"""
        selectvalues=(menu,)
        cur.execute(selectscript,selectvalues)
        for records in cur.fetchall():
            new_list.append(records['examename'])
        self.exams_list=new_list
        self.exam_option.destroy()
        self.exam_option = tk.OptionMenu(self.analysis_frame, self.exam, *self.exams_list)
        self.exam_option.config(height=1, width=15)
        self.exam_option.grid(row=2, column=1, padx=(70, 0), pady=(25, 0), sticky=tk.W)

    except Exception as error:
        print(error)
    finally:
        if cur is not None:
            cur.close()
        if conn is not None:
            conn.close()


def gotoGrievance(self, firstnamedb, lastnamedb, emaildb, admissionnodb, semesterdb):
    self.destroy()
    obj = GreivencePage.Greivance(firstnamedb, lastnamedb, emaildb, admissionnodb, semesterdb)


def analyse(self,fname,lname,admno):
    yourmarks = None
    avgmarksyourdiv = None
    maxmarksyourdiv = None
    maxmarksotherdiv = None
    avgmarksotherdiv = None
    totalscored=None
    subjectslist=[]
    markslist=[]
    name=fname + " " + lname
    if self.menu.get()=="Select any exam" or self.menu1.get()=="Select any subject" or self.exam.get()=="Select a exam" or self.div.get()=="Select a Division":
        messagebox.showerror(title="Error",message="Fill all the details")

    else:
        cur = None
        conn = None
        count = None

        examid=None
        try:
            conn = psycopg2.connect(

                host=hostnamedb,
                dbname=databasedb,
                user=usernamedb,
                password=pwddb,
                port=port_iddb
            )
            cur=conn.cursor(cursor_factory=psycopg2.extras.DictCursor)
            selectexamidscript="""select examid from exam where examename=%s and semester=%s"""
            selectexamidvalues=(self.exam.get(),self.menu.get())

            cur.execute(selectexamidscript,selectexamidvalues)
            for record in cur.fetchall():
                examid=record['examid']

            selectscript_yourmarks = """select marks_scored from marks where student_name=%s and student_admno=%s and subject=%s and exam_id=%s and division=%s"""
            selectscript_yourmarks_valus=(name,admno,self.menu1.get(),examid,self.div.get())
            cur.execute(selectscript_yourmarks, selectscript_yourmarks_valus)
            for record in cur.fetchall():
                yourmarks = record['marks_scored']

            avgmarksscript="""select AVG(marks_scored) from marks where subject=%s and exam_id=%s and division=%s"""
            avgmarksvalues=(self.menu1.get(),examid,self.div.get())
            cur.execute(avgmarksscript, avgmarksvalues)
            for record in cur.fetchall():
                avgmarksyourdiv = int(record['avg'])


            avgmarksotherdivscript="""select AVG(marks_scored) from marks where subject=%s and exam_id=%s and division NOT LIKE %s"""
            avgmarksvalues = (self.menu1.get(), examid, self.div.get())
            cur.execute(avgmarksotherdivscript, avgmarksvalues)
            for record in cur.fetchall():
                avgmarksotherdiv = int(record['avg'])

            maxmarksyourdivscript="""SELECT MAX(marks_scored) FROM marks WHERE subject=%s and exam_id=%s and division=%s"""
            maxmarksyourdivvalues = (self.menu1.get(), examid, self.div.get())
            cur.execute(maxmarksyourdivscript, maxmarksyourdivvalues)
            for record in cur.fetchall():
                maxmarksyourdiv = int(record['max'])

            maxmarksotherdivscript = """SELECT MAX(marks_scored) FROM marks WHERE subject=%s and exam_id=%s and division NOT LIKE %s"""
            maxmarksotherdivvalues = (self.menu1.get(), examid, self.div.get())
            cur.execute(maxmarksotherdivscript, maxmarksotherdivvalues)
            for record in cur.fetchall():
                maxmarksotherdiv = int(record['max'])

            getsubjectsscript="""select subjects from subjects where semester=%s"""
            getsubjectsvalues=(self.menu.get(),)

            cur.execute(getsubjectsscript,getsubjectsvalues)

            for record in cur.fetchall():
                subjectslist.append(record['subjects'])

            print(subjectslist)

            for i in range(len(subjectslist)):
                getmarksscript="""select marks_scored from marks where student_name=%s and exam_id=%s and subject=%s"""
                getmarksvalues=(name,examid,subjectslist[i])
                cur.execute(getmarksscript,getmarksvalues)
                for records in cur.fetchall():
                    markslist.append(records['marks_scored'])



            print(len(markslist))

            gettotalscript="""select SUM(marks_scored) from marks where student_name=%s and exam_id=%s"""
            gettotalvalues=(name,examid)
            cur.execute(gettotalscript,gettotalvalues)
            for rec in cur.fetchall():
                totalscored=rec['sum']






        except Exception as error:
            print(error)
            print(traceback.format_exc())
            messagebox.showerror(title="Error",message="The data for the selected exam has not been Updated")
        finally:
            if cur is not None:
                cur.close()
            if conn is not None:
                conn.close()

        fig=plt.figure(figsize=(6,6),dpi=75)
        values = [yourmarks, avgmarksyourdiv, avgmarksotherdiv, maxmarksyourdiv, maxmarksotherdiv]
        lables=("Your Marks","AVG DIV A","AVG DIV B","MAX DIV A","MAX DIV B")
        labelpos=np.arange(len(lables))


        plt.bar(labelpos,values,align='center',alpha=1.0,color="#f89b1e",edgecolor='black')

        plt.xticks(labelpos,lables)
        plt.ylabel("Marks",fontdict=dict(fontsize=20))
        plt.xlabel("Type of Marks",fontdict=dict(fontsize=15))
        plt.tight_layout(pad=2.2,w_pad=0.5,h_pad=8.5)
        plt.title("Marks Comparison")
        plt.xticks(rotation=20,horizontalalignment='center')

        for index,datapoints in enumerate(values):
            plt.text(x=index,y=datapoints,s=f"{datapoints}",fontdict=dict(fontsize=10),ha='center',va='bottom')

        #plt.show()
        self.comparisongraph_frame.destroy()
        bargraph=FigureCanvasTkAgg(fig,master=self)
        bargraph.draw()
        bargraph.get_tk_widget().place(x=925, y=470)




        # Bar garph is done ____________________________________________________________

        #pychart starts
        if self.exam.get()=="IA1" or self.exam.get()=="IA2":
            total=len(subjectslist)*40
        elif self.exam.get()=="Semester I Final":
            total=len(subjectslist)*80
        else:
            total=len(subjectslist)*60
        print(total)
        lostmarks=total-totalscored
        print(lostmarks)

        fig2=plt.figure(figsize=(6,6),dpi=75)
        markslist.append(lostmarks)
        values1=markslist
        print(values1)
        subjectslist.append("Lost Marks")
        labels1=subjectslist

        colours=['gold','yellowgreen','lightcoral','lightskyblue','Orange','red']
        explode=(0,0,0,0,0,0.2)

        plt.pie(values1,explode=explode,labels=labels1,colors=colours,autopct='%1.1f%%',shadow=True,startangle=148)
        plt.axis('equal')

        self.piechart_frame.destroy()
        piechart = FigureCanvasTkAgg(fig2, master=self)
        piechart.draw()
        piechart.get_tk_widget().place(x=925, y=15)

        answer = messagebox.askyesno(title="Yes/No", message="Do you want to view the graph in detail ?")

        if answer:
            plt.show()

if __name__ == "__main__":
    studenthome = StudentHome("Nitish", "Palanivelu", "palan20it@student.mes.ac.in", "2020PE0206", "IV")  # dummy value
    studenthome.mainloop()
