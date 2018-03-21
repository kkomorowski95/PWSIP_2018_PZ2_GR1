using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using System.Security.Cryptography;
using UnityEngine.UI;
using System.Text;
using System.IO;

public class globals : MonoBehaviour
{
    public static string logged_username = "test01";
    public static int match_id = 0;
    public static string rival_username = "";
    public GameObject username;
    public static List<Cards> Card = new List<Cards>();
    public static List<Attack_List> Attack_Id = new List<Attack_List>();
    public static List<Attacks> Attack = new List<Attacks>();
    public static List<Elements> Element = new List<Elements>();
    public static List<Elements_Sums> Element_Sum = new List<Elements_Sums>();

    public struct Cards
    {
        public int id;
        public string name;
        public string description;
        public int element_id;
        public int attack_ids;
        public int health;
        public int type;

        public Cards (int idt, string namet, string desct, int element_idt, int attack_idst, int healtht, int typet)
        {
            id = idt;
            name = namet;
            description = desct;
            element_id = element_idt;
            attack_ids = attack_idst;
            health = healtht;
            type = typet;
        }
    }

    public struct Attack_List
    {
        public int id;
        public int attack1;
        public int attack2;
        public int attack3;
        public int attack4;

        public Attack_List (int idt, int attack1t, int attack2t, int attack3t, int attack4t)
        {
            id = idt;
            attack1 = attack1t;
            attack2 = attack2t;
            attack3 = attack3t;
            attack4 = attack4t;
        }
    }

    public struct Attacks
    {
        public int id;
        public string name;
        public string description;
        public int damage;
        public int element_id;
        public int element_req;

        public Attacks (int idt, string namet, string desct, int damaget, int element_idt, int element_reqt)
        {
            id = idt;
            name = namet;
            description = desct;
            damage = damaget;
            element_id = element_idt;
            element_req = element_reqt;
        }
    }

    public struct Elements
    {
        public int id;
        public string name;

        public Elements (int idt, string namet)
        {
            id = idt;
            name = namet;
        }
    }

    public struct Elements_Sums
    {
        public int id;
        public int El0;
        public int El1;
        public int El2;
        public int El3;
        public int El4;

        public Elements_Sums (int idt, int El0t, int El1t, int El2t, int El3t, int El4t)
        {
            id = idt;
            El0 = El0t;
            El1 = El1t;
            El2 = El2t;
            El3 = El3t;
            El4 = El4t;
        }
    }

    private void Start()
    {
        
    }

    void Write_Username()
    {
        logged_username = username.GetComponent<InputField>().text;
    }
}