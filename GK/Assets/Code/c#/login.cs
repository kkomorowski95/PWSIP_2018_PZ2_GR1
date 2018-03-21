using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using System.Security.Cryptography;
using UnityEngine.UI;
using System.Text;
using System.IO;

public class login : MonoBehaviour
{

    public GameObject username;
    public GameObject password;
    public GameObject message;
    private WWWForm form;
    private WWW w;
    private string psstring;
    private byte[] psbyte;
    private byte[] enpsw;

    // Use this for initialization
    void Start()
    {
        form = new WWWForm();
    }

    IEnumerator Site()
    {
        //Encryption
        psstring = password.GetComponent<InputField>().text;
        //psstring = psstring.PadRight(32, '0');
        //UnicodeEncoding kownerter = new UnicodeEncoding();
        //psbyte = kownerter.GetBytes(psstring);
        //SHA256 mySHA256 = SHA256Managed.Create();
        //enpsw = mySHA256.ComputeHash(psbyte);
        //print(Encoding.Default.GetString(enpsw));

        //Connecting to database
        form.AddField("username", username.GetComponent<InputField>().text);
        //form.AddField("password", Encoding.Default.GetString(enpsw));
        form.AddField("password", psstring);
        w = new WWW("http://testhtml5.wex.pl/login.php", form);
        yield return w;
        if (w.error != null)
        {
            message.GetComponent<Text>().text = "Błąd serwera";
        }
        else
        {
            char tekst = w.text[0];
            print(tekst);
            if (tekst == '0')
            {
                Application.LoadLevel(1);
                globals.logged_username = username.GetComponent<InputField>().text;
            }
            if (tekst == '1')
            {
                message.GetComponent<Text>().text = "Login nieprawidłowy";
            }
            if (tekst == '2')
            {
                message.GetComponent<Text>().text = "Hasło nieprawidłowe";
            }
            if (tekst == '3')
            {
                message.GetComponent<Text>().text = "Użytkownik już zalogowany";
            }
        }
    }

    public void Button_clicked()
    {
       StartCoroutine(Site());
       //Application.LoadLevel(1);
    }


    // Update is called once per frame
    void Update()
    {

    }
}
