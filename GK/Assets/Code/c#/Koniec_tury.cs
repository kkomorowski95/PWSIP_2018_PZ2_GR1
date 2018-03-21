using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Koniec_tury : MonoBehaviour {
    private WWWForm form;
    private WWW w;
    public GameObject stol;
    public GameObject button;

    private void OnEnable()
    {
        form = new WWWForm();
    }

    // Use this for initialization
    void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
        bool tura = stol.GetComponent<match_info>().TableData.turn;
        print("Tura: " + tura);
        button.active = tura;

    }

    IEnumerator connect()
    {
        form.AddField("checkin", "okoń");
        form.AddField("username", globals.logged_username);
        w = new WWW("http://testhtml5.wex.pl/end_turn.php", form);
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

    public void Endturn()
    {
        StartCoroutine(connect());
    }
}
