using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class pick_attack : MonoBehaviour {

    private WWWForm form;
    private WWW w;

    // Use this for initialization
    private void OnEnable() {
        form = new WWWForm();
    }
	
	// Update is called once per frame
	void Update () {
		
	}

    public void Button_Clicked1()
    {
        StartCoroutine(Data(1));
    }
    public void Button_Clicked2()
    {
        StartCoroutine(Data(2));
    }
    public void Button_Clicked3()
    {
        StartCoroutine(Data(3));
    }
    public void Button_Clicked4()
    {
        StartCoroutine(Data(5));
    }

    IEnumerator Data(int AttackNumber)
    {
        form.AddField("checkin", "okoń");
        form.AddField("attacknumer", AttackNumber);
        w = new WWW(globals.server_address + "/send_attack.php", form);

        yield return w;
        if (w.error != null)
        {
            print("Błąd połączenia");
        }
        else
        {
            string[] temp = w.text.Split('<');
            print("Wysłano: " + temp[0]);
        }
    }
}
