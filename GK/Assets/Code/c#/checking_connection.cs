using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class checking_connection : MonoBehaviour
{

    public int dctime = 0;
    private WWWForm form;
    private WWW w;

    // Use this for initialization
    private void OnEnable()
    {
        form = new WWWForm();
        StartCoroutine(DoCheck());
    }

    void Start()
    {

    }

    // Update is called once per frame
    void Update()
    {
    }

    IEnumerator Site()
    {
        form.AddField("checkin", "okoń");
        form.AddField("user", globals.logged_username);
        w = new WWW("http://testhtml5.wex.pl/check_session.php", form);
        yield return w;
        if (w.error != null)
        {
            print("Błąd połączenia!");
            dctime++;
            if (dctime >= 6)
            {
                Application.LoadLevel("login");
            }
        }
        else
        {
            char tekst = w.text[0];
            if (tekst == '0')
            {
                string[] substrings = w.text.Split('<');
                print(substrings[0]);
                dctime = 0;
            }
            else
            {
                dctime = 6;
                Application.LoadLevel("Login");
            }
        }
    }

    IEnumerator DoCheck()
    {
        for (; ; )
        {
            yield return new WaitForSeconds(5.0f);
            StartCoroutine(Site());
        }
    }
}
