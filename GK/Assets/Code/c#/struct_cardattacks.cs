using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class struct_cardattacks
{
        public List<attack> list = new List<attack>();

        public struct_cardattacks(string[] datastring)
        {
            list = new List<attack>();
            for (int i = 0; i < datastring.Length - 1; i++)
            {
                string[] attacktemp = datastring[i].Split('@');
                list.Add(new attack(attacktemp[0], int.Parse(attacktemp[1]), int.Parse(attacktemp[2]), int.Parse(attacktemp[3]), int.Parse(attacktemp[4]), int.Parse(attacktemp[5]), int.Parse(attacktemp[6]), int.Parse(attacktemp[7])));
            }
        }

    public struct attack
    {
        public string name;
        public int damage;
        public int attack_element;
        public int[] element_req;

        public attack(string name, int damage, int attack_element, int element0, int element1, int element2, int element3, int element4)
        {
            this.name = name;
            this.damage = damage;
            this.attack_element = attack_element;
            this.element_req = new int[5];
            this.element_req[0] = element0;
            this.element_req[1] = element1;
            this.element_req[2] = element2;
            this.element_req[3] = element3;
            this.element_req[4] = element4;
        }
    }
}
