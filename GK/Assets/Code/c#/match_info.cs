using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class match_info : MonoBehaviour {

    private WWWForm form;
    private WWW w;
    public GameObject[] enemy_cards;
    public GameObject[] ally_cards;
    public GameObject[] card_played;
    public GameObject button;


    public List<Card_Info> Cards = new List<Card_Info>();
    public Table_Data TableData;
    Card_Played[] CardPlayed;
    int EnemyCardCount;

    public int Get_Picked()
    {
        for (int i=0; i < 10; i++)
        {
            card comp = ally_cards[i].GetComponent<card>();
            if (comp.picked)
            {
                comp.unpick();
                return i;
            }
        }
        return -1;
    }

    public void Upick_All()
    {
        for (int i = 0; i < 10; i++)
        {
            card comp = ally_cards[i].GetComponent<card>();
            comp.unpick();
        }
    }

    private void OnEnable()
    {
        form = new WWWForm();
    }

    public struct Table_Data
    {
        public string player1name;
        public string player2name;
        public int status;
        public string enemy_name;
        public bool turn;

        public Table_Data(string p1, string p2, int st)
        {
            player1name = p1;
            player2name = p2;
            status = st;
            if (player1name == globals.logged_username)
            {
                enemy_name = player2name;
                if (status == 2)
                {
                    turn = true;
                }
                else
                {
                    turn = false;
                }
            }
            else
            {
                enemy_name = player1name;
                if (status == 3)
                {
                    turn = true;
                }
                else
                {
                    turn = false;
                }
            }
            //print("TURA: " + status + turn);
        }
    }

    public struct Card_Info
    {
        public int CardID;
        public int Slot;

        public Card_Info(int C, int S)
        {
            CardID = C;
            Slot = S;
        }
    }

    public struct Card_Played
    {
        public int CardID;
        public int ActualHealth;
        public int ActualMaxHealth;
        public int AttackBoost;
        public int[] Element;
        
        public Card_Played(int C, int AH, int AMH, int AB, int[] e)
        {
            CardID = C;
            ActualHealth = AH;
            ActualMaxHealth = AMH;
            AttackBoost = AB;
            Element = e;
        }
    }

    IEnumerator Data()
    {
        form.AddField("checkin", "okoń");
        form.AddField("username", globals.logged_username);
        w = new WWW("http://testhtml5.wex.pl/get_table_data.php", form);
        yield return w;
        if (w.error != null)
        {
            print("Błąd połączenia");
        }
        else
        {
            string[] stringonly = w.text.Split('<');
            print(stringonly[0]);
            string[] structs = stringonly[0].Split('&');
            for (int i=0; i<structs.Length; i++)
            {
                print(structs[i]);
            }
            string[] gamedata = structs[0].Split('@');
            TableData = new Table_Data(gamedata[0], gamedata[1], int.Parse(gamedata[2]));
            string[] handdata = structs[1].Split('$');
            Cards = new List<Card_Info>();
            for (int i=0; i<handdata.Length-1; i++)
            {
                string[] handtemp = handdata[i].Split('@');
                Cards.Add(new Card_Info(int.Parse(handtemp[0]), int.Parse(handtemp[1])));
            }
            for (int i=0; i<Cards.Count; i++)
            {
                print(Cards[i].CardID + "|" + Cards[i].Slot);
            }
            string[] playdata_player = structs[2].Split('@');
            string[] playdata_enemy = structs[3].Split('@');
            Card_Played temp1;
            Card_Played temp2;
            if (playdata_player[0].Length != 0)
            {
                temp1 = new Card_Played(int.Parse(playdata_player[0]), int.Parse(playdata_player[1]), int.Parse(playdata_player[2]), int.Parse(playdata_player[3]), new int[] { int.Parse(playdata_player[4]), int.Parse(playdata_player[5]), int.Parse(playdata_player[6]), int.Parse(playdata_player[7]) });
            }
            else
            {
                temp1 = new Card_Played(0, 0, 0, 0, new int[] { 0, 0, 0, 0 });
            }
            if (playdata_enemy[0].Length != 0)
            {
                temp2 = new Card_Played(int.Parse(playdata_enemy[0]), int.Parse(playdata_enemy[1]), int.Parse(playdata_enemy[2]), int.Parse(playdata_enemy[3]), new int[] { int.Parse(playdata_enemy[4]), int.Parse(playdata_enemy[5]), int.Parse(playdata_enemy[6]), int.Parse(playdata_enemy[7]) });
            }
            else
            {
                temp2 = new Card_Played(0, 0, 0, 0, new int[] { 0, 0, 0, 0 });
            }
            CardPlayed = new Card_Played[] { temp1, temp2 };
            EnemyCardCount = int.Parse(structs[4]);
            int number = 0;
            print(CardPlayed[number].CardID + " " + CardPlayed[number].ActualHealth + " " + CardPlayed[number].ActualMaxHealth + " " + CardPlayed[number].AttackBoost + " " + CardPlayed[number].Element[0] + " " + CardPlayed[number].Element[1] + " " + CardPlayed[number].Element[2] + " " + CardPlayed[number].Element[3]);
            print(EnemyCardCount);

            int iteration;
            for (iteration = 0; iteration < EnemyCardCount; iteration++)
            {
               SpriteRenderer[] tmp = enemy_cards[iteration].GetComponents<SpriteRenderer>();
               tmp[0].enabled = true;
            }
            for (iteration = EnemyCardCount; iteration < 10; iteration ++)
            {
                SpriteRenderer[] tmp = enemy_cards[iteration].GetComponents<SpriteRenderer>();
                tmp[0].enabled = false;
            }
            for (iteration = 0; iteration < Cards.Count; iteration++)
            {
                SpriteRenderer[] tmp = ally_cards[iteration].GetComponents<SpriteRenderer>();
                tmp[0].enabled = true;
                tmp[0].sprite = Resources.Load(Cards[iteration].CardID.ToString(), typeof(Sprite)) as Sprite;
            }
            for (iteration = Cards.Count; iteration < 10; iteration++)
            {
                SpriteRenderer[] tmp = ally_cards[iteration].GetComponents<SpriteRenderer>();
                tmp[0].enabled = false;
            }

            for (int i = 0; i < card_played.Length; i++)
            {
                if (CardPlayed[i].CardID == 0)
                {
                    SpriteRenderer[] tmp = card_played[i].GetComponents<SpriteRenderer>();
                    tmp[0].enabled = false;
                }
                else
                {
                    SpriteRenderer[] tmp = card_played[i].GetComponents<SpriteRenderer>();
                    tmp[0].enabled = true;
                    tmp[0].sprite = Resources.Load(CardPlayed[i].CardID.ToString(), typeof(Sprite)) as Sprite;
                }
            }

        }
    }

    IEnumerator DoCheck()
    {
        for (; ; )
        {
            yield return new WaitForSeconds(1.0f);
            StartCoroutine(Data());
        }
    }

    // Use this for initialization
    void Start () {
        StartCoroutine(DoCheck());
    }
	
	// Update is called once per frame
	void Update () {
        button.active = TableData.turn;
    }
}
