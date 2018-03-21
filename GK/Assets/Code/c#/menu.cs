using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using System.Security.Cryptography;
using UnityEngine.UI;
using System.Text;
using System.IO;

public class menu : MonoBehaviour {
    public GameObject login;
    public GameObject avatar;
    public GameObject cancelbutton;
    public GameObject infotexbox;
    private string MM_Info;
    public bool matching = false;
    public bool matched = false;
    public bool prematched = false;
    private WWWForm form;
    private WWW w;
    private WWW ww;
    private string status;

    IEnumerator LoadData(){
        form = new WWWForm();
        form.AddField("checkin", "okoń");
        w = new WWW("http://testhtml5.wex.pl/get_card_data.php", form);
        yield return w;
        string[] stringonly = w.text.Split('<');
        string[] tables = stringonly[0].Split('&');
        string[][] records = new string [tables.Length][];
        print(tables.Length);
        for (int i=0; i < tables.Length-1; i++)
        {
            string[] recordstmp = tables[i].Split('$');
            records[i] = recordstmp;
        }
        for (int i=0; i < tables.Length-1; i++)
        {
            for (int j=0; records[i][j] != ""; j++)
            {
                string[] valuestmp = records[i][j].Split('@');
                if(i==0)
                {
                    globals.Cards temp = new globals.Cards(int.Parse(valuestmp[0]), valuestmp[1], valuestmp[2], int.Parse(valuestmp[3]), int.Parse(valuestmp[4]), int.Parse(valuestmp[5]), int.Parse(valuestmp[6]));
                    globals.Card.Add(temp);
                    
                    //print(globals.Card[j].id + globals.Card[j].name + globals.Card[j].description);
                }
                if(i==1)
                {
                    globals.Attack_List temp = new globals.Attack_List(int.Parse(valuestmp[0]), int.Parse(valuestmp[1]), int.Parse(valuestmp[2]), int.Parse(valuestmp[3]), int.Parse(valuestmp[4]));
                    globals.Attack_Id.Add(temp);
                    //print(globals.Attack_Id[j].id + globals.Attack_Id[j].attack1 + globals.Attack_Id[j].attack2);
                }
                if(i==2)
                {
                    globals.Attacks temp = new globals.Attacks(int.Parse(valuestmp[0]), valuestmp[1], valuestmp[2], int.Parse(valuestmp[3]), int.Parse(valuestmp[4]), int.Parse(valuestmp[5]));
                    globals.Attack.Add(temp);
                    //print(globals.Attack[j].id + globals.Attack[j].name);
                }
                if(i==3)
                {
                    //print(j);
                    globals.Elements temp = new globals.Elements(int.Parse(valuestmp[0]), valuestmp[1]);
                    globals.Element.Add(temp);
                    //print(globals.Element[j].id + globals.Element[j].name);
                }
                if(i==4)
                {
                    //print(valuestmp[0]);
                    globals.Elements_Sums temp = new globals.Elements_Sums(int.Parse(valuestmp[0]), int.Parse(valuestmp[1]), int.Parse(valuestmp[2]), int.Parse(valuestmp[3]), int.Parse(valuestmp[4]), int.Parse(valuestmp[5]));
                    globals.Element_Sum.Add(temp);
                    //print(globals.Element_Sum[j].id.ToString() + globals.Element_Sum[j].El0.ToString());
                }
            }
        }
        print(globals.Card[1].name);
    }


    // Use this for initialization
    void Start () {
        login.GetComponent<Text>().text = globals.logged_username;
        form = new WWWForm();
        StartCoroutine(LoadData());
    }
	
	// Update is called once per frame
	void Update () {
		
	}
    public void NowaGra()
    {
        Application.LoadLevel(2);
    }
    public void Multi()
    {
        StartCoroutine(AddQ());
        //Application.LoadLevel(2);
    }
    public void Opcje()
    {
        Application.LoadLevel(3);
    }
    public void Autorzy()
    {
        Application.LoadLevel(4);
    }
    public void Koniec()
    {
        Application.Quit();
    }

    public void CancelMM()
    {
        StartCoroutine(RemQ());
    }

    //Matchmaking

    IEnumerator AddQ()
    {
        form = new WWWForm();
        form.AddField("checkin", "okoń");
        form.AddField("username", globals.logged_username);
        w = new WWW("http://testhtml5.wex.pl/mm_join.php", form);
        yield return w;
        if (w.error != null)
        {
            print("Błąd połączenia!");
        }
        else
        {
            matching = true;
            cancelbutton.SetActive(true);
            infotexbox.SetActive(true);
            status = "Wyszukiwanie rywala";
            StartCoroutine(InQueue());
        }
    }

    IEnumerator RemQ()
    {
        form = new WWWForm();
        form.AddField("checkin", "okoń");
        form.AddField("username", globals.logged_username);
        w = new WWW("http://testhtml5.wex.pl/mm_leave.php", form);
        yield return w;
        if (w.error != null)
        {
            print("Błąd połączenia!");
        }
        else
        {
            matching = false;
            cancelbutton.SetActive(false);
            infotexbox.SetActive(false);
        }
    }

    IEnumerator Check_matched()
    {
        form = new WWWForm();
        form.AddField("checkin", "okoń");
        form.AddField("username", globals.logged_username);
        ww = new WWW("http://testhtml5.wex.pl/check_matched.php", form);
        yield return ww;
        string[] substrings2 = ww.text.Split('<');
        string[] substrings3 = substrings2[0].Split('|');
        print(substrings3[0]);
        print(substrings3[1]);
        if (int.Parse(substrings3[0]) != 0)
        {
            print(substrings2[0]);
            print(substrings3[0] + substrings3[1]);
            prematched = true;
            globals.match_id = int.Parse(substrings3[0]);
            globals.rival_username = substrings3[1];
            status = "Twój rywal to:" + globals.rival_username;
            form = new WWWForm();
            form.AddField("checkin", "okoń");
            form.AddField("username", globals.logged_username);
            Application.LoadLevel(2);
        }
    }

    IEnumerator QueueStatus()
    {
        string Queue = "Szybkie dobieranie";
        string TimeInQueue = "Czas w kolejce:";
        string PlayersInQueue = "Osób w kolejce:";
        w = new WWW("http://testhtml5.wex.pl/check_queue.php");
        yield return w;
        string[] substrings = w.text.Split('<');
        PlayersInQueue = PlayersInQueue + " " + substrings[0];
        infotexbox.GetComponent<Text>().text = Queue + "\n" + TimeInQueue + "\n" + PlayersInQueue + "\n" + status;
        StartCoroutine(Check_matched());
        infotexbox.GetComponent<Text>().text = Queue + "\n" + TimeInQueue + "\n" + PlayersInQueue + "\n" + status;
    }

    IEnumerator InQueue()
    {
        while (matching)
        {
            StartCoroutine(QueueStatus());
            yield return new WaitForSeconds(2.0f);
        }
        while (prematched)
        {

        }
        
    }


    public void check_q()
    {
        if (matching)
        {


        }

    }

}

