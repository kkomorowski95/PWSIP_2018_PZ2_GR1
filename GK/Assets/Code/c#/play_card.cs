using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class play_card : MonoBehaviour {

    private WWWForm form;
    private WWW w;
    public GameObject stol;

    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
		
	}

    private void OnEnable()
    {
        form = new WWWForm();
    }

    IEnumerator Send_data()
    {
        int picked = stol.GetComponent<match_info>().Get_Picked();
        picked = stol.GetComponent<match_info>().Cards[picked].Slot;
        print(picked);
        form.AddField("checkin", "okoń");
        form.AddField("username", globals.logged_username);
        form.AddField("card_slot", picked);
        w = new WWW("http://testhtml5.wex.pl/play_card.php", form);
        yield return w;
        if (w.error != null)
        {
            print("Błąd połączenia");
        }
        else
        {
            print(w.text);
        }
    }

    void OnMouseDown()
    {
        StartCoroutine(Send_data());
    }
}
