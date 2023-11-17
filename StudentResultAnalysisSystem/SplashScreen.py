import tkinter as tk
import psycopg2
import psycopg2.extras
from LoginPage import *


class Splash(tk.Tk):
    def __init__(self):
        super().__init__()

        def splash3():
            self.destroy()
            obj = Login()

        self.config(bg="#2e363b")
        self.geometry("2560x1920+0+0")
        self.overrideredirect(True)
        self.img = tk.PhotoImage(file="TITLES.png")
        self.splashscreen1 = tk.Label(image=self.img, background="black")
        self.splashscreen1.image = self.img
        self.splashscreen1.pack(anchor=tk.CENTER, pady=230, padx=(0, 875))
        self.after(2000, splash3)


if __name__ == "__main__":
    obj = Splash()
    obj.mainloop()
