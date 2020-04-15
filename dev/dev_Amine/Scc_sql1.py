import scholarly
import pandas as pd
import numpy as np
import requests as rq
import json
import os
import sqlite3

import mysql.connector


class MaClasse():


    df = pd.read_csv("xx.csv", header=0)
    liste_chercheur = df['Nom et prénom'].values.tolist()
    print("le nombre de chercheurs est de : " + str(len(liste_chercheur)))

    b = iter(liste_chercheur)
    print(liste_chercheur)
    conn = mysql.connector.connect(host="localhost", user="root", password="Amine1996@@!", database="wikicomp20")
    cursor = conn.cursor()

    while True:
        try:
            print("je suis dans 1")
            Prenom_nom = next(b)
            search_query = scholarly.search_author(Prenom_nom)
            author = next(search_query).fill()
            print("je suis dans 2")
            nom = author.name  # nom du chercheur
            laboratoire = author.affiliation  # Laboratoires
            Mail = author.email  # Mail
            nom_competence = author.interests  # compétences
            nombre_de_citations_par_ans = author.cites_per_year

            #def strrr(nom_competence):
            #   str1 =" "
            #    return (str1.join(nom_competence))
            competence = ' '.join(nom_competence)
            print(competence)
            Ma_recherche = {'Nom': nom,'comp': competence,'laboratoire': laboratoire}


            #nom_competence={'comp':n_competence,'categorie': "200"}

            #a= {'comp':cc, 'categorie':"20"}
            #print(nom_competence[0])
            print(Ma_recherche)
            print(nom_competence)
            # print(nombre_de_citations_par_ans)
        except StopIteration:
            break
        finally:
            cursor.execute("""insert into prsl (Nom, competencess, laboratoire )values (%(Nom)s,%(comp)s,%(laboratoire)s)
           """, Ma_recherche)
            #cursor.execute("""insert into competence (nom_competence, categorie)values (%(comp)s,%(categorie)s)
             #          """, a)
    conn.commit()
    conn.close()




    #user = ("amine el kostali", "@univ-evry.fr","chez moi")
    #cursor.execute("""INSERT INTO ch (nom, mail, lab) VALUES(%s,%s,%s)""", user)

